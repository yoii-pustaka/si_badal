@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Form Pendaftaran Badal Umroh</h1>
                <p class="text-gray-600">Lengkapi data di bawah ini untuk melanjutkan pendaftaran</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Form Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ request('package_id') }}">

                            <!-- Data Almarhum/Almarhumah -->
                            <div class="border-b pb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-user mr-2 text-blue-500"></i>
                                    Data Almarhum/Almarhumah
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Nama Almarhum/Almarhumah *
                                        </label>
                                        <input type="text"
                                            name="nama_alm"
                                            value="{{ old('nama_alm') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_alm') border-red-500 @enderror"
                                            placeholder="Masukkan nama lengkap">
                                        @error('nama_alm')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Bin/Binti *
                                        </label>
                                        <input type="text"
                                            name="bin_binti"
                                            value="{{ old('bin_binti') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('bin_binti') border-red-500 @enderror"
                                            placeholder="Nama ayah">
                                        @error('bin_binti')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Kondisi *
                                    </label>
                                    <select name="kondisi" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kondisi') border-red-500 @enderror">
                                        <option value="">Pilih kondisi</option>
                                        <option value="almarhum" {{ old('kondisi') === 'almarhum' ? 'selected' : '' }}>Almarhum/Almarhumah</option>
                                        <option value="tua renta" {{ old('kondisi') === 'tua renta' ? 'selected' : '' }}>Tua Renta</option>
                                        <option value="sakit" {{ old('kondisi') === 'sakit' ? 'selected' : '' }}>Sakit</option>
                                    </select>
                                    @error('kondisi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Data Pendaftar -->
                            <div class="border-b pb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-id-card mr-2 text-green-500"></i>
                                    Data Pendaftar
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Nama Pendaftar
                                        </label>
                                        <input type="text"
                                            value="{{ auth()->user()->name }}"
                                            class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed"
                                            readonly>
                                        <p class="text-xs text-gray-500 mt-1">Nama diambil dari akun yang login</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            No. HP/WhatsApp *
                                        </label>
                                        <input type="text"
                                            name="no_hp"
                                            value="{{ old('no_hp') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('no_hp') border-red-500 @enderror"
                                            placeholder="08xxxxxxxxxx">
                                        @error('no_hp')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Alamat Lengkap *
                                    </label>
                                    <textarea name="alamat_pendaftar"
                                        rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alamat_pendaftar') border-red-500 @enderror"
                                        placeholder="Masukkan alamat lengkap">{{ old('alamat_pendaftar') }}</textarea>
                                    @error('alamat_pendaftar')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Keterangan Tambahan -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-comment-alt mr-2 text-yellow-500"></i>
                                    Keterangan Tambahan
                                </h3>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Keterangan (Opsional)
                                    </label>
                                    <textarea name="keterangan"
                                        rows="4"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Tambahkan keterangan khusus jika diperlukan">{{ old('keterangan') }}</textarea>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-6">
                                <a href="{{ route('packages') }}"
                                    class="flex-1 bg-gray-500 text-white py-3 px-6 rounded-lg font-semibold text-center hover:bg-gray-600 transition duration-200">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Kembali ke Paket
                                </a>
                                <button type="submit"
                                    class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Submit Pendaftaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>

                        @if(request('package_id'))
                        @php
                        $selectedPackage = App\Models\Package::find(request('package_id'));
                        @endphp
                        @if($selectedPackage)
                        <div class="border rounded-lg p-4 mb-4">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 {{ $selectedPackage->type === 'ekonomi' ? 'bg-blue-500' : ($selectedPackage->type === 'standar' ? 'bg-orange-500' : 'bg-purple-500') }} rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-cube text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">{{ $selectedPackage->name }}</h4>
                                    <span class="inline-block px-2 py-1 bg-gray-200 rounded text-xs uppercase">
                                        {{ $selectedPackage->type }}
                                    </span>
                                </div>
                            </div>

                            <div class="border-t pt-3">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600">Harga Paket:</span>
                                    <span class="font-semibold">Rp {{ number_format($selectedPackage->price, 0, ',', '.') }}</span>
                                </div>
                                @if($selectedPackage->original_price > $selectedPackage->price)
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600">Diskon:</span>
                                    <span class="text-green-600">-Rp {{ number_format($selectedPackage->original_price - $selectedPackage->price, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                <hr class="my-2">
                                <div class="flex justify-between items-center text-lg font-bold">
                                    <span>Total:</span>
                                    <span class="text-blue-600">Rp {{ number_format($selectedPackage->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif

                        <!-- Contact Info -->
                        <div class="border-t pt-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Butuh Bantuan?</h4>
                            <div class="text-sm text-gray-600 space-y-1">
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-green-500 mr-2"></i>
                                    <span>+62 812-3456-7890</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>
                                    <span>info@revasarif.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Format phone number
    document.querySelector('input[name="no_hp"]').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0 && !value.startsWith('08')) {
            if (value.startsWith('62')) {
                value = '0' + value.substring(2);
            } else if (!value.startsWith('0')) {
                value = '08' + value;
            }
        }
        e.target.value = value;
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = ['nama_alm', 'bin_binti', 'kondisi', 'alamat_pendaftar', 'no_hp'];
        let hasError = false;

        requiredFields.forEach(field => {
            const input = document.querySelector(`[name="${field}"]`);
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                hasError = true;
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (hasError) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi (*)');
        }
    });
</script>
@endpush