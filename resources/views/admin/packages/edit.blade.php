@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-indigo-100 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Animated Header -->
        <div class="text-center mb-12 animate-fade-in-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full mb-6 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                Edit Paket Layanan
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Perbarui informasi paket "<span class="font-semibold text-purple-600">{{ $package->name }}</span>" dengan detail terbaru
            </p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 overflow-hidden animate-fade-in-up animation-delay-200">
            <!-- Card Header with Gradient -->
            <div class="relative bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-8 py-8">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Edit Paket Layanan</h2>
                            <p class="text-white/80 mt-1">Perbarui detail paket dengan informasi terbaru</p>
                        </div>
                    </div>
                    <!-- Package ID Badge -->
                    <div class="hidden md:flex items-center space-x-2 bg-white/20 backdrop-blur-sm rounded-full px-4 py-2">
                        <span class="text-white/70 text-sm">ID:</span>
                        <span class="text-white font-semibold">#{{ $package->id }}</span>
                    </div>
                </div>
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
            </div>

            <!-- Error Messages with Animation -->
            @if ($errors->any())
            <div class="mx-8 mt-8 animate-shake">
                <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200/50 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-red-800">Perlu diperbaiki</h3>
                    </div>
                    <ul class="space-y-2">
                        @foreach ($errors->all() as $error)
                        <li class="flex items-start text-red-700">
                            <span class="flex-shrink-0 w-1.5 h-1.5 bg-red-400 rounded-full mt-2 mr-3"></span>
                            <span class="text-sm">{{ $error }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" class="p-8 space-y-8">
                @csrf
                @method('PATCH')
                
                <!-- Nama Paket -->
                <div class="group animate-fade-in-up animation-delay-300">
                    <label for="name" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-purple-600 transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Nama Paket
                            <span class="ml-2 px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Wajib</span>
                        </span>
                    </label>
                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name', $package->name) }}" required
                            class="w-full pl-14 pr-4 py-4 bg-gradient-to-r from-gray-50 to-purple-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-900 placeholder-gray-400 hover:shadow-md group-hover:border-gray-300"
                            placeholder="Masukkan nama paket yang menarik">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-lg flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                        </div>
                        <!-- Character counter -->
                        <div class="absolute top-full mt-1 right-0 text-xs text-gray-400">
                            <span id="name-counter">{{ strlen($package->name) }}</span>/100 karakter
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="group animate-fade-in-up animation-delay-400">
                    <label for="description" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-purple-600 transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Deskripsi Paket
                            <span class="ml-2 px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Wajib</span>
                        </span>
                    </label>
                    <div class="relative">
                        <textarea name="description" id="description" rows="5" required
                            class="w-full px-4 py-4 bg-gradient-to-r from-gray-50 to-purple-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-900 placeholder-gray-400 hover:shadow-md resize-none"
                            placeholder="Deskripsikan paket layanan secara detail dan menarik...">{{ old('description', $package->description) }}</textarea>
                        <!-- Word counter -->
                        <div class="absolute top-full mt-1 right-0 text-xs text-gray-400">
                            <span id="description-counter">{{ str_word_count($package->description) }}</span> kata
                        </div>
                    </div>
                </div>

                <!-- Harga dengan Current Value Display -->
                <div class="group animate-fade-in-up animation-delay-500">
                    <label for="price" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-purple-600 transition-colors">
                        <span class="flex items-center justify-between">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                Harga Paket
                                <span class="ml-2 px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Wajib</span>
                            </span>
                            <span class="text-sm text-gray-500">Harga saat ini: <span class="font-semibold text-green-600">Rp {{ number_format($package->price, 0, ',', '.') }}</span></span>
                        </span>
                    </label>
                    <div class="relative">
                        <input type="number" name="price" id="price" value="{{ old('price', $package->price) }}" required min="0"
                            class="w-full pl-16 pr-4 py-4 bg-gradient-to-r from-gray-50 to-purple-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-900 placeholder-gray-400 hover:shadow-md"
                            placeholder="0">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <div class="flex items-center space-x-2">
                                <div class="w-6 h-6 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-600 font-semibold">Rp</span>
                            </div>
                        </div>
                        <!-- Price change indicator -->
                        <div class="absolute top-full mt-1 left-0 text-xs" id="price-change-indicator"></div>
                    </div>
                </div>

                <!-- Layanan dengan Preview -->
                <div class="group animate-fade-in-up animation-delay-600">
                    <label for="services" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-purple-600 transition-colors">
                        <span class="flex items-center justify-between">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                                Pilih Layanan
                            </span>
                            <span class="text-sm text-gray-500">Terpilih: <span id="selected-count" class="font-semibold text-purple-600">{{ $package->services->count() }}</span> layanan</span>
                        </span>
                    </label>

                    <!-- Current Services Preview -->
                    <div class="mb-4 p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl border border-purple-100">
                        <h4 class="text-sm font-semibold text-purple-800 mb-2">Layanan Saat Ini:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($package->services as $service)
                            <span class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $service->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="relative">
                        <select name="services[]" id="services" multiple
                            class="w-full px-4 py-4 bg-gradient-to-r from-gray-50 to-purple-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-900 hover:shadow-md">
                            @foreach($allServices as $service)
                            <option value="{{ $service->id }}" class="py-3 px-2 hover:bg-purple-50"
                                {{ $package->services->contains($service->id) ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="mt-3 flex items-start space-x-2">
                            <div class="flex-shrink-0 w-5 h-5 bg-purple-100 rounded-full flex items-center justify-center mt-0.5">
                                <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold">Tips:</span> Tahan <kbd class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">Ctrl</kbd> (Windows) atau <kbd class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">Cmd</kbd> (Mac) untuk memilih beberapa layanan sekaligus
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200 animate-fade-in-up animation-delay-700">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:from-purple-700 hover:via-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-purple-500/30 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center space-x-3 group">
                        <div class="w-5 h-5 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-12 transition-transform">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span>Update Paket</span>
                        <div class="w-0 group-hover:w-2 h-2 bg-white/40 rounded-full transition-all duration-300"></div>
                    </button>
                    
                    <a href="{{ route('admin.packages.index') }}"
                        class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 px-8 py-4 rounded-xl font-bold hover:from-gray-200 hover:to-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-400/30 transition-all duration-300 hover:scale-[1.02] hover:shadow-lg flex items-center justify-center space-x-3 group">
                        <div class="w-5 h-5 bg-gray-400/20 rounded-full flex items-center justify-center group-hover:-rotate-12 transition-transform">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                        <span>Batal</span>
                    </a>
                </div>
            </form>
        </div>

        <!-- Change Summary Card -->
        <div class="mt-8 bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20 animate-fade-in-up animation-delay-800">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-amber-400 to-orange-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-800 mb-2">Tips Edit Paket yang Efektif</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Pastikan perubahan harga masih kompetitif dengan paket serupa</li>
                        <li>• Update deskripsi jika ada layanan baru yang ditambahkan</li>
                        <li>• Pertimbangkan impact perubahan terhadap pelanggan yang sudah berlangganan</li>
                        <li>• Simpan backup data penting sebelum melakukan perubahan besar</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Package History/Stats (Optional) -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4 animate-fade-in-up animation-delay-900">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm">Dibuat</p>
                        <p class="text-lg font-bold">{{ $package->created_at->format('d M Y') }}</p>
                    </div>
                    <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm">Total Layanan</p>
                        <p class="text-lg font-bold">{{ $package->services->count() }} Items</p>
                    </div>
                    <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-4 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm">Last Updated</p>
                        <p class="text-lg font-bold">{{ $package->updated_at->format('d M Y') }}</p>
                    </div>
                    <svg class="w-8 h-8 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
}

.animate-shake {
    animation: shake 0.5s ease-in-out;
}

.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-300 { animation-delay: 0.3s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-500 { animation-delay: 0.5s; }
.animation-delay-600 { animation-delay: 0.6s; }
.animation-delay-700 { animation-delay: 0.7s; }
.animation-delay-800 { animation-delay: 0.8s; }
.animation-delay-900 { animation-delay: 0.9s; }

/* Enhanced multi-select styling */
/* Enhanced multi-select styling */
#services {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
}

#services:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%237c3aed' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
}

#services option {
    padding: 12px 16px;
    background: white;
    border-bottom: 1px solid #f3f4f6;
}

#services option:checked {
    background: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);
    color: white;
    font-weight: 600;
}

#services option:hover {
    background: #f8fafc;
}

/* Custom scrollbar for select */
#services::-webkit-scrollbar {
    width: 6px;
}

#services::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

#services::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    border-radius: 3px;
}

#services::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #6d28d9, #4338ca);
}

/* Input focus animations */
input:focus, textarea:focus, select:focus {
    transform: translateY(-1px);
    box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

/* Gradient text selection */
::selection {
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    color: white;
}

::-moz-selection {
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    color: white;
}

/* Button hover effects */
button:hover, a[class*="bg-gradient"]:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Loading state for form */
.form-loading {
    position: relative;
    pointer-events: none;
    opacity: 0.7;
}

.form-loading::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 40px;
    height: 40px;
    border: 4px solid #f3f4f6;
    border-top: 4px solid #7c3aed;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    z-index: 1000;
}

@keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .animate-fade-in-up {
        animation-duration: 0.4s;
    }
    
    .bg-white\/80 {
        background-color: rgba(255, 255, 255, 0.95);
    }
    
    /* Adjust padding for mobile */
    .px-8 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .bg-white\/80 {
        background-color: rgba(31, 41, 55, 0.8);
        color: #f9fafb;
    }
    
    .border-gray-200 {
        border-color: #374151;
    }
    
    .text-gray-900 {
        color: #f9fafb;
    }
    
    .bg-gradient-to-r.from-gray-50.to-purple-50 {
        background: linear-gradient(to right, #1f2937, #312e81);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for name field
    const nameInput = document.getElementById('name');
    const nameCounter = document.getElementById('name-counter');
    
    if (nameInput && nameCounter) {
        nameInput.addEventListener('input', function() {
            nameCounter.textContent = this.value.length;
            if (this.value.length > 80) {
                nameCounter.parentElement.classList.add('text-orange-500');
            } else if (this.value.length > 100) {
                nameCounter.parentElement.classList.add('text-red-500');
                nameCounter.parentElement.classList.remove('text-orange-500');
            } else {
                nameCounter.parentElement.classList.remove('text-orange-500', 'text-red-500');
            }
        });
    }

    // Word counter for description
    const descriptionTextarea = document.getElementById('description');
    const descriptionCounter = document.getElementById('description-counter');
    
    if (descriptionTextarea && descriptionCounter) {
        descriptionTextarea.addEventListener('input', function() {
            const wordCount = this.value.trim().split(/\s+/).filter(word => word.length > 0).length;
            descriptionCounter.textContent = wordCount;
        });
    }

    // Price change indicator
    const priceInput = document.getElementById('price');
    const priceIndicator = document.getElementById('price-change-indicator');
    const originalPrice = {{ $package->price }};
    
    if (priceInput && priceIndicator) {
        priceInput.addEventListener('input', function() {
            const newPrice = parseFloat(this.value) || 0;
            const difference = newPrice - originalPrice;
            
            if (difference > 0) {
                priceIndicator.innerHTML = `<span class="text-green-600 flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>+Rp ${difference.toLocaleString('id-ID')}</span>`;
            } else if (difference < 0) {
                priceIndicator.innerHTML = `<span class="text-red-600 flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>-Rp ${Math.abs(difference).toLocaleString('id-ID')}</span>`;
            } else {
                priceIndicator.innerHTML = '';
            }
        });
    }

    // Services counter
    const servicesSelect = document.getElementById('services');
    const selectedCountSpan = document.getElementById('selected-count');
    
    if (servicesSelect && selectedCountSpan) {
        servicesSelect.addEventListener('change', function() {
            const selectedCount = this.selectedOptions.length;
            selectedCountSpan.textContent = selectedCount;
            
            // Add visual feedback
            if (selectedCount === 0) {
                selectedCountSpan.classList.add('text-red-500');
                selectedCountSpan.classList.remove('text-purple-600', 'text-green-600');
            } else if (selectedCount <= 3) {
                selectedCountSpan.classList.add('text-green-600');
                selectedCountSpan.classList.remove('text-purple-600', 'text-red-500');
            } else {
                selectedCountSpan.classList.add('text-purple-600');
                selectedCountSpan.classList.remove('text-red-500', 'text-green-600');
            }
        });
    }

    // Enhanced multi-select behavior
    if (servicesSelect) {
        servicesSelect.addEventListener('focus', function() {
            this.size = Math.min(this.options.length, 8);
        });

        servicesSelect.addEventListener('blur', function() {
            this.size = 1;
        });

        // Double-click to select/deselect
        servicesSelect.addEventListener('dblclick', function(e) {
            if (e.target.tagName === 'OPTION') {
                e.target.selected = !e.target.selected;
                this.dispatchEvent(new Event('change'));
            }
        });
    }

    // Form submission with loading state
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div>
                    <span>Menyimpan...</span>
                `;
                this.classList.add('form-loading');
            }
        });
    }

    // Auto-save draft (optional feature)
    let autoSaveTimeout;
    const formInputs = form.querySelectorAll('input, textarea, select');
    
    formInputs.forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => {
                // Save to localStorage as draft
                const formData = new FormData(form);
                const draftData = {};
                for (let [key, value] of formData.entries()) {
                    if (draftData[key]) {
                        if (Array.isArray(draftData[key])) {
                            draftData[key].push(value);
                        } else {
                            draftData[key] = [draftData[key], value];
                        }
                    } else {
                        draftData[key] = value;
                    }
                }
                localStorage.setItem('package_edit_draft_{{ $package->id }}', JSON.stringify(draftData));
                
                // Show save indicator
                showSaveIndicator('Draft tersimpan');
            }, 2000);
        });
    });

    // Load draft on page load
    const savedDraft = localStorage.getItem('package_edit_draft_{{ $package->id }}');
    if (savedDraft) {
        try {
            const draftData = JSON.parse(savedDraft);
            // Option to restore draft could be added here
            console.log('Draft tersedia:', draftData);
        } catch (e) {
            localStorage.removeItem('package_edit_draft_{{ $package->id }}');
        }
    }

    // Clear draft on successful submit
    form.addEventListener('submit', function() {
        localStorage.removeItem('package_edit_draft_{{ $package->id }}');
    });

    function showSaveIndicator(message) {
        // Create or update save indicator
        let indicator = document.getElementById('save-indicator');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.id = 'save-indicator';
            indicator.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300 translate-x-full';
            document.body.appendChild(indicator);
        }
        
        indicator.textContent = message;
        indicator.classList.remove('translate-x-full');
        
        setTimeout(() => {
            indicator.classList.add('translate-x-full');
        }, 2000);
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + S to save
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            form.submit();
        }
        
        // Esc to cancel
        if (e.key === 'Escape') {
            const cancelButton = document.querySelector('a[href*="packages.index"]');
            if (cancelButton && confirm('Yakin ingin membatalkan perubahan?')) {
                window.location.href = cancelButton.href;
            }
        }
    });
});
</script>

@endsection