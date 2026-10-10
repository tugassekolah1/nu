@props([
    'jabatanMap',
    'nilai' => '',
])

<div class="mb-4">
    <x-input-label for="jabatan" value="Jabatan" />

    {{-- Nilai akhir yang dikirim ke server; select di bawah hanya pemilih tampilan. --}}
    <input type="hidden" name="jabatan" id="jabatan-value" value="{{ $nilai }}">

    <select id="jabatan" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        <option value="">-- Pilih organisasi / banom terlebih dahulu --</option>
    </select>

    <div id="jabatan-lainnya-wrap" class="mt-2 hidden">
        <x-input-label for="jabatan-lainnya" value="Tulis Jabatan Lain" />
        <x-text-input id="jabatan-lainnya" type="text" class="mt-1 block w-full"
                      placeholder="Contoh: Kepala Bagian Tata Usaha" />
    </div>

    <p class="text-xs text-gray-500 mt-1">
        Pilihan jabatan menyesuaikan banom yang dipilih. Gunakan
        <strong>Lainnya</strong> untuk menulis jabatan khusus.
        Satu jabatan hanya boleh diisi satu orang dalam satu organisasi.
    </p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var JABATAN_MAP = @json($jabatanMap);
        var LAINNYA = '__lainnya__';

        var banomSelect = document.getElementById('banom');
        var jabatanSelect = document.getElementById('jabatan');
        var jabatanValue = document.getElementById('jabatan-value');
        var lainnyaWrap = document.getElementById('jabatan-lainnya-wrap');
        var jabatanLainnya = document.getElementById('jabatan-lainnya');

        if (! banomSelect || ! jabatanSelect || ! jabatanValue) {
            return;
        }

        function tambahOpsi(nilai, teks, terpilih) {
            var opsi = document.createElement('option');
            opsi.value = nilai;
            opsi.textContent = teks;
            if (terpilih) {
                opsi.selected = true;
            }
            jabatanSelect.appendChild(opsi);
        }

        function sinkronNilai() {
            if (jabatanSelect.value === LAINNYA) {
                lainnyaWrap.classList.remove('hidden');
                jabatanValue.value = jabatanLainnya.value.trim();
            } else {
                lainnyaWrap.classList.add('hidden');
                jabatanValue.value = jabatanSelect.value;
            }
        }

        function isiOpsiJabatan(pertahankanNilai) {
            var nilaiSebelumnya = pertahankanNilai ? jabatanValue.value : '';
            var daftar = JABATAN_MAP[banomSelect.value] || JABATAN_MAP['__default__'];

            jabatanSelect.innerHTML = '';
            tambahOpsi('', banomSelect.value ? '-- Pilih jabatan --' : '-- Pilih organisasi / banom terlebih dahulu --', ! nilaiSebelumnya);

            var adaDiDaftar = daftar.indexOf(nilaiSebelumnya) !== -1;

            daftar.forEach(function (jabatan) {
                tambahOpsi(jabatan, jabatan, jabatan === nilaiSebelumnya);
            });

            // Nilai lama di luar daftar (mis. data sebelum dropdown ada) tetap bisa ditampilkan.
            if (nilaiSebelumnya && ! adaDiDaftar) {
                tambahOpsi(nilaiSebelumnya, nilaiSebelumnya + ' (jabatan saat ini)', true);
                adaDiDaftar = true;
            }

            tambahOpsi(LAINNYA, 'Lainnya...', ! adaDiDaftar);

            if (! adaDiDaftar) {
                jabatanLainnya.value = nilaiSebelumnya;
            }

            sinkronNilai();
        }

        banomSelect.addEventListener('change', function () {
            isiOpsiJabatan(false);
        });

        jabatanSelect.addEventListener('change', sinkronNilai);
        jabatanLainnya.addEventListener('input', sinkronNilai);

        isiOpsiJabatan(true);
    });
</script>
