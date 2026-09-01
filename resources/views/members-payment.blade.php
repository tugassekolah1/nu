<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Pembayaran Pendaftaran</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <div class="max-w-xl mx-auto px-6 py-12">

        <a href="{{ route('landing') }}" class="text-blue-600 hover:underline text-sm">
            &larr; Kembali ke beranda
        </a>

        <h1 class="text-2xl font-bold mt-4 mb-2">Pembayaran Pendaftaran</h1>
        <p class="text-gray-600 mb-6">
            Halo <strong>{{ $member->full_name }}</strong>, silakan selesaikan pembayaran untuk mengaktifkan keanggotaan kamu.
        </p>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-sm rounded-lg p-6 mb-6">

            @if ($member->payment_status === 'paid')
                <div class="text-center py-6">
                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full font-medium">
                        Pembayaran sudah dikonfirmasi ✓
                    </span>
                    <p class="mt-4 text-gray-600">
                        No. Kartu Anggota: <strong>{{ $member->member_card_no }}</strong>
                    </p>
                </div>
            @else
                <div class="text-center mb-6">
                    <img src="{{ asset('images/qris.png') }}" alt="QRIS" class="w-64 mx-auto rounded-lg border">
                    <p class="mt-3 text-sm text-gray-500">Scan QRIS di atas menggunakan e-wallet/m-banking</p>
                </div>

                <div class="border-t pt-4 mb-6 text-sm">
                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Kode Transaksi</span>
                        <span class="font-medium">{{ $payment->transaction_code }}</span>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Jumlah Bayar</span>
                        <span class="font-medium">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Status</span>
                        <span class="font-medium text-red-600">Belum Bayar</span>
                    </div>
                </div>

                @if ($payment->payment_proof)
                    <div class="mb-4 p-3 bg-blue-50 text-blue-700 rounded-lg text-sm">
                        Bukti transfer sudah diunggah, menunggu verifikasi admin.
                    </div>
                @endif

                <form action="{{ route('members.upload-proof', $member) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        {{ $payment->payment_proof ? 'Unggah Ulang Bukti Transfer' : 'Unggah Bukti Transfer' }}
                    </label>
                    <input type="file" name="proof" accept="image/*" required
                           class="block w-full text-sm text-gray-600 mb-4">

                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700  px-5 py-3 rounded-lg font-medium">
                        Kirim Bukti Transfer
                    </button>
                </form>
            @endif

        </div>

    </div>

</body>
</html>