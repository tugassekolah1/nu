    @vite('resources/css/app.css')

<form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md border">
    @csrf
    
    <h2 class="text-xl font-bold mb-4 text-slate-800">Tambah Pengurus Baru</h2>

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap & Gelar</label>
        <input type="text" name="nama" placeholder="Contoh: K.H. Ahmad Syarif" required
               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 text-sm">
        <span class="text-xs text-slate-400">Tuliskan nama beserta gelar jika ada.</span>
    </div>

    <!-- Jabatan -->
    <div class="mb-4">
        <label class="block text-sm font-semibold text-slate-700 mb-1">Jabatan</label>
        <input type="text" name="jabatan" placeholder="Contoh: Rais Syuriah / Ketua IPNU" required
               class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 text-sm">
    </div>

    <!-- Dropdown Banom / Organisasi -->
    <div class="mb-4">
        <label class="block text-sm font-semibold text-slate-700 mb-1">Pilih Organisasi / Banom</label>
        <select name="banom_select" id="banom_select" onchange="updateLabel(this)" required
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 text-sm bg-white">
            <option value="" disabled selected>-- Pilih Banom --</option>
            <option value="ranting" data-label="Ranting NU">Ranting NU</option>
            <option value="ipnu" data-label="PR IPNU">IPNU (Ikatan Pelajar NU)</option>
            <option value="ippnu" data-label="PR IPPNU">IPPNU (Ikatan Pelajar Putri NU)</option>
            <option value="fatayat" data-label="Fatayat NU">Fatayat NU</option>
            <option value="banser" data-label="Satkoryon Banser">Banser</option>
            <option value="ansor" data-label="GP Ansor">GP Ansor</option>
            <option value="muslimat" data-label="Muslimat NU">Muslimat NU</option>
        </select>
        
        <!-- Input Hidden untuk menyimpan label otomatis -->
        <input type="hidden" name="banom" id="banom">
        <input type="hidden" name="label_banom" id="label_banom">
    </div>

    <!-- Foto -->
    <div class="mb-4">
        <label class="block text-sm font-semibold text-slate-700 mb-1">Foto Pengurus (Opsional)</label>
        <input type="file" name="foto" accept="image/*"
               class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
        <span class="text-xs text-slate-400 block mt-1">Kosongkan jika tidak ada foto, sistem akan menampilkan inisial secara otomatis.</span>
    </div>

    <!-- Urutan -->
    <div class="mb-6">
        <label class="block text-sm font-semibold text-slate-700 mb-1">Nomor Urutan Tampil</label>
        <input type="number" name="urutan" value="1" min="1"
               class="w-24 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-emerald-500">
        <span class="text-xs text-slate-400 block mt-1">Angka lebih kecil akan tampil lebih atas/awal.</span>
    </div>

    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
        Simpan Data
    </button>
</form>

<script>
    function updateLabel(select) {
        const selectedOption = select.options[select.selectedIndex];
        document.getElementById('banom').value = select.value;
        document.getElementById('label_banom').value = selectedOption.getAttribute('data-label');
    }
</script>