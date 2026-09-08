# DESIGN SYSTEM

## Material 3 Expressive × Liquid Glass

> Design guideline untuk website NU Kecamatan

---

## 1. Tujuan Desain

Website harus terasa:

* Modern
* Elegan
* Hangat
* Bersih
* Profesional
* Mudah dipahami
* Ramah untuk pengguna yang tidak terbiasa dengan teknologi
* Cepat dan ringan
* Memiliki identitas organisasi NU yang kuat

Desain **tidak boleh terasa seperti dashboard admin, aplikasi crypto, website gaming, atau website teknologi yang terlalu futuristik.**

Prinsip utama:

> **Clarity first. Beauty second. Decoration last.**

Prioritas:

1. Usability
2. Accessibility
3. Information hierarchy
4. Performance
5. Visual quality
6. Animation
7. Decorative effects

---

# 2. Design Philosophy

Desain menggunakan kombinasi dua pendekatan:

### Material 3 Expressive

Digunakan untuk:

* Layout
* Hierarchy
* Components
* Shapes
* Typography
* Color system
* Interaction
* Responsive behavior
* Accessibility

### Liquid Glass / Apple-inspired Design

Digunakan untuk:

* Surface
* Navigation
* Floating elements
* Transparency
* Blur
* Depth
* Light reflection
* Subtle layering

Keduanya tidak boleh digunakan secara berlebihan.

Tujuan akhirnya:

> **Material 3 memberikan struktur dan usability, sedangkan Liquid Glass memberikan depth, elegance, dan visual polish.**

---

# 3. Material 3 Expressive

## 3.1 Core Principle

Material 3 Expressive menekankan desain yang:

* Human
* Dynamic
* Responsive
* Expressive
* Accessible
* Context-aware

Komponen tidak harus terlihat kaku.

Gunakan:

* Rounded shapes
* Large surfaces
* Dynamic spacing
* Strong hierarchy
* Expressive typography
* Meaningful motion

Namun ekspresi visual harus tetap terkendali.

### Jangan

* Semua elemen dibuat sangat bulat
* Semua elemen menggunakan animasi
* Semua card memiliki gradient
* Semua komponen menggunakan shadow besar
* Semua elemen menggunakan glass effect

### Gunakan

Expressive design pada elemen yang memang membutuhkan perhatian.

Contoh:

* Hero
* Primary CTA
* Featured news
* Important announcement
* Agenda terdekat

---

# 4. Liquid Glass

## 4.1 Konsep

Liquid Glass adalah pendekatan visual yang menggunakan:

* Transparency
* Blur
* Layering
* Light
* Reflection
* Depth
* Soft borders

Elemen terlihat seperti permukaan kaca yang berada di atas background.

Tetapi:

> **Glass effect adalah aksen, bukan gaya seluruh website.**

---

## 4.2 Glass Surface

Gunakan glass surface untuk:

* Navbar
* Floating button
* Floating action
* Dialog
* Small utility panel
* Selected navigation
* Secondary controls

Jangan menggunakan glass pada semua card.

### Karakteristik

Glass surface harus memiliki:

* Semi-transparent background
* Backdrop blur
* Subtle border
* Soft shadow
* Slight highlight

Contoh konsep:

```css
background: rgba(255, 255, 255, 0.65);
backdrop-filter: blur(20px);
-webkit-backdrop-filter: blur(20px);
border: 1px solid rgba(255, 255, 255, 0.5);
box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
```

Nilai tersebut adalah referensi dan boleh disesuaikan.

---

# 5. Liquid Glass Rules

## 5.1 Transparency

Transparency harus tetap menjaga readability.

Jangan menggunakan opacity terlalu rendah pada:

* Text
* Button
* Navigation
* Important information

Konten harus tetap mudah dibaca.

---

## 5.2 Blur

Gunakan blur untuk menciptakan depth.

Rekomendasi:

```text
Small UI       → 10–16px
Navbar         → 16–24px
Large surface  → 20–30px
```

Jangan menggunakan blur ekstrem.

---

## 5.3 Border

Glass membutuhkan border tipis agar batas elemen tetap terlihat.

Gunakan:

```text
1px subtle border
```

Border tidak boleh terlalu kontras.

---

## 5.4 Shadow

Gunakan soft shadow.

Hindari:

```text
heavy shadow
hard shadow
multiple strong shadows
```

Shadow harus terasa seperti objek mengambang secara natural.

---

# 6. NU Color System

Identitas NU tetap menjadi prioritas.

## Primary

```text
Deep Green
#1F5A3F
```

## Primary Dark

```text
#16452F
```

## Primary Soft

```text
#E8F2EA
```

## Accent

```text
Gold
#C99A2E
```

Gold digunakan secara terbatas untuk:

* Highlight
* Badge
* Important information
* Decorative detail

Jangan menjadikan gold sebagai warna utama.

---

## Background

```text
#F5F7F4
```

## Surface

```text
#FFFFFF
```

## Text

```text
Primary:
#17392D

Secondary:
#526158

Muted:
#7B8780
```

## Border

```text
#DCE4DE
```

---

# 7. Color Philosophy

Website harus terlihat seperti:

> **NU modern, bukan website hijau biasa.**

Gunakan kombinasi:

```text
Deep Green
↓
Green
↓
Soft Green
↓
Off White
↓
White
```

Gold hanya sebagai accent.

Hindari:

* Neon green
* Neon purple
* Excessive gradients
* Rainbow gradients
* Strong blue/purple futuristic colors
* Pure black background

---

# 8. Typography

Gunakan typography yang sederhana dan modern.

Prioritas:

```text
Inter
System UI
-apple-system
BlinkMacSystemFont
Segoe UI
sans-serif
```

Jangan menggunakan terlalu banyak font.

---

## Heading

Heading harus:

* Strong
* Clean
* Short
* Easy to scan

Contoh:

```text
Selamat Datang
di NU Kecamatan
```

Gunakan font weight:

```text
600
700
```

Hindari heading yang terlalu berat.

---

## Body

Body text harus nyaman dibaca.

Default:

```text
16px
line-height: 1.6
```

Untuk mobile:

```text
15–16px
```

---

# 9. Layout

Website menggunakan prinsip:

> **Content first, decoration second.**

Gunakan whitespace yang cukup.

Container:

```text
max-width: 1200–1280px
```

Padding desktop:

```text
32–48px
```

Padding mobile:

```text
20–24px
```

---

# 10. Spacing System

Gunakan spacing berbasis kelipatan 4 atau 8.

```text
4px
8px
12px
16px
24px
32px
40px
48px
64px
80px
96px
```

Jangan menggunakan terlalu banyak ukuran random.

---

# 11. Border Radius

Gunakan rounded shape yang terinspirasi Material 3.

```text
Small component:
12px

Button:
14–18px

Card:
20–24px

Large surface:
28–32px

Hero:
32px
```

Jangan semua elemen menggunakan radius 50%.

---

# 12. Navigation

Navbar harus sederhana.

Desktop:

```text
Logo
|
Beranda
Berita
Agenda
Layanan
Tentang
|
CTA
```

Navbar menggunakan subtle glass effect ketika berada di atas konten.

Konsep:

```text
Normal:
transparent

Scrolled:
glass surface
+ blur
+ subtle border
+ subtle shadow
```

Navbar tidak boleh terlalu tinggi.

---

# 13. Mobile Navigation

Mobile navigation harus sangat sederhana.

Gunakan:

```text
Logo
Menu button
```

Menu harus memiliki target sentuh minimal:

```text
44 × 44px
```

Jangan membuat menu terlalu banyak.

Prioritaskan:

1. Beranda
2. Berita
3. Agenda
4. Layanan
5. Tentang

---

# 14. Hero Section

Hero adalah area paling penting.

Hero harus langsung menjawab:

> Website ini tentang apa?

Contoh:

```text
Nahdlatul Ulama
Kecamatan Cilongok

Melayani umat, memperkuat jamaah,
dan membangun masyarakat bersama.
```

CTA utama:

```text
Lihat Berita
```

CTA kedua:

```text
Lihat Agenda
```

Jangan memberikan terlalu banyak CTA.

---

# 15. Hero Visual

Hero boleh menggunakan:

* Soft gradient
* Glass element
* Blur orb
* Subtle light
* Image
* Abstract shape

Tetapi jangan menggunakan:

* 3D berlebihan
* Particle berlebihan
* Canvas animation yang berat
* Neon glow
* Moving background terlalu cepat

Hero harus terasa:

> Calm + premium + welcoming.

---

# 16. Glassmorphism Decoration

Gunakan decorative glass shapes secara terbatas.

Contoh:

```text
Large blurred green orb
+
small glass card
+
soft gradient
```

Tujuannya menciptakan depth.

Bukan menjadi pusat perhatian.

---

# 17. CTA Button

Primary button:

```text
Deep Green background
White text
```

Secondary button:

```text
Transparent / glass
Dark green text
Subtle border
```

Button harus memiliki:

```text
min-height: 44px
padding horizontal: 20–24px
border-radius: 14–18px
```

---

# 18. Button Interaction

Hover:

```text
translateY(-1px)
slightly stronger shadow
```

Active:

```text
scale(0.98)
```

Transition:

```text
200–300ms
```

Jangan menggunakan animasi bouncing.

---

# 19. Services

Section:

```text
Layanan & Informasi
```

Gunakan maksimal 4 layanan utama di awal.

Contoh:

```text
Daftar Anggota
Cetak Kartu
Agenda
Warta
```

Layanan tambahan dapat berada di:

```text
Layanan lainnya
```

Gunakan progressive disclosure.

Tujuannya:

> Pengguna tidak merasa harus memahami semua fitur website.

---

# 20. Service Card

Service card harus memiliki:

* Icon
* Title
* Short description
* Optional arrow

Contoh:

```text
[icon]

Daftar Anggota
Bergabung menjadi bagian
dari keluarga besar NU.

→
```

Hover:

```text
slight lift
icon movement
border highlight
```

Tidak perlu:

```text
3D transform
large rotation
glow
```

---

# 21. News Section

Prioritaskan satu berita utama.

Layout desktop:

```text
┌───────────────────────────┐
│                           │
│      Featured News        │
│                           │
└───────────────────────────┘

┌───────────┐ ┌───────────┐
│ News      │ │ News      │
└───────────┘ └───────────┘
```

Mobile:

```text
Featured News

News
News
```

Gunakan image ratio konsisten.

---

# 22. Agenda

Agenda harus dibuat mudah dipahami.

Prioritas:

```text
Agenda Terdekat
```

Bukan calendar terlebih dahulu.

Contoh:

```text
12 SEP
Sabtu

Pengajian Rutin
19:30 WIB
Masjid ...
```

Calendar dapat menjadi fitur tambahan.

Tujuannya:

> Pengguna cukup melihat beberapa agenda terdekat tanpa harus memahami kalender digital.

---

# 23. Pengurus

Pengurus ditampilkan dengan:

* Foto
* Nama
* Jabatan

Gunakan card sederhana.

Contoh:

```text
[Foto]

Ahmad ...
Ketua Ranting
```

Jangan menampilkan terlalu banyak informasi pada card.

Detail dapat dibuka ketika dibutuhkan.

---

# 24. Infaq / Donasi

Section donasi harus terlihat terpercaya.

Gunakan:

* Informasi singkat
* Tujuan penggunaan
* CTA
* Informasi kontak

Jangan menggunakan desain seperti:

```text
sales landing page
```

Harus terasa transparan dan organisasi-oriented.

---

# 25. Floating WhatsApp

WhatsApp merupakan secondary action.

Desktop:

```text
icon + text
```

Mobile:

```text
icon
```

Gunakan floating glass / solid button.

Jangan membuat ukurannya terlalu besar.

Animasi:

```text
subtle pulse
```

Hanya jika diperlukan.

---

# 26. Motion Design

Motion mengikuti prinsip:

> **Motion should explain, not decorate.**

Animasi digunakan untuk:

* Menjelaskan perubahan state
* Menunjukkan interaksi
* Membantu orientasi
* Memberikan feedback

---

# 27. Entrance Animation

Gunakan:

```text
opacity
translateY
```

Contoh:

```text
opacity: 0 → 1
translateY: 20px → 0
```

Duration:

```text
500–700ms
```

Easing:

```text
cubic-bezier(0.22, 1, 0.36, 1)
```

---

# 28. Micro Interaction

Hover card:

```text
translateY(-2px)
```

Button:

```text
scale(0.98) on active
```

Accordion:

```text
height + opacity
```

Navbar:

```text
background + blur transition
```

Semua motion harus subtle.

---

# 29. Stagger Animation

Untuk grid:

```text
item 1 → 0ms
item 2 → 50ms
item 3 → 100ms
item 4 → 150ms
```

Jangan membuat delay terlalu panjang.

---

# 30. Reduced Motion

Website wajib menghormati:

```css
prefers-reduced-motion
```

Jika pengguna mengaktifkan reduced motion:

* Matikan parallax
* Matikan floating animation
* Kurangi transition
* Hilangkan entrance animation berlebihan

Accessibility lebih penting daripada visual.

---

# 31. Glass Animation

Glass element dapat menggunakan subtle movement.

Contoh:

```text
blur
opacity
transform
```

Jangan melakukan:

```text
continuous rotation
heavy floating
rapid movement
```

Glass harus terasa stabil.

---

# 32. Shadows

Gunakan layered soft shadow.

Contoh:

```text
Small:
0 2px 8px rgba(...)

Medium:
0 8px 24px rgba(...)

Large:
0 16px 40px rgba(...)
```

Shadow harus halus.

---

# 33. Icons

Gunakan satu icon library secara konsisten.

Contoh:

```text
Lucide
```

Icon harus:

* Simple
* Consistent
* Recognizable

Jangan mencampur terlalu banyak icon style.

---

# 34. Accessibility

Semua interactive element harus:

```text
minimum 44 × 44px
```

Gunakan:

* Visible focus state
* Semantic HTML
* aria-label jika diperlukan
* Text + icon
* Proper contrast
* Keyboard navigation

Jangan mengandalkan warna saja untuk menyampaikan informasi.

---

# 35. Beginner Friendly UX

Website harus dapat digunakan oleh orang yang:

* Jarang menggunakan website
* Tidak memahami istilah teknologi
* Menggunakan smartphone
* Lebih nyaman dengan tombol yang jelas

Gunakan bahasa:

```text
Daftar Anggota
```

Bukan:

```text
Membership Registration
```

Gunakan:

```text
Lihat Agenda
```

Bukan:

```text
Explore Events
```

---

# 36. Error Prevention

Jika sebuah tindakan memiliki konsekuensi penting:

* Jelaskan terlebih dahulu
* Gunakan confirmation
* Jangan menggunakan istilah teknis

Contoh:

```text
Apakah Anda yakin ingin menghapus data ini?
```

Bukan:

```text
Execute DELETE operation?
```

---

# 37. Responsive Design

Design harus mobile-first.

Breakpoints dapat menggunakan:

```text
Mobile
< 640px

Tablet
640–1024px

Desktop
> 1024px
```

Layout harus berubah secara natural.

Jangan hanya mengecilkan desktop layout.

---

# 38. Mobile Priority

Pada mobile:

1. Logo
2. Primary information
3. Primary CTA
4. Agenda
5. News
6. Services
7. Organization
8. Additional information

Jangan memaksa semua informasi tampil sekaligus.

---

# 39. Performance

Visual effect tidak boleh mengorbankan performance.

Hindari:

* Excessive blur
* Heavy canvas
* Continuous animation
* Large unoptimized images
* Too many shadows
* Too many DOM elements

Gunakan animation hanya ketika memberikan manfaat UX.

---

# 40. Component Hierarchy

Komponen harus memiliki hierarchy yang jelas.

```text
Page
│
├── Navbar
│
├── Hero
│
├── Quick Actions
│
├── News
│
├── Agenda
│
├── Services
│
├── Pengurus
│
├── Infaq
│
├── Contact
│
└── Footer
```

---

# 41. Visual Hierarchy

Urutan perhatian pengguna:

```text
1. Identitas NU
2. Informasi utama
3. Primary CTA
4. Agenda terdekat
5. Berita
6. Layanan
7. Pengurus
8. Informasi tambahan
```

Jangan membuat semua section terlihat sama pentingnya.

---

# 42. Do & Don't

## DO

* Gunakan whitespace
* Gunakan typography yang jelas
* Gunakan green sebagai primary identity
* Gunakan glass sebagai accent
* Gunakan animation secara subtle
* Gunakan rounded surface
* Gunakan hierarchy
* Prioritaskan mobile
* Prioritaskan accessibility
* Gunakan bahasa sederhana

## DON'T

* Jangan membuat semuanya glass
* Jangan menggunakan terlalu banyak gradient
* Jangan menggunakan neon
* Jangan menggunakan terlalu banyak animation
* Jangan membuat UI seperti dashboard
* Jangan membuat semua card memiliki efek berbeda
* Jangan menggunakan terlalu banyak warna
* Jangan membuat CTA terlalu banyak
* Jangan mengorbankan readability demi efek visual

---

# 43. Design Formula

Gunakan formula berikut:

```text
Material 3 Expressive
        +
Apple-inspired Liquid Glass
        +
NU Visual Identity
        +
Beginner Friendly UX
        =
Modern NU Website
```

---

# 44. Overall Visual Direction

Website harus memberikan kesan:

```text
Modern
        ↓
Clean
        ↓
Calm
        ↓
Trustworthy
        ↓
Warm
        ↓
Human
```

Bukan:

```text
Futuristic
Neon
Cyber
Gaming
Crypto
Tech Dashboard
```

---

# 45. Golden Rule

Jika sebuah efek visual membuat website:

* Lebih sulit dibaca
* Lebih lambat
* Lebih membingungkan
* Mengalihkan perhatian dari konten
* Mengganggu pengguna

maka efek tersebut harus dihapus.

> **Desain yang bagus bukan desain yang memiliki efek paling banyak.**
>
> **Desain yang bagus adalah desain yang membuat pengguna langsung tahu harus melakukan apa.**

---

# 46. Final Design Direction

Target akhir:

> **A modern, expressive, calm, elegant, and accessible NU organization website inspired by Material 3 Expressive and Apple-inspired Liquid Glass.**

Website harus terasa seperti:

**“Modern technology that feels familiar.”**

Bukan:

**“Technology that asks users to learn how to use it.”**
