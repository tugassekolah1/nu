# 🚀 QUICK START GUIDE: TESTING FITUR CETAK KTA

## ⚡ Quick Access

### URLs
```
Admin Dashboard:     http://localhost:8000/admin/members
Test Member (Paid): http://localhost:8000/members/1/print-card
Download Test:      http://localhost:8000/members/1/download-kta
```

### Test Data (Database)
```
Total Members:   1001
Paid (Cetak OK): 685
Unpaid:          316

Sample Paid ID:  1 (Name: "a", NIK: 1111111111111111)
```

---

## 🧪 Testing Scenarios

### Test 1: Cetak Individual (1 Kartu)
**Steps:**
1. Buka `/admin/members`
2. Scroll ke bawah tabel, cari member dengan status "Lunas / Aktif"
3. Klik icon **🖨️** (printer icon) di kolom aksi
4. Halaman print terbuka dengan preview kartu
5. Klik "Cetak KTA" atau Ctrl+P
6. Dialog print → Klik "Print" atau "Save as PDF"

**Expected:**
- ✅ Kartu CR80 (85.6×53.9mm) terlihat
- ✅ QR code ada di sudut kanan bawah
- ✅ Semua data member tampil (nama, NIK, no kartu, banom)
- ✅ Foto atau initial tampil
- ✅ Print/PDF berhasil

---

### Test 2: Download Individual (1 Kartu)
**Steps:**
1. Buka `/admin/members`
2. Cari member dengan status "Lunas / Aktif"
3. Klik icon **⬇️** (download icon) di kolom aksi
4. Preview halaman terbuka
5. Klik tombol "Cetak / Simpan PDF"
6. Dialog print → "Save as PDF"

**Expected:**
- ✅ Preview kartu ditampilkan di browser
- ✅ Ukuran preview proporsional
- ✅ QR code terlihat jelas
- ✅ Tombol print dialog muncul
- ✅ PDF bisa disimpan

---

### Test 3: Bulk Select (5 Kartu)
**Steps:**
1. Buka `/admin/members`
2. Centang 5 checkbox anggota (hanya yang "Lunas / Aktif")
   - Checkbox hanya ada untuk status "Lunas"
   - Jika "Belum Bayar", checkbox tidak ada
3. Lihat floating bar muncul di bottom dengan teks "5 dipilih"
4. Klik tombol hijau "Cetak KTA Terpilih"
5. Halaman grid kartu muncul (2 kolom)
6. Klik "Cetak KTA" atau Ctrl+P
7. Dialog print → Print atau Save as PDF

**Expected:**
- ✅ Floating bar muncul saat checkbox di-check
- ✅ Counter display "5 dipilih" accurate
- ✅ Grid layout 2 kolom per baris
- ✅ 5 kartu ditampilkan
- ✅ Setiap kartu punya QR unik
- ✅ Print/PDF berhasil

---

### Test 4: Bulk Select All + Toggle
**Steps:**
1. Buka `/admin/members`
2. Klik "Select All" checkbox di header tabel
3. Lihat semua checkbox di baris yang "Lunas" tercentang
4. Floating bar muncul dengan counter (N dipilih)
5. Centang checkbox lain untuk toggle individual
6. Klik "Batal" di floating bar untuk clear semua

**Expected:**
- ✅ Select All hanya check paid members
- ✅ Counter update real-time
- ✅ Individual toggle works
- ✅ Batal button clear semua selection
- ✅ Floating bar hilang saat semua unchecked

---

### Test 5: Bulk Large Scale (50+ Kartu)
**Steps:**
1. Buka `/admin/members`
2. Centang 50 checkbox anggota
3. Floating bar menampilkan "50 dipilih"
4. Klik "Cetak KTA Terpilih"
5. Grid kartu muncul (2 kolom × ~25 baris = ~5-6 halaman A4)
6. Klik "Cetak KTA" atau Ctrl+P
7. Dialog print → Print atau Save as PDF

**Expected:**
- ✅ Grid load cepat (< 5 detik)
- ✅ Layout 2 kolom consistent
- ✅ Page breaks otomatis di print
- ✅ Memory usage reasonable (~10-15MB)
- ✅ PDF bisa save (besar ~20-30MB)

---

### Test 6: Validation - Unpaid Members
**Steps:**
1. Buka `/admin/members`
2. Filter/cari members dengan status "Belum Bayar"
3. Lihat bahwa checkbox TIDAK ada untuk members ini
4. Coba centang member yang "Lunas"
5. Floating bar muncul dengan tombol "Cetak KTA Terpilih"

**Expected:**
- ✅ Checkbox tidak tampil untuk unpaid members
- ✅ Download icon tidak tampil untuk unpaid
- ✅ Print icon tidak tampil untuk unpaid
- ✅ Hanya paid members bisa di-select

---

### Test 7: Empty Selection
**Steps:**
1. Buka `/admin/members`
2. Jangan centang apapun
3. Floating bar TIDAK tampil
4. Coba access `/members/cetak-kta-bulk` secara manual
5. Tidak ada data atau error

**Expected:**
- ✅ Floating bar hidden saat no selection
- ✅ Tombol "Cetak KTA Terpilih" disabled
- ✅ Direct access error graceful

---

### Test 8: Print Preview Accuracy
**Steps:**
1. Test cetak individual member ID 1
2. Verifikasi dimensi kartu di print preview:
   - Width: 85.6mm (3.37 inch)
   - Height: 53.9mm (2.12 inch)
3. Cek print margin 15mm all sides
4. Klik print → lihat output

**Expected:**
- ✅ Dimensi CR80 correct (85.6×53.9mm)
- ✅ Margin 15mm all sides
- ✅ Font size readable (~11px saat cetak)
- ✅ QR code bisa di-scan
- ✅ Foto clear (bukan blur/pixelated)

---

## 📋 Checklist Verifikasi Sebelum Production

```
Database & Data:
  ☐ Total members 1000+ (ada)
  ☐ Paid members 600+ (ada)
  ☐ Test member ID 1 with full data (ada)

Routes & Controllers:
  ☐ Route /members/{id}/print-card (GET) works
  ☐ Route /members/{id}/download-kta (GET) works
  ☐ Route /members/cetak-kta-bulk (POST) works
  ☐ Controller methods return correct views

Views & UI:
  ☐ Checkbox di header tabel ada
  ☐ Checkbox per baris ada (hanya paid)
  ☐ Floating bulk action bar works
  ☐ Download icon di kolom aksi ada
  ☐ Select All toggle works
  ☐ Counter display accurate

Print & Layout:
  ☐ Individual card print OK (CR80)
  ☐ Bulk grid 2 kolom per A4
  ☐ QR code per kartu ada & readable
  ☐ Margin 15mm all sides
  ☐ Page break otomatis
  ☐ Font size readable

Security:
  ☐ Only paid members dapat cetak
  ☐ Unpaid members tidak bisa select
  ☐ Route protected by auth & admin
  ☐ IDs validation works
  ☐ Error handling graceful

Performance:
  ☐ Single print load < 2 sec
  ☐ Bulk print (50) load < 5 sec
  ☐ Memory usage reasonable
  ☐ No timeout on large bulk
  ☐ PDF save works

Documentation:
  ☐ DOKUMENTASI_CETAK_KTA_FINAL.md complete
  ☐ Code comments clear
  ☐ Usage examples provided
```

---

## 🐛 Troubleshooting

### Issue: Checkbox tidak muncul di tabel
**Solution:**
- Clear browser cache (Ctrl+Shift+Delete)
- Run `npm run build` (update Tailwind)
- Restart dev server
- Verifikasi file `index.blade.php` punya checkbox code

### Issue: Floating bar tidak muncul
**Solution:**
- Buka browser console (F12)
- Cek apakah JavaScript error
- Verifikasi `updateBulkActionBar()` function exist
- Clear cache dan reload

### Issue: QR code tidak tampil
**Solution:**
- Verifikasi `simplesoftwareio/simple-qrcode` package installed
- Run `composer require simplesoftwareio/simple-qrcode:^4.2`
- Check QrCode::size() method works in tinker
- Verifikasi view pakai `{!! $qrCode !!}` (tidak escaped)

### Issue: Print layout berantakan
**Solution:**
- Cek print preview (Ctrl+P)
- Verifikasi CSS media query `@media print` ada
- Adjust margin di CSS jika perlu
- Test di berbagai browser (Chrome, Firefox, Safari)

### Issue: Performance lambat dengan 100+ kartu
**Solution:**
- Split cetak ke beberapa batch (50 per batch)
- Monitor memory di server: `free -h`
- Increase PHP memory_limit jika perlu: `php.ini`
- Use pagination di bulk action

---

## 📞 Quick Debug Commands

```bash
# Check routes registered
php artisan route:list | grep cetak

# Check controller methods exist
grep -n "printKtaBulk\|downloadKta" app/Http/Controllers/MemberController.php

# Test QR code generation
php artisan tinker
  QrCode::size(70)->generate("TEST DATA")->render()

# Check paid members count
php artisan tinker
  NuMember::where('payment_status', 'paid')->count()

# Sample member data
php artisan tinker
  NuMember::find(1)

# Clear cache
php artisan cache:clear
npm run build
```

---

## ✅ Ready to Test!

Database siap dengan:
- ✅ 1001 total members
- ✅ 685 members dengan status "Lunas"
- ✅ Semua field data lengkap
- ✅ Foto/initial support

Kode siap dengan:
- ✅ 3 controller methods
- ✅ 3 routes
- ✅ 3 view files
- ✅ QR code generation
- ✅ Bulk action logic
- ✅ Print styling

**Status: 🟢 READY FOR TESTING**

Mari test implementasinya! Mulai dari Test 1 (cetak individual), kemudian lanjut ke test kompleks seperti bulk 50+ kartu.
