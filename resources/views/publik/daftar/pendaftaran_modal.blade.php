<div id="daftarModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
    <div id="modalContainer" class="flex items-center justify-center min-h-screen px-4 py-8">
        {{-- HANYA BERI ID PADA DIV YANG MENAMPUNG CONTENT FORM --}}
        <div id="modalContent" class="relative w-full max-w-4xl p-6 bg-white shadow-2xl rounded-xl">

            {{-- Tombol Close --}}
            <button onclick="document.getElementById('daftarModal').classList.add('hidden')"
                class="absolute text-gray-500 transition top-4 right-4 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <h3 class="mb-6 text-3xl font-bold text-[#0C3C6C] text-center">Formulir Pendaftaran</h3>

            <form id="registrationForm" class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @csrf

                {{-- KONTEN FORM ANDA DI SINI --}}
                {{-- ... (Field Form yang sudah ada) ... --}}
                <div class="lg:col-span-3">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Data Pribadi</h4>
                </div>
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                    <input type="text" id="full_name" name="full_name" required
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-full_name"></p>
                </div>
                <div>
                    <label for="national_id" class="block text-sm font-medium text-gray-700">NIK <span
                                class="text-red-500">*</span></label>
                    <input type="text" id="national_id" name="national_id" required
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-national_id"></p>
                </div>
                <div>
                    <label for="family_card_number" class="block text-sm font-medium text-gray-700">Nomor Kartu Keluarga
                        (KK)</label>
                    <input type="text" id="family_card_number" name="family_card_number"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-family_card_number"></p>
                </div>
                <div>
                    <label for="birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="birth_place" name="birth_place"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-birth_place"></p>
                </div>
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="birth_date" name="birth_date"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-birth_date"></p>
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select id="gender" name="gender"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                        <option value="other">Lainnya</option>
                    </select>
                    <p class="hidden mt-1 text-xs text-red-500" id="error-gender"></p>
                </div>
                <div>
                    <label for="nationality" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                    <input type="text" id="nationality" name="nationality" value="Indonesia"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-nationality"></p>
                </div>
                <div class="lg:col-span-3">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Informasi Kontak
                        & Alamat</h4>
                </div>
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="tel" id="phone_number" name="phone_number"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]"
                        placeholder="Contoh: 0812xxxxxxxx">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-phone_number"></p>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-email"></p>
                </div>
                <div class="lg:col-span-3">
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <textarea id="address" name="address" rows="3"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]"></textarea>
                    <p class="hidden mt-1 text-xs text-red-500" id="error-address"></p>
                </div>
                <div>
                    <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                    <input type="text" id="province" name="province"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-province"></p>
                </div>
                <div>
                    <label for="city_district" class="block text-sm font-medium text-gray-700">Kota / Kabupaten</label>
                    <input type="text" id="city_district" name="city_district"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-city_district"></p>
                </div>
                <div>
                    <label for="sub_district" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <input type="text" id="sub_district" name="sub_district"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-sub_district"></p>
                </div>
                <div>
                    <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan / Desa</label>
                    <input type="text" id="village" name="village"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-village"></p>
                </div>
                <div>
                    <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                    <input type="text" id="rt" name="rt"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-rt"></p>
                </div>
                <div>
                    <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                    <input type="text" id="rw" name="rw"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-rw"></p>
                </div>
                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                    <input type="text" id="postal_code" name="postal_code"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-postal_code"></p>
                </div>
                <div class="lg:col-span-3">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Data Keluarga
                    </h4>
                </div>
                <div>
                    <label for="father_name" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                    <input type="text" id="father_name" name="father_name"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-father_name"></p>
                </div>
                <div>
                    <label for="mother_name" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                    <input type="text" id="mother_name" name="mother_name"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-mother_name"></p>
                </div>
                <div>
                    <label for="siblings_count" class="block text-sm font-medium text-gray-700">Jumlah Saudara
                        Kandung</label>
                    <input type="number" id="siblings_count" name="siblings_count" min="0"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-siblings_count"></p>
                </div>
                <div>
                    <label for="child_number" class="block text-sm font-medium text-gray-700">Anak Ke-</label>
                    <input type="number" id="child_number" name="child_number" min="1"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]">
                    <p class="hidden mt-1 text-xs text-red-500" id="error-child_number"></p>
                </div>
                <div class="lg:col-span-3">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Deskripsi Singkat / Bio</label>
                    <textarea id="bio" name="bio" rows="3"
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:ring-[#0C3C6C] focus:border-[#0C3C6C]"></textarea>
                    <p class="hidden mt-1 text-xs text-red-500" id="error-bio"></p>
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-4 text-center lg:col-span-3">
                    <button type="submit" id="submitBtn"
                        class="px-8 py-3 text-white bg-[#0C3C6C] font-semibold rounded-md hover:bg-[#0a3560] transition">
                        Daftar Sekarang
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- SCRIPT DITARUH DI BAWAHNYA --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function closeModal() {
        document.getElementById('daftarModal').classList.add('hidden');
    }

    const daftarModal = document.getElementById('daftarModal');
    const modalContent = document.getElementById('modalContent');
    
    daftarModal.addEventListener('click', function(event) {
        if (event.target === daftarModal || event.target.id === 'modalContainer') {
            closeModal();
        }
    });

    document.getElementById('registrationForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = 'Memproses...';
        submitBtn.disabled = true;

        document.querySelectorAll('.text-red-500').forEach(el => {
            if (el.id.startsWith('error-')) {
                el.classList.add('hidden');
                el.innerHTML = '';
            }
        });

        const formData = new FormData(this);

        fetch("{{ route('publik.daftar.index') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => { throw data; });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // 🔔 ALERT KHUSUS PENDAFTARAN BERHASIL
                    Swal.fire({
                        icon: 'success',
                        title: 'Pendaftaran Berhasil!',
                        html: `<p class="text-lg">Tunggu info lebih lanjut dari pihak sekolah.</p>`,
                        showConfirmButton: true,
                        confirmButtonText: 'Oke',
                        confirmButtonColor: '#0C3C6C',
                    }).then(() => {
                        // Tutup modal dan reset form tanpa redirect
                        closeModal();
                        document.getElementById('registrationForm').reset();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.message || 'Terjadi kesalahan tidak terduga.',
                    });
                }
            })
            .catch(error => {
                if (error.errors) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data Belum Lengkap!',
                        text: 'Silakan periksa kembali isian Anda.',
                    });
                    for (const field in error.errors) {
                        const errorEl = document.getElementById(`error-${field}`);
                        if (errorEl) {
                            errorEl.innerHTML = error.errors[field][0];
                            errorEl.classList.remove('hidden');
                        }
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Server',
                        text: error.message || 'Terjadi kesalahan server. Mohon hubungi administrator.',
                    });
                }
            })
            .finally(() => {
                submitBtn.innerHTML = 'Daftar Sekarang';
                submitBtn.disabled = false;
            });
    });
</script>
