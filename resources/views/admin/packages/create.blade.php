@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Animated Header -->
        <div class="text-center mb-12 animate-fade-in-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-6 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                Tambah Paket Baru
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Buat paket layanan dengan detail lengkap untuk memberikan pengalaman terbaik bagi pelanggan
            </p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 overflow-hidden animate-fade-in-up animation-delay-200">
            <!-- Card Header with Gradient -->
            <div class="relative bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-8 py-8">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Form Paket Layanan</h2>
                        <p class="text-white/80 mt-1">Lengkapi informasi paket dengan detail</p>
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
            <form action="{{ route('admin.packages.store') }}" method="POST" class="p-8 space-y-8">
                @csrf
                
                <!-- Nama Paket -->
                <div class="group animate-fade-in-up animation-delay-300">
                    <label for="name" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-blue-600 transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Nama Paket
                        </span>
                    </label>
                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full pl-14 pr-4 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-400 hover:shadow-md group-hover:border-gray-300"
                            placeholder="Masukkan nama paket yang menarik">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="group animate-fade-in-up animation-delay-400">
                    <label for="description" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-blue-600 transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Deskripsi Paket
                        </span>
                    </label>
                    <textarea name="description" id="description" rows="5" required
                        class="w-full px-4 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-400 hover:shadow-md resize-none"
                        placeholder="Deskripsikan paket layanan secara detail dan menarik...">{{ old('description') }}</textarea>
                </div>

                <!-- Layanan -->
                <div class="group animate-fade-in-up animation-delay-500">
                    <label for="services" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-blue-600 transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            Pilih Layanan
                        </span>
                    </label>
                    <div class="relative">
                        <select name="services[]" id="services" multiple
                            class="w-full px-4 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-900 hover:shadow-md">
                            @foreach($allServices as $service)
                            <option value="{{ $service->id }}" class="py-3 px-2 hover:bg-blue-50">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-3 flex items-start space-x-2">
                            <div class="flex-shrink-0 w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center mt-0.5">
                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold">Tips:</span> Tahan <kbd class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">Ctrl</kbd> (Windows) atau <kbd class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs">Cmd</kbd> (Mac) untuk memilih beberapa layanan sekaligus
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Harga -->
                <div class="group animate-fade-in-up animation-delay-600">
                    <label for="price" class="block text-sm font-bold text-gray-800 mb-3 group-focus-within:text-blue-600 transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Harga Paket
                        </span>
                    </label>
                    <div class="relative">
                        <input type="number" name="price" id="price" value="{{ old('price') }}" required
                            class="w-full pl-16 pr-4 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-900 placeholder-gray-400 hover:shadow-md"
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
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200 animate-fade-in-up animation-delay-700">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-blue-500/30 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center space-x-3 group">
                        <div class="w-5 h-5 bg-white/20 rounded-full flex items-center justify-center group-hover:rotate-12 transition-transform">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span>Simpan Paket</span>
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

        <!-- Additional Info Card -->
        <div class="mt-8 bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/20 animate-fade-in-up animation-delay-800">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-amber-400 to-orange-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 mb-2">Tips Membuat Paket Menarik</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Gunakan nama yang mudah diingat dan menggambarkan value proposition</li>
                        <li>• Buat deskripsi yang jelas dan menekankan keuntungan untuk pelanggan</li>
                        <li>• Pilih kombinasi layanan yang saling melengkapi</li>
                        <li>• Pastikan harga kompetitif dibanding paket individual</li>
                    </ul>
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

/* Enhanced multi-select styling */
#services {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 12px center;
    background-repeat: no-repeat;
    background-size: 16px;
}

#services:focus {
    background-image: none;
}

/* Custom scrollbar */
#services::-webkit-scrollbar {
    width: 6px;
}

#services::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

#services::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

#services::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>

<script>
// Enhanced multi-select functionality with smooth transitions
document.getElementById('services').addEventListener('focus', function() {
    this.style.transition = 'all 0.3s ease';
    this.size = Math.min(this.options.length, 8);
    this.style.height = 'auto';
});

document.getElementById('services').addEventListener('blur', function() {
    setTimeout(() => {
        this.size = 1;
        this.style.height = '56px';
    }, 150);
});

// Add hover effects for options
const selectOptions = document.querySelectorAll('#services option');
selectOptions.forEach(option => {
    option.addEventListener('mouseover', function() {
        this.style.backgroundColor = '#dbeafe';
    });
    option.addEventListener('mouseout', function() {
        this.style.backgroundColor = '';
    });
});

// Form validation enhancements
const form = document.querySelector('form');
const inputs = form.querySelectorAll('input, textarea, select');

inputs.forEach(input => {
    input.addEventListener('blur', function() {
        validateInput(this);
    });
    
    input.addEventListener('input', function() {
        clearValidationError(this);
    });
});

function validateInput(input) {
    if (input.hasAttribute('required') && !input.value.trim()) {
        showValidationError(input, 'Field ini wajib diisi');
    } else if (input.type === 'number' && input.value < 0) {
        showValidationError(input, 'Harga tidak boleh negatif');
    }
}

function showValidationError(input, message) {
    clearValidationError(input);
    
    input.classList.add('border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    input.classList.remove('border-gray-200', 'focus:ring-blue-500', 'focus:border-blue-500');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'validation-error text-red-600 text-sm mt-1 flex items-center';
    errorDiv.innerHTML = `
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        ${message}
    `;
    
    input.parentNode.appendChild(errorDiv);
}

function clearValidationError(input) {
    input.classList.remove('border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
    input.classList.add('border-gray-200', 'focus:ring-blue-500', 'focus:border-blue-500');
    
    const errorDiv = input.parentNode.querySelector('.validation-error');
    if (errorDiv) {
        errorDiv.remove();
    }
}

// Price formatting
const priceInput = document.getElementById('price');
priceInput.addEventListener('input', function() {
    // Remove any non-digit characters except for the decimal point
    let value = this.value.replace(/[^\d]/g, '');
    
    // Add thousand separators
    if (value) {
        value = parseInt(value).toLocaleString('id-ID');
        // Update placeholder to show formatted number
        this.setAttribute('data-formatted', 'Rp ' + value);
    }
});

// Auto-resize textarea
const textarea = document.getElementById('description');
textarea.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Add loading state to submit button
form.addEventListener('submit', function() {
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <svg class="animate-spin w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path>
        </svg>
        <span>Menyimpan...</span>
    `;
    
    // Reset after 10 seconds (fallback)
    setTimeout(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }, 10000);
});
</script>
@endsection