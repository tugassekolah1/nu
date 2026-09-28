@props(['title' => 'Nahdlatul Ulama Banjaranyar, Cilongok - Berkhidmat untuk Umat'])

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>{{ $title }}</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Baloo+2:wght@700;800&family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">

<!-- Build assets (Tailwind pipeline + Alpine.js) -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Tailwind CDN: token warna/typography identitas NU -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "warm-bg": "#F7F5EF",
                    "warm-card": "#FDFCF7",
                    "charcoal": "#171816",
                    "muted-charcoal": "#4F544E",
                    "nu-deep": "#16452F",
                    "nu-night": "#141815",
                    "muted-sage": "#E7ECE4",
                    "warm-beige": "#EDE8DD",
                    "muted-gold": "#B49352",
                    "border-neutral": "#E5E2D9",
                    "border-subtle": "#D5D2C8",
                    "nu": {
                        "50": "#f0fdf4",
                        "100": "#dcfce7",
                        "200": "#bbf7d0",
                        "500": "#8bc14b",
                        "600": "#6ba82f",
                        "700": "#1F5A3F",
                        "800": "#16452F",
                        "900": "#0F3324"
                    },
                    "gold": "#C99A2E"
                },
                fontFamily: {
                    "sans": ["Inter", "sans-serif"],
                    "arabic": ["Amiri", "serif"],
                    "heading": ["Baloo 2", "Inter", "sans-serif"]
                },
                borderRadius: {
                    "btn": "14px",
                    "card": "20px",
                    "container-r": "28px"
                },
                boxShadow: {
                    "subtle": "0 2px 10px rgba(23, 24, 22, 0.04), 0 1px 3px rgba(23, 24, 22, 0.03)",
                    "elevated": "0 10px 30px rgba(23, 24, 22, 0.06), 0 1px 3px rgba(23, 24, 22, 0.04)"
                }
            }
        }
    };
</script>

<style>
    @layer base {
        body {
            font-family: 'Inter', sans-serif;
            color: #171816;
            background-color: #F7F5EF;
            -webkit-font-smoothing: antialiased;
        }
    }
</style>

{{ $slot }}
