<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kartu Anggota - {{ $member->full_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .id-card {
            width: 85.6mm;
            height: 53.98mm;
            background: linear-gradient(135deg, #006633 0%, #004d26 100%);
            color: #fff;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            position: relative;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #ffffff44;
            padding-bottom: 4px;
            margin-bottom: 8px;
        }

        .header h6 {
            margin: 0;
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .content {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .photo {
            width: 55px;
            height: 70px;
            object-fit: cover;
            border: 2px solid #fff;
            border-radius: 4px;
            background-color: #ccc;
        }

        .details {
            font-size: 9px;
            flex-grow: 1;
        }

        .details p {
            margin: 2px 0;
        }

        .qr-code {
            background: white;
            padding: 3px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer {
            position: absolute;
            bottom: 6px;
            left: 10px;
            right: 10px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        @media print {
            body {
                background: none;
            }
            .no-print {
                display: none;
            }
            .id-card {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <div class="no-print" style="position: absolute; top: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
            🖨️ Cetak Kartu
        </button>
    </div>

    <div class="id-card">
        <div class="header">
            <h6>KARTU TANDA ANGGOTA</h6>
        </div>

        <div class="content">
            @if($member->photo)
                <img src="{{ asset('storage/' . $member->photo) }}" class="photo" alt="Foto">
            @else
                <div class="photo" style="display:flex;align-items:center;justify-content:center;color:#333;font-size:8px;">No Photo</div>
            @endif

            <div class="details">
                <p><strong>Nama:</strong> {{ $member->full_name }}</p>
                <p><strong>NIK:</strong> {{ $member->nik }}</p>
                <p><strong>No Reg:</strong> {{ $member->member_card_no }}</p>
                <p><strong>Alamat:</strong> {{ Str::limit($member->address, 30) }}</p>
            </div>
        </div>

        <div class="footer">
            <span style="font-size: 7px; opacity: 0.8;">Berlaku Anggota Aktif</span>
            <div class="qr-code">
                {!! $qrCode !!}
            </div>
        </div>
    </div>

</body>
</html>