<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controller User
use App\Http\Controllers\BadalOrderController;
use App\Http\Controllers\PaymentController;

// Controller Admin
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\NotificationTemplateController;

// Controller Pelaksana
use App\Http\Controllers\Pelaksana\PelaksanaController;
use App\Http\Controllers\Pelaksana\PelaksanaProfileController;

// Controller Guest
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PackageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'role:user'])->group(function () {
    // Pendaftaran Badal Umroh
    Route::resource('orders', BadalOrderController::class)->names([
        'index' => 'orders.index',
        'create' => 'orders.create',
        'store' => 'orders.store',
        'show' => 'orders.show',
        'edit' => 'orders.edit',
        'update' => 'orders.update',
        'destroy' => 'orders.destroy'
    ]);
    Route::post('/orders/{order}/upload-payment', [BadalOrderController::class, 'uploadPaymentProof'])->name('orders.uploadPayment');

    // Pembayaran
    Route::get('/orders/{id}/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/orders/{id}/payment', [PaymentController::class, 'store'])->name('payment.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN (Role: admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Kelola Order
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::resource('/', AdminOrderController::class)->parameters(['' => 'order']);

        Route::get('{order}/assign', [AdminOrderController::class, 'assignForm'])->name('assignForm');
        Route::post('{order}/assign', [AdminOrderController::class, 'assignPelaksana'])->name('assignPelaksana');
        Route::patch('{order}/verify-payment', [AdminOrderController::class, 'verifyPayment'])->name('verifyPayment');
        Route::patch('{order}/complete', [AdminOrderController::class, 'completeOrder'])->name('complete');
        Route::post('{order}/reopen', [AdminOrderController::class, 'reopenOrder'])->name('reopen');
        Route::post('{order}/reject', [AdminOrderController::class, 'rejectOrder'])->name('reject');
        Route::patch('{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('updateStatus');
    });

    // Kelola User
    Route::resource('users', AdminUserController::class);
    Route::post('users/{user}/assign-role', [AdminUserController::class, 'assignRole'])->name('users.assignRole');

    // Kelola Paket
    Route::resource('packages', AdminPackageController::class);

    // Kelola Layanan (Opsional)
    Route::resource('services', ServiceController::class);

    // Laporan
     Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/report/export-pdf', [ReportController::class, 'exportPdf'])->name('exportPdf');
    Route::get('/report/export-csv', [ReportController::class, 'exportCsv'])->name('exportCsv');


    // Video
    Route::get('videos', [AdminVideoController::class, 'index'])->name('videos.index');
    Route::get('videos/{id}', [AdminVideoController::class, 'show'])->name('videos.show');
    Route::post('videos/{video}/approve', [AdminVideoController::class, 'approve'])->name('videos.approve');
    Route::post('videos/{video}/reject', [AdminVideoController::class, 'reject'])->name('videos.reject');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

/*
|--------------------------------------------------------------------------
| PELAKSANA (Role: pelaksana)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pelaksana'])->prefix('pelaksana')->name('pelaksana.')->group(function () {

    // Dashboard list tugas
    Route::get('/orders', [PelaksanaController::class, 'index'])->name('orders.index');

    // Detail tugas
    Route::get('/orders/{id}', [PelaksanaController::class, 'show'])->name('orders.show');

    // Form upload video
    Route::get('/orders/{id}/upload', [PelaksanaController::class, 'uploadForm'])->name('orders.uploadForm');

    // Simpan upload video
    Route::post('/orders/{id}/upload', [PelaksanaController::class, 'upload'])->name('orders.upload');
});

// Guest Routes


Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
Route::get('/services', [GuestController::class, 'services'])->name('services');
Route::get('/packages', [PackageController::class, 'index'])->name('packages');
Route::get('/faq', [GuestController::class, 'faq'])->name('faq');
Route::get('/terms', [GuestController::class, 'terms'])->name('terms');
Route::get('/privacy', [GuestController::class, 'privacy'])->name('privacy');
Route::get('/testimonials', [GuestController::class, 'testimonials'])->name('testimonials');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
