<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Package;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboard extends Controller
{
    /**
     * Display the admin dashboard with statistics and recent orders
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get order statistics
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $paidOrders = Order::whereIn('status', ['paid', 'in_progress'])->count();
        $doneOrders = Order::whereIn('status', ['completed', 'verified'])->count();

        // Get recent orders (last 10) with relationships
        $latestOrders = Order::with(['user', 'package'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Get additional statistics for charts or detailed analysis
        $monthlyStats = $this->getMonthlyOrderStats();
        $statusDistribution = $this->getOrderStatusDistribution();
        $revenueStats = $this->getRevenueStats();
        $packagePopularity = $this->getPackagePopularity();

        return view('dashboard.admin', compact(
            'totalOrders',
            'pendingOrders',
            'paidOrders',
            'doneOrders',
            'latestOrders',
            'monthlyStats',
            'statusDistribution',
            'revenueStats',
            'packagePopularity'
        ));
    }

    /**
     * Get monthly order statistics for the last 12 months
     *
     * @return \Illuminate\Support\Collection
     */
    private function getMonthlyOrderStats()
    {
        return Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed_orders')
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($item) {
                $item->month_name = Carbon::createFromDate($item->year, $item->month, 1)->format('M Y');
                return $item;
            });
    }

    /**
     * Get order status distribution
     *
     * @return \Illuminate\Support\Collection
     */
    private function getOrderStatusDistribution()
    {
        return Order::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                $item->percentage = $this->calculatePercentage($item->count, Order::count());
                return $item;
            });
    }

    /**
     * Get revenue statistics
     *
     * @return array
     */
    private function getRevenueStats()
    {
        $currentMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();

        $currentMonthRevenue = Order::whereIn('orders.status', ['paid', 'in_progress', 'completed', 'verified'])
            ->whereYear('orders.created_at', $currentMonth->year)
            ->whereMonth('orders.created_at', $currentMonth->month)
            ->join('packages', 'orders.package_id', '=', 'packages.id')
            ->sum('packages.price');

        $lastMonthRevenue = Order::whereIn('orders.status', ['paid', 'in_progress', 'completed', 'verified'])
            ->whereYear('orders.created_at', $lastMonth->year)
            ->whereMonth('orders.created_at', $lastMonth->month)
            ->join('packages', 'orders.package_id', '=', 'packages.id')
            ->sum('packages.price');

        $totalRevenue = Order::whereIn('orders.status', ['paid', 'in_progress', 'completed', 'verified'])
            ->join('packages', 'orders.package_id', '=', 'packages.id')
            ->sum('packages.price');


        $revenueGrowth = $lastMonthRevenue > 0
            ? (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100
            : ($currentMonthRevenue > 0 ? 100 : 0);

        return [
            'current_month' => $currentMonthRevenue,
            'last_month' => $lastMonthRevenue,
            'total' => $totalRevenue,
            'growth_percentage' => round($revenueGrowth, 2)
        ];
    }

    /**
     * Get package popularity statistics
     *
     * @return \Illuminate\Support\Collection
     */
    private function getPackagePopularity()
    {
        return Package::select('packages.id', 'packages.name', 'packages.price')
            ->selectRaw('COUNT(orders.id) as total_orders')
            ->selectRaw('SUM(CASE WHEN orders.status IN ("completed", "verified") THEN 1 ELSE 0 END) as completed_orders')
            ->leftJoin('orders', 'packages.id', '=', 'orders.package_id')
            ->groupBy('packages.id', 'packages.name', 'packages.price')
            ->orderBy('total_orders', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($package) {
                $package->completion_rate = $package->total_orders > 0
                    ? round(($package->completed_orders / $package->total_orders) * 100, 2)
                    : 0;
                return $package;
            });
    }

    /**
     * Get recent activities for dashboard
     *
     * @return \Illuminate\Support\Collection
     */
    public function getRecentActivities()
    {
        $activities = collect();

        // Recent orders
        $recentOrders = Order::with(['user', 'package'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($order) {
                return [
                    'type' => 'order_created',
                    'title' => 'Order Baru',
                    'description' => "Order {$order->order_code} dibuat oleh {$order->user->name}",
                    'time' => $order->created_at,
                    'icon' => 'plus-circle',
                    'color' => 'blue'
                ];
            });

        // Recent payments
        $recentPayments = Order::where('status', 'paid')
            ->where('paid_at', '>=', Carbon::now()->subDays(7))
            ->with(['user', 'package'])
            ->orderBy('paid_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($order) {
                return [
                    'type' => 'payment_received',
                    'title' => 'Pembayaran Diterima',
                    'description' => "Pembayaran untuk order {$order->order_code}",
                    'time' => $order->paid_at,
                    'icon' => 'credit-card',
                    'color' => 'green'
                ];
            });

        // Recent completions
        $recentCompletions = Order::whereIn('status', ['completed', 'verified'])
            ->where('completed_at', '>=', Carbon::now()->subDays(7))
            ->with(['user', 'package'])
            ->orderBy('completed_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($order) {
                return [
                    'type' => 'order_completed',
                    'title' => 'Order Selesai',
                    'description' => "Order {$order->order_code} telah diselesaikan",
                    'time' => $order->completed_at,
                    'icon' => 'check-circle',
                    'color' => 'green'
                ];
            });

        // Recent video uploads
        $recentVideos = Video::with(['order', 'pelaksana'])
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($video) {
                return [
                    'type' => 'video_uploaded',
                    'title' => 'Video Diunggah',
                    'description' => "Video untuk order {$video->order->order_code} diunggah",
                    'time' => $video->created_at,
                    'icon' => 'video-camera',
                    'color' => 'purple'
                ];
            });

        return $activities
            ->merge($recentOrders)
            ->merge($recentPayments)
            ->merge($recentCompletions)
            ->merge($recentVideos)
            ->sortByDesc('time')
            ->take(10);
    }

    /**
     * Get dashboard metrics for API endpoint
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMetrics()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $thisWeek = Carbon::now()->startOfWeek();
        $lastWeek = Carbon::now()->subWeek()->startOfWeek();

        $metrics = [
            'orders' => [
                'today' => Order::whereDate('created_at', $today)->count(),
                'yesterday' => Order::whereDate('created_at', $yesterday)->count(),
                'this_week' => Order::where('created_at', '>=', $thisWeek)->count(),
                'last_week' => Order::whereBetween('created_at', [$lastWeek, $thisWeek])->count(),
            ],
            'revenue' => [
                'today' => $this->getRevenueByDate($today),
                'yesterday' => $this->getRevenueByDate($yesterday),
                'this_week' => $this->getRevenueByDateRange($thisWeek, Carbon::now()),
                'last_week' => $this->getRevenueByDateRange($lastWeek, $thisWeek),
            ],
            'active_orders' => Order::whereIn('status', ['paid', 'in_progress'])->count(),
            'pending_videos' => Video::where('status', 'pending')->count(),
        ];

        return response()->json($metrics);
    }

    /**
     * Calculate percentage
     *
     * @param int $part
     * @param int $total
     * @return float
     */
    private function calculatePercentage($part, $total)
    {
        return $total > 0 ? round(($part / $total) * 100, 2) : 0;
    }

    /**
     * Get revenue by specific date
     *
     * @param Carbon $date
     * @return int
     */
    private function getRevenueByDate(Carbon $date)
    {
        return Order::whereIn('status', ['paid', 'in_progress', 'completed', 'verified'])
            ->whereDate('created_at', $date)
            ->join('packages', 'orders.package_id', '=', 'packages.id')
            ->sum('packages.price');
    }

    /**
     * Get revenue by date range
     *
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return int
     */
    private function getRevenueByDateRange(Carbon $startDate, Carbon $endDate)
    {
        return Order::whereIn('status', ['paid', 'in_progress', 'completed', 'verified'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->join('packages', 'orders.package_id', '=', 'packages.id')
            ->sum('packages.price');
    }

    /**
     * Export dashboard data to Excel/CSV
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function exportData(Request $request)
    {
        $type = $request->get('type', 'orders'); // orders, revenue, packages
        $format = $request->get('format', 'excel'); // excel, csv

        switch ($type) {
            case 'revenue':
                return $this->exportRevenueData($format);
            case 'packages':
                return $this->exportPackageData($format);
            default:
                return $this->exportOrderData($format);
        }
    }

    /**
     * Export order data
     */
    private function exportOrderData($format)
    {
        // Implementation for exporting order data
        // This would typically use Laravel Excel or similar package
    }

    /**
     * Export revenue data
     */
    private function exportRevenueData($format)
    {
        // Implementation for exporting revenue data
    }

    /**
     * Export package data
     */
    private function exportPackageData($format)
    {
        // Implementation for exporting package data
    }
}
