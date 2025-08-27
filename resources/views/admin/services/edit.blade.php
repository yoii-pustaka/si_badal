@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Layanan</h1>
        <p class="text-gray-600">Perbarui informasi layanan yang tersedia</p>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800 mb-2">Terjadi kesalahan:</h3>
                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Informasi Layanan
            </h2>
        </div>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="p-6 space-y-6" id="serviceForm">
            @csrf
            @method('PATCH')

            <div class="space-y-2">
                <label for="name" class="block text-sm font-semibold text-gray-700">
                    Nama Layanan
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                        value="{{ old('name', $service->name) }}" 
                        placeholder="Masukkan nama layanan..."
                        required
                    >
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <p class="text-xs text-gray-500 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    Nama layanan harus unik dan mudah diingat
                </p>
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-sm font-semibold text-gray-700">
                    Deskripsi
                </label>
                <div class="relative">
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-y @error('description') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                        placeholder="Tuliskan deskripsi detail mengenai layanan ini..."
                        style="min-height: 100px;"
                    >{{ old('description', $service->description) }}</textarea>
                    <div class="absolute top-2 right-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800" id="charCount">
                            0 karakter
                        </span>
                    </div>
                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <p class="text-xs text-gray-500 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    Jelaskan fitur dan manfaat utama layanan ini
                </p>
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-end sm:space-x-3 pt-6 border-t border-gray-200 space-y-3 sm:space-y-0">
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Batal
                </a>
                <button type="submit" id="submitBtn" class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-4 h-4 mr-2 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                    </svg>
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden btn-spinner" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="btn-text">Update</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for description
    const descTextarea = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    
    function updateCharCount() {
        const count = descTextarea.value.length;
        charCount.textContent = count + ' karakter';
        
        if (count > 500) {
            charCount.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
        } else if (count > 200) {
            charCount.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800';
        } else {
            charCount.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
        }
    }
    
    descTextarea.addEventListener('input', updateCharCount);
    updateCharCount(); // Initial count
    
    // Form submission with loading state
    const form = document.getElementById('serviceForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnIcon = submitBtn.querySelector('.btn-icon');
    const spinner = submitBtn.querySelector('.btn-spinner');
    
    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        btnText.textContent = 'Menyimpan...';
        btnIcon.classList.add('hidden');
        spinner.classList.remove('hidden');
    });
    
    // Auto-focus on first input
    document.getElementById('name').focus();
});
</script>
@endsection