<!-- Modal Wizard Pendaftaran Siswa Baru -->
<div id="daftarModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50">
    <div id="modalContainer" class="flex items-center justify-center min-h-screen px-4 py-8">
        <!-- CONTENT WRAPPER -->
        <div id="modalContent" class="relative w-full max-w-4xl p-6 bg-white shadow-2xl rounded-xl">
            <!-- Tombol Close -->
            <button type="button" onclick="closeModal()"
                class="absolute text-gray-500 transition top-4 right-4 hover:text-gray-800" aria-label="Tutup modal">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <h3 class="mb-2 text-3xl font-bold text-[#0C3C6C] text-center">Formulir Pendaftaran</h3>
            <p class="mb-4 text-sm text-center text-gray-500">Lengkapi data per langkah. Progres akan bertambah setiap
                kamu lanjut.</p>

            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-xs font-medium text-gray-600">Progres</span>
                    <span id="progressText" class="text-xs font-semibold text-[#0C3C6C]">0%</span>
                </div>
                <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                    <div id="progressBar" class="h-3 bg-[#0C3C6C] transition-all duration-300" style="width:0%"></div>
                </div>
            </div>

            <!-- FORM -->
            <form id="registrationForm" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <!-- STEP 1: Data Pribadi -->
                <section class="step" data-step="1">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Data Pribadi</h4>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="full_name" name="full_name" data-required class="input">
                            <p class="err" id="error-full_name"></p>
                        </div>
                        <div>
                            <label for="national_id" class="block text-sm font-medium text-gray-700">NIK <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="national_id" name="national_id" data-required inputmode="numeric"
                                pattern="^\d{16}$" minlength="16" maxlength="16" class="input">
                            <p class="err" id="error-national_id"></p>
                        </div>
                        <div>
                            <label for="family_card_number" class="block text-sm font-medium text-gray-700">Nomor KK
                            </label>
                            <input type="text" id="family_card_number" name="family_card_number" data-required
                                inputmode="numeric" pattern="^\d{16}$" minlength="16" maxlength="16" class="input">
                            <p class="err" id="error-family_card_number"></p>
                        </div>
                        <div>
                            <label for="birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="birth_place" name="birth_place" data-required class="input">
                            <p class="err" id="error-birth_place"></p>
                        </div>
                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir <span
                                    class="text-red-500">*</span></label>
                            <input type="date" id="birth_date" name="birth_date" data-required class="input">
                            <p class="err" id="error-birth_date"></p>
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin <span
                                    class="text-red-500">*</span></label>
                            <select id="gender" name="gender" data-required class="input">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                                <option value="other">Lainnya</option>
                            </select>
                            <p class="err" id="error-gender"></p>
                        </div>
                    </div>
                </section>

                <!-- STEP 2: Kontak & Alamat -->
                <section class="hidden step" data-step="2">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Informasi Kontak
                        & Alamat</h4>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon
                                <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone_number" name="phone_number" data-required inputmode="tel"
                                pattern="^(\+62|62|0)8[1-9][0-9]{6,10}$" placeholder="0812xxxxxxxx" class="input">
                            <p class="err" id="error-phone_number"></p>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="input">
                            <p class="err" id="error-email"></p>
                        </div>
                        <div class="lg:col-span-3">
                            <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap <span
                                    class="text-red-500">*</span></label>
                            <textarea id="address" name="address" rows="3" data-required class="input"></textarea>
                            <p class="err" id="error-address"></p>
                        </div>
                        <div>
                            <label for="province" class="block text-sm font-medium text-gray-700">Provinsi <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="province" name="province" data-required class="input">
                            <p class="err" id="error-province"></p>
                        </div>
                        <div>
                            <label for="city_district" class="block text-sm font-medium text-gray-700">Kota / Kabupaten
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="city_district" name="city_district" data-required class="input">
                            <p class="err" id="error-city_district"></p>
                        </div>
                        <div>
                            <label for="sub_district" class="block text-sm font-medium text-gray-700">Kecamatan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="sub_district" name="sub_district" data-required class="input">
                            <p class="err" id="error-sub_district"></p>
                        </div>
                        <div>
                            <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan / Desa <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="village" name="village" data-required class="input">
                            <p class="err" id="error-village"></p>
                        </div>
                        <div>
                            <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                            <input type="text" id="rt" name="rt" inputmode="numeric" pattern="^\d{1,3}$" maxlength="3"
                                class="input">
                            <p class="err" id="error-rt"></p>
                        </div>
                        <div>
                            <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                            <input type="text" id="rw" name="rw" inputmode="numeric" pattern="^\d{1,3}$" maxlength="3"
                                class="input">
                            <p class="err" id="error-rw"></p>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                            <input type="text" id="postal_code" name="postal_code" inputmode="numeric" pattern="^\d{5}$"
                                minlength="5" maxlength="5" class="input">
                            <p class="err" id="error-postal_code"></p>
                        </div>
                    </div>
                </section>

                <!-- STEP 3: Pendidikan & Pilihan -->
                <section class="hidden step" data-step="3">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Data Pendidikan &
                        Pilihan</h4>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="nisn" class="block text-sm font-medium text-gray-700">NISN <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="nisn" name="nisn" data-required inputmode="numeric"
                                pattern="^\d{10}$" minlength="10" maxlength="10" class="input">
                            <p class="err" id="error-nisn"></p>
                        </div>
                        <div>
                            <label for="school_origin" class="block text-sm font-medium text-gray-700">Asal Sekolah
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="school_origin" name="school_origin" data-required class="input">
                            <p class="err" id="error-school_origin"></p>
                        </div>
                        <div>
                            <label for="npsn_origin" class="block text-sm font-medium text-gray-700">NPSN Sekolah
                                Asal</label>
                            <input type="text" id="npsn_origin" name="npsn_origin" inputmode="numeric" pattern="^\d{8}$"
                                minlength="8" maxlength="8" class="input">
                            <p class="err" id="error-npsn_origin"></p>
                        </div>
                        <div>
                            <label for="graduation_year" class="block text-sm font-medium text-gray-700">Tahun
                                Lulus</label>
                            <input type="number" id="graduation_year" name="graduation_year" min="2005" max="2099"
                                step="1" class="input">
                            <p class="err" id="error-graduation_year"></p>
                        </div>
                        <div>
                            <label for="applying_grade" class="block text-sm font-medium text-gray-700">Daftar ke
                                Kelas</label>
                            <select id="applying_grade" name="applying_grade" class="input">
                                <option value="">Pilih Kelas</option>
                                <option>1</option>
                                <option>7</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div>
                            <label for="admission_path" class="block text-sm font-medium text-gray-700">Jalur
                                Pendaftaran</label>
                            <select id="admission_path" name="admission_path" class="input">
                                <option value="">Pilih Jalur</option>
                                <option>Zonasi</option>
                                <option>Prestasi</option>
                                <option>Afirmasi</option>
                                <option>Perpindahan Orang Tua/Mutasi</option>
                            </select>
                        </div>
                        <div class="lg:col-span-3" id="majorWrapper" hidden>
                            <label for="major" class="block text-sm font-medium text-gray-700">Pilihan Jurusan
                                (SMA/SMK)</label>
                            <select id="major" name="major" class="input">
                                <option value="">Pilih Jurusan</option>
                                <option>IPA</option>
                                <option>IPS</option>
                                <option>TKJ</option>
                                <option>Akuntansi</option>
                            </select>
                            <p class="err" id="error-major"></p>
                        </div>
                    </div>
                </section>

                <!-- STEP 4: Keluarga & Wali + Lampiran & Persetujuan -->
                <section class="hidden step" data-step="4">
                    <h4 class="pb-1 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Keluarga & Wali
                    </h4>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="father_name" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                            <input type="text" id="father_name" name="father_name" class="input">
                            <p class="err" id="error-father_name"></p>
                        </div>
                        <div>
                            <label for="mother_name" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                            <input type="text" id="mother_name" name="mother_name" class="input">
                            <p class="err" id="error-mother_name"></p>
                        </div>
                        <div>
                            <label for="guardian_name" class="block text-sm font-medium text-gray-700">Nama Wali <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="guardian_name" name="guardian_name" data-required class="input">
                            <p class="err" id="error-guardian_name"></p>
                        </div>
                        <div>
                            <label for="guardian_phone" class="block text-sm font-medium text-gray-700">No. HP Wali
                                <span class="text-red-500">*</span></label>
                            <input type="tel" id="guardian_phone" name="guardian_phone" data-required inputmode="tel"
                                pattern="^(\+62|62|0)8[1-9][0-9]{6,10}$" placeholder="0812xxxxxxxx" class="input">
                            <p class="err" id="error-guardian_phone"></p>
                        </div>
                    </div>

                    <h4 class="pb-1 mt-6 mb-3 text-lg font-semibold text-gray-700 border-b border-gray-200">Lampiran
                        (opsional)</h4>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="file_kk" class="block text-sm font-medium text-gray-700">Kartu Keluarga
                                (PDF/JPG, ≤2MB)</label>
                            <input type="file" id="file_kk" name="file_kk" accept=".pdf,.jpg,.jpeg,.png"
                                class="input file:mr-3 file:py-2 file:px-3 file:border-0 file:rounded file:bg-gray-100 file:text-gray-700" />
                            <p class="err" id="error-file_kk"></p>
                        </div>
                        <div>
                            <label for="file_akta" class="block text-sm font-medium text-gray-700">Akta Kelahiran
                                (PDF/JPG, ≤2MB)</label>
                            <input type="file" id="file_akta" name="file_akta" accept=".pdf,.jpg,.jpeg,.png"
                                class="input file:mr-3 file:py-2 file:px-3 file:border-0 file:rounded file:bg-gray-100 file:text-gray-700" />
                            <p class="err" id="error-file_akta"></p>
                        </div>
                        <div>
                            <label for="file_pasfoto" class="block text-sm font-medium text-gray-700">Pas Foto (JPG/PNG,
                                ≤1MB)</label>
                            <input type="file" id="file_pasfoto" name="file_pasfoto" accept=".jpg,.jpeg,.png"
                                class="input file:mr-3 file:py-2 file:px-3 file:border-0 file:rounded file:bg-gray-100 file:text-gray-700" />
                            <p class="err" id="error-file_pasfoto"></p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        <label class="flex items-start gap-2">
                            <input type="checkbox" id="consent_data" name="consent_data" data-required class="mt-1">
                            <span class="text-sm text-gray-700">Saya menyetujui pengolahan data pribadi sesuai kebijakan
                                privasi sekolah.</span>
                        </label>
                        <label class="flex items-start gap-2">
                            <input type="checkbox" id="consent_truth" name="consent_truth" data-required class="mt-1">
                            <span class="text-sm text-gray-700">Saya menyatakan seluruh data yang saya berikan adalah
                                benar.</span>
                        </label>
                        <label class="flex items-start gap-2">
                            <input type="checkbox" id="consent_contact" name="consent_contact" class="mt-1">
                            <span class="text-sm text-gray-700">Saya bersedia dihubungi via WhatsApp/telepon untuk
                                verifikasi.</span>
                        </label>
                        <input type="text" name="website" id="website" class="hidden" tabindex="-1" autocomplete="off">
                    </div>
                </section>

                <!-- NAVIGATION BUTTONS -->
                <div class="flex items-center justify-between pt-2">
                    <button type="button" id="prevBtn"
                        class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100 rounded-md disabled:opacity-40">Sebelumnya</button>
                    <div class="space-x-2">
                        <button type="button" id="nextBtn"
                            class="px-6 py-2 text-sm font-semibold text-white rounded-md bg-[#0C3C6C] hover:bg-[#0a3560]">Selanjutnya</button>
                        <button type="submit" id="submitBtn"
                            class="hidden px-6 py-2 text-sm font-semibold text-white rounded-md bg-[#0C3C6C] hover:bg-[#0a3560]">Kirim
                            Pendaftaran</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Utility classes for inputs and error text
    ; (function addStyles() {
        const style = document.createElement('style');
        style.innerHTML = `
  /* ====== Input comfort styles (pure CSS) ====== */
  .input{
    width:100%; padding:0.625rem 0.75rem; margin-top:0.25rem;
    border:1px solid #e5e7eb; border-radius:0.75rem; background:#fff; color:#111827;
    outline:none; transition:box-shadow .2s, border-color .2s, background-color .2s;
  }
  .input:hover{ background:#fafafa }
  .input:focus{ border-color:#0C3C6C; box-shadow:0 0 0 4px rgba(12,60,108,.15) }
  .input::placeholder{ color:#9ca3af }
  textarea.input{ min-height:3rem }

  /* Error */
  .err{ display:none; margin-top:0.25rem; font-size:.75rem; color:#dc2626 }
  .invalid{ border-color:#ef4444 !important; box-shadow:0 0 0 3px rgba(239,68,68,.15) !important }
  .label-invalid{ color:#dc2626 !important }

  /* Fokus: label ikut menonjol */
  .step .grid > div{ position:relative }
  .step .grid > div label{ transition: color .2s }
  .step .grid > div:focus-within label{ color:#0C3C6C }

  /* Checkbox nyaman */
  input[type="checkbox"]{ width:1.05rem; height:1.05rem; border-radius:0.375rem; accent-color:#0C3C6C }

  /* Sticky nav bar feel untuk tombol */
  #registrationForm .form-footer{
    position:sticky; bottom:0; background:#fff; padding-top:.5rem; margin-top:.25rem;
    box-shadow:0 -6px 12px -10px rgba(0,0,0,.12);
  }
`; document.head.appendChild(style);
    })();

    function closeModal() { document.getElementById('daftarModal').classList.add('hidden'); }

    // Klik di luar konten menutup modal
    const daftarModal = document.getElementById('daftarModal');
    const modalContent = document.getElementById('modalContent');
    daftarModal?.addEventListener('click', (e) => { if (!modalContent.contains(e.target)) closeModal(); });

    // Stepper logic
    const steps = Array.from(document.querySelectorAll('.step'));
    const totalSteps = steps.length;
    let currentStep = 1; // 1-based

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');

    function updateProgress() {
        const percent = Math.round(((currentStep - 1) / totalSteps) * 100);
        progressBar.style.width = percent + '%';
        progressText.textContent = percent + '%';
    }

    function showStep(n) {
        steps.forEach(s => s.classList.add('hidden'));
        const el = steps[n - 1];
        if (el) { el.classList.remove('hidden'); }
        prevBtn.disabled = n === 1;
        nextBtn.classList.toggle('hidden', n === totalSteps);
        submitBtn.classList.toggle('hidden', n !== totalSteps);
        currentStep = n;
        updateProgress();
        window.setTimeout(() => { modalContent.scrollTo({ top: 0, behavior: 'smooth' }); }, 0);
    }

    // Validate current step
    function validateStep(stepIndex) {
        const stepEl = steps[stepIndex - 1];
        const requiredFields = Array.from(stepEl.querySelectorAll('[data-required]'));
        let ok = true; let firstError = null;

        // reset visuals
        stepEl.querySelectorAll('.invalid').forEach(i => i.classList.remove('invalid'));
        stepEl.querySelectorAll('.label-invalid').forEach(i => i.classList.remove('label-invalid'));
        stepEl.querySelectorAll('.err').forEach(i => { i.textContent = ''; i.classList.add('hidden'); });

        requiredFields.forEach(field => {
            const id = field.id; const label = stepEl.querySelector(`label[for="${id}"]`);
            const errEl = document.getElementById(`error-${id}`);

            const value = (field.type === 'checkbox') ? field.checked : (field.value || '').trim();
            const empty = (field.type === 'checkbox') ? !value : value === '';
            let patternOk = true;
            if (field.pattern) { try { patternOk = new RegExp(field.pattern).test(field.value); } catch (e) { patternOk = true; } }

            if (empty || !patternOk) {
                ok = false;
                field.classList.add('invalid');
                if (label) label.classList.add('label-invalid');
                if (errEl) {
                    errEl.textContent = empty ? 'Wajib diisi.' : 'Format tidak sesuai.';
                    errEl.classList.remove('hidden');
                    errEl.setAttribute('role', 'alert');
                }
                if (!firstError) firstError = field;
            }
        });
        // Validasi pola untuk field opsional: hanya cek jika terisi
        const patternFields = Array.from(stepEl.querySelectorAll('input[pattern], textarea[pattern], select[pattern]'));
        patternFields.forEach(field => {
            const val = (field.value || '').trim();
            if (val !== '' && field.pattern) {
                let patternOk = true;
                try { patternOk = new RegExp(field.pattern).test(val); } catch (e) { patternOk = true; }
                if (!patternOk) {
                    ok = false;
                    const id = field.id;
                    const label = stepEl.querySelector(`label[for="${id}"]`);
                    const errEl = document.getElementById(`error-${id}`);
                    field.classList.add('invalid');
                    if (label) label.classList.add('label-invalid');
                    if (errEl) { errEl.textContent = 'Format tidak sesuai.'; errEl.classList.remove('hidden'); errEl.setAttribute('role', 'alert'); }
                    if (!firstError) firstError = field;
                }
            }
        });

        if (!ok) {
            Swal.fire({ icon: 'warning', title: 'Data Belum Lengkap', text: 'Silakan lengkapi data di langkah ini sebelum lanjut.', confirmButtonColor: '#0C3C6C' });
            if (firstError) { firstError.focus({ preventScroll: false }); }
        }

        return ok;
    }

    // Major visibility for grade 10
    (function handleMajorVisibility() {
        const grade = document.getElementById('applying_grade');
        const wrapper = document.getElementById('majorWrapper');
        if (!grade || !wrapper) return;
        const toggle = () => { wrapper.hidden = !(grade.value === '10'); };
        grade.addEventListener('change', toggle); toggle();
    })();

    // Limit birth_date max today
    (function limitBirthDate() {
        const d = new Date(); const today = d.toISOString().slice(0, 10);
        const bd = document.getElementById('birth_date'); if (bd) bd.max = today;
    })();

    (function liveValidation() {
        const form = document.getElementById('registrationForm');

        function isRequiredOk(field) {
            if (field.dataset.required !== undefined) {
                if (field.type === 'checkbox') return field.checked;
                return (field.value || '').trim() !== '';
            }
            return true; // tidak wajib
        }
        function isPatternOk(field) {
            const val = (field.value || '').trim();
            if (field.pattern && val !== '') {
                try { return new RegExp(field.pattern).test(val); } catch (e) { return true; }
            }
            return true; // tidak ada pattern atau kosong
        }

        function setError(field, msg) {
            const id = field.id;
            const label = form.querySelector(`label[for="${id}"]`);
            const errEl = document.getElementById(`error-${id}`);
            field.classList.add('invalid');
            if (label) label.classList.add('label-invalid');
            if (errEl) {
                errEl.textContent = msg;
                errEl.classList.remove('hidden');
                errEl.setAttribute('role', 'alert');
            }
        }
        function clearError(field) {
            const id = field.id;
            const label = form.querySelector(`label[for="${id}"]`);
            const errEl = document.getElementById(`error-${id}`);
            field.classList.remove('invalid');
            if (label) label.classList.remove('label-invalid');
            if (errEl) { errEl.textContent = ''; errEl.classList.add('hidden'); }
        }

        function checkField(field) {
            // cek required
            if (!isRequiredOk(field)) { setError(field, 'Wajib diisi.'); return false; }
            // cek pattern (kalau ada dan sudah terisi)
            if (!isPatternOk(field)) { setError(field, 'Format tidak sesuai.'); return false; }
            // valid -> bersihkan merah
            clearError(field);
            return true;
        }

        // pasang event ke semua input/select/textarea
        const fields = Array.from(form.querySelectorAll('input, select, textarea'));
        fields.forEach(field => {
            const ev = (field.tagName === 'SELECT' || field.type === 'checkbox' || field.type === 'file') ? 'change' : 'input';
            field.addEventListener(ev, () => { checkField(field); });
            field.addEventListener('blur', () => { checkField(field); });
        });

        // helper: hanya angka untuk field angka
        ['national_id', 'family_card_number', 'nisn', 'npsn_origin', 'rt', 'rw', 'postal_code'].forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;
            el.addEventListener('input', () => { el.value = el.value.replace(/\D+/g, ''); });
        });
        // helper: nomor HP boleh + di depan
        ['phone_number', 'guardian_phone'].forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;
            el.addEventListener('input', () => {
                // allow leading + lalu angka saja
                let v = el.value;
                const hasPlus = v.startsWith('+');
                v = v.replace(/\D+/g, '');
                el.value = (hasPlus ? '+' : '') + v;
            });
        });
    })();

    // Nav buttons
    prevBtn.addEventListener('click', () => showStep(Math.max(1, currentStep - 1)));
    nextBtn.addEventListener('click', () => {
        if (validateStep(currentStep)) {
            showStep(Math.min(totalSteps, currentStep + 1));
        }
    });

    // Submit handler (only on last step)
    let isSubmitting = false;
    document.getElementById('registrationForm').addEventListener('submit', function (e) {
        e.preventDefault();
        if (isSubmitting) return;

        // Validate last step again before submit
        if (!validateStep(currentStep)) return;

        isSubmitting = true;
        submitBtn.innerHTML = 'Memproses...';
        submitBtn.disabled = true;

        // reset server error placeholders globally
        document.querySelectorAll('.err').forEach(el => { el.classList.add('hidden'); el.textContent = ''; });

        const formData = new FormData(this);

        fetch("{{ route('publik.daftar.index') }}", {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(r => r.ok ? r.json() : r.json().then(d => { throw d; }))
            .then(data => {
                if (data.success) {
                    // 100% progress when success
                    progressBar.style.width = '100%';
                    progressText.textContent = '100%';
                    Swal.fire({
                        icon: 'success', title: 'Pendaftaran Berhasil!',
                        html: '<p class="text-lg">Tunggu info lebih lanjut dari pihak sekolah.</p>',
                        confirmButtonText: 'Oke', confirmButtonColor: '#0C3C6C'
                    }).then(() => { closeModal(); document.getElementById('registrationForm').reset(); showStep(1); });
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: data.message || 'Terjadi kesalahan tidak terduga.' });
                }
            })
            .catch(error => {
                if (error?.errors) {
                    Swal.fire({ icon: 'warning', title: 'Data Belum Lengkap!', text: 'Periksa kembali isian Anda.' });
                    // map error ke field spesifik jika ada
                    for (const field in error.errors) {
                        const msg = error.errors[field][0];
                        const input = document.getElementById(field);
                        const label = input ? document.querySelector(`label[for="${field}"]`) : null;
                        const errEl = document.getElementById(`error-${field}`);
                        if (input) { input.classList.add('invalid'); }
                        if (label) { label.classList.add('label-invalid'); }
                        if (errEl) { errEl.textContent = msg; errEl.classList.remove('hidden'); errEl.setAttribute('role', 'alert'); }
                    }
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal Server', text: error?.message || 'Terjadi kesalahan server. Mohon hubungi administrator.' });
                }
            })
            .finally(() => { submitBtn.innerHTML = 'Kirim Pendaftaran'; submitBtn.disabled = false; isSubmitting = false; });
    });

    // Inisialisasi tampilan pertama
    showStep(1);
</script>