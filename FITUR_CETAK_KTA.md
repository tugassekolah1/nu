# Dokumentasi Fitur Cetak KTA (Kartu Tanda Anggota)

## 📋 Ringkasan Implementasi

Fitur cetak Kartu Tanda Anggota (KTA) telah diimplementasikan dengan mendukung:
- ✅ Cetak individual per anggota
- ✅ Cetak masal dengan bulk action
- ✅ QR Code verifikasi otomatis
- ✅ Layout CR80 (85.6×53.9mm) sesuai standar ID Card
- ✅ Grid 2 kolom per lembar A4 untuk cetak masal
- ✅ Download sebagai PDF

---

## 🏗️ Struktur Kode yang Dimodifikasi

### 1. **Controller** (`app/Http/Controllers/MemberController.php`)

Tiga method utama ditambahkan:

#### `printCard($id)` - Cetak Individual (sudah ada, tetap digunakan)
```php
// Route: /members/{member}/print-card (GET)
// View: resources/views/admin/members/print-card.blade.php
```

#### `printKtaBulk(Request $request)` - Cetak Masal
```php
// Route: /members/cetak-kta-bulk (POST)
// Menerima: array IDs dari form checkbox
// Returns: View dengan grid kartu siap cetak
// Validasi: Hanya member dengan payment_status='paid'
```

**Parameter Request:**
- `ids[]` — Array ID anggota yang dipilih

**Flow:**
1. Terima array IDs dari form
2. Validasi IDs adalah numeric
3. Query members yang sudah bayar (payment_status='paid')
4. Generate QR code untuk setiap member
5. Return view cetak bulk dengan data members

#### `downloadKta($id)` - Download KTA Individual
```php
// Route: /members/{member}/download-kta (GET)
// Menampilkan preview + opsi download/print
```

---

### 2. **Routes** (`routes/web.php`)

Tiga route baru ditambahkan dalam authenticated admin group:

```php
Route::post('/members/cetak-kta-bulk', [MemberController::class, 'printKtaBulk'])
    ->name('members.cetak-kta-bulk');

Route::get('/members/{member}/download-kta', [MemberController::class, 'downloadKta'])
    ->name('members.download-kta');

// Route printCard sudah ada
Route::get('/members/{member}/print-card', [MemberController::class, 'printCard'])
    ->name('members.print-card');
```

---

### 3. **Views**

#### A. **Tabel Admin** (`resources/views/admin/members/index.blade.php`)

**Perubahan:**
- ✅ Tambah kolom checkbox untuk setiap baris member (hanya yang sudah bayar)
- ✅ Tambah checkbox "Select All" di header
- ✅ Floating bulk action bar (sticky bottom) saat ada checkbox yang dipilih
- ✅ Tombol "Cetak KTA Terpilih ([jumlah] data)"
- ✅ Tambah tombol "Download KTA" di kolom aksi individual

**Fitur JavaScript:**
```js
toggleSelectAll(checkbox)      // Toggle semua checkbox
updateBulkActionBar()          // Update tampilan bulk action bar
clearBulkSelection()           // Clear semua selection
submitBulkPrint()              // Submit form ke route bulk print
```

---

#### B. **Cetak KTA Masal** (`resources/views/admin/members/cetak-kta-bulk.blade.php`)

**Spesifikasi:**
- Layout: Grid 2 kolom (CR80 card: 85.6mm × 53.9mm)
- Margin: 15mm per halaman A4
- Gap antar kartu: 12mm
- Format kertas: A4 (210mm × 297mm)
- Kartu per halaman: ±8-10 kartu (2 kolom × 4-5 baris)

**Desain Kartu:**
```
┌─────────────────────────────────┐
│  [Logo] NU  │ KARTU ANGGOTA    │  ← Header hijau (gradient)
├──────────────────────────────────┤
│ [FOTO]  │ Nama: Ahmad Wijaya   │
│ 17×17mm │ NIK: 3214025012890000│  ← Body (flex layout)
│         │ Kartu: NU-2026-001   │
│         │ Banom: PAC IPNU      │
├──────────────────────────────────┤
│ Aktif                     [QR 10×10mm] │  ← Footer
└──────────────────────────────────┘
```

**Elemen:**
- Logo NU (12mm × 12mm)
- Header gradient (emerald #059669 → #047857)
- Foto anggota atau initial (17mm × 17mm)
- Informasi: Nama, NIK, No Kartu, Banom
- QR Code verifikasi (10mm × 10mm)
- Status "Aktif"

**CSS Print Media:**
- `page-break-after: always` untuk halaman
- `page-break-inside: avoid` untuk setiap kartu
- Font size relatif untuk keterbacaan saat dicetak

---

#### C. **Download KTA Individual** (`resources/views/admin/members/download-kta.blade.php`)

**Fitur:**
- Pratinjau kartu dalam browser
- Opsi "Cetak / Simpan PDF"
- Ukuran kartu asli: 85.6mm × 53.9mm
- Hidden print version (actual size) untuk print

**Layout:**
- Container white pada screen
- Preview card scaled untuk viewing
- Hidden card dengan ukuran sebenarnya untuk printing

---

## 🔄 Flow Cetak Masal (Bulk Action)

### User Flow:
1. **Buka Admin Members Dashboard** → `/members`
2. **Pilih Anggota** → Centang checkbox anggota yang sudah bayar
3. **Bulk Action Bar Muncul** → Floating bar dengan tombol "Cetak KTA Terpilih"
4. **Klik Tombol** → Submit form POST ke `/members/cetak-kta-bulk`
5. **Redirect ke View Cetak** → Grid kartu siap cetak
6. **Cetak/Simpan PDF** → Gunakan dialog print browser

### Data Flow:
```
[Checkbox Form] 
    ↓ POST /members/cetak-kta-bulk
[MemberController::printKtaBulk($request)]
    ↓ Validasi IDs
    ↓ Query NuMember::whereIn('id', $ids)->where('payment_status', 'paid')
    ↓ Generate QR untuk setiap member
[View cetak-kta-bulk.blade.php]
    ↓ Render grid kartu CR80
[Browser Print Dialog]
```

---

## 🎨 Desain & Styling

### Tailwind Classes Konsisten:
- Emerald (#059669, #047857) untuk primary
- Slate (#f3f4f6, #d1d5db) untuk neutral
- Rose (#dc2626) untuk destructive

### Print Styles:
- Font: Plus Jakarta Sans
- Media query `@media print` mengatur:
  - Padding/margin untuk CR80
  - Page breaks otomatis
  - Hide toolbar & preview

### Responsive:
- Screen: Grid auto-fill (responsive columns)
- Print: Fixed 2 kolom CR80 per A4

---

## 📱 Fitur per Halaman

### Admin Members Index (`/members`)
| Fitur | Status |
|-------|--------|
| Individual Print (per baris) | ✅ Ada (icon printer) |
| Individual Download (per baris) | ✅ Ada (icon download) |
| Select All Checkbox | ✅ Ada (header) |
| Individual Row Checkbox | ✅ Ada (hanya paid) |
| Bulk Action Bar | ✅ Floating sticky |
| Cetak Terpilih Button | ✅ Ada dengan count |
| Batal Selection | ✅ Ada |

### Cetak KTA Bulk (`/members/cetak-kta-bulk`)
| Fitur | Status |
|-------|--------|
| Grid Layout | ✅ 2 kolom CR80 |
| QR Code | ✅ Per kartu |
| Print Button | ✅ Toolbar |
| Back Button | ✅ Toolbar |
| Info Bar | ✅ Jumlah kartu |
| A4 Format | ✅ 210×297mm |

### Download KTA (`/members/{member}/download-kta`)
| Fitur | Status |
|-------|--------|
| Preview | ✅ Browser view |
| Print Dialog | ✅ Ctrl+P / Print button |
| Save PDF | ✅ Print → Save as PDF |
| Actual Size | ✅ CR80 85.6×53.9mm |

---

## 🔐 Validasi & Keamanan

### Backend:
```php
// Hanya member dengan payment_status='paid' yang boleh dicetak
$members = NuMember::whereIn('id', $ids)
    ->where('payment_status', 'paid')
    ->get();

// Validasi IDs adalah array numeric
$ids = array_filter($ids, fn($id) => is_numeric($id));
```

### Frontend:
```js
// Checkbox hanya ditampilkan untuk member yang sudah bayar
@if ($member->payment_status === 'paid')
    <input type="checkbox" name="ids[]" value="{{ $member->id }}">
@endif
```

### Route Protection:
```php
// Routes dalam middleware 'auth' dan 'admin'
Route::middleware(['auth', 'admin'])->group(function () {
    // Cetak routes...
});
```

---

## 📦 Dependencies

Sudah tersedia di `composer.json`:
- `simplesoftwareio/simple-qrcode: ^4.2` — QR Code generation

Tidak perlu install package tambahan.

---

## 🚀 Cara Menggunakan

### 1. **Cetak Satu Kartu**
- Buka `/admin/members`
- Cari anggota dengan status "Lunas / Aktif"
- Klik icon **printer** (Cetak Kartu Anggota)
- Dialog print browser → Print / Save PDF

### 2. **Download Satu Kartu**
- Buka `/admin/members`
- Cari anggota dengan status "Lunas / Aktif"
- Klik icon **download** (Download KTA)
- Preview muncul di browser
- Klik "Cetak / Simpan PDF"
- Dialog print → Save as PDF

### 3. **Cetak Masal**
- Buka `/admin/members`
- Centang checkbox anggota (hanya yang "Lunas / Aktif")
- Klik "Select All" jika ingin semua di halaman ini
- Floating bar muncul → Klik "Cetak KTA Terpilih"
- Grid kartu dimuat
- Klik "Cetak KTA" → Dialog print
- Print / Save as PDF

---

## 📐 Spesifikasi Teknis

### QR Code:
- Size: 10mm × 10mm (bulk), 90px (individual)
- Content: `"NIK: {nik} | CARD: {member_card_no}"`
- Format: SVG (embedded)
- Encoding: SimpleQrCode library

### Kartu CR80 (ISO/IEC 7810 ID-1):
- Dimensi: 85.6mm × 53.9mm
- Aspect Ratio: 1.585:1
- Margin: 15mm per halaman (A4)
- Font Size: 10-11px saat cetak
- Resolusi: 96 DPI (screen) → 300 DPI (print)

### Halaman A4:
- Ukuran: 210mm × 297mm
- Margin: 15mm all sides
- Usable: 180mm × 267mm
- Grid: 2 kolom × 4-5 baris
- Kartu per halaman: 8-10

---

## ✅ Testing Checklist

Untuk test implementasi:

```
□ Individual Print
  ├─ Buka /members/{id}/print-card
  ├─ QR code tampil
  ├─ Klik print → dialog browser
  └─ Print OK, dimensions correct

□ Individual Download
  ├─ Buka /members/{id}/download-kta
  ├─ Preview muncul
  ├─ Klik "Cetak / Simpan PDF"
  ├─ Dialog print → OK
  └─ PDF bisa disimpan

□ Bulk Action
  ├─ Buka /members
  ├─ Centang checkbox (2-5 kartu)
  ├─ Floating bar muncul
  ├─ Count display correct
  ├─ Klik "Cetak KTA Terpilih"
  ├─ Redirect ke /members/cetak-kta-bulk
  ├─ Grid layout 2 kolom OK
  ├─ QR code untuk setiap kartu
  ├─ Info bar count correct
  ├─ Klik print → dialog OK
  └─ PDF bisa disimpan

□ Validasi
  ├─ Hanya anggota "Lunas" bisa di-select
  ├─ Checkbox disabled untuk "Belum Bayar"
  ├─ Bulk action hanya terima paid members
  ├─ Empty selection → error message
  └─ Invalid IDs → error message

□ Styling & Layout
  ├─ Card layout CR80 correct
  ├─ Print margin 15mm OK
  ├─ Font size readable saat print
  ├─ QR code size 10mm OK
  ├─ Logo tampil di header
  ├─ Foto/initial tampil OK
  ├─ Tailwind classes konsisten
  └─ Responsive di screen & print
```

---

## 📝 Notes

- Foto anggota menggunakan path dari database (`storage/{photo}`)
- Jika foto kosong, tampil initial dari huruf pertama nama
- Logo NU dari `/public/images/logo.webp`
- QR code generated on-the-fly (tidak tersimpan di database)
- Bulk action hanya support anggota yang sudah bayar
- Print dialog menggunakan native browser print (Ctrl+P / Print button)
- PDF save bisa via "Print → Save as PDF" di browser

---

## 🔄 Future Enhancements

Saran improvement untuk fase berikutnya:
1. Tambah signature digital pada kartu
2. Nomor seri per kartu (unique tracking)
3. Expiry date field
4. Logo/stempel banom individual
5. Export bulk ke PDF file (auto-download)
6. Print history/audit log
7. Reprint statistics
