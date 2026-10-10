{{--
    Opsi <option> daftar organisasi / banom untuk <select name="organisasi">.
    Butuh: $selected (kode organisasi terpilih, boleh null).
    Label baku diambil dari Pengurus::BANOMS, pengelompokan dari NuMember::ORGANISASI_GROUPS.
--}}
<option value="">— Tidak ada / jamaah umum —</option>
@foreach (\App\Models\NuMember::ORGANISASI_GROUPS as $group => $items)
    <optgroup label="{{ $group }}">
        @foreach ($items as $code => $desc)
            <option value="{{ $code }}" @selected(($selected ?? null) === $code)>
                {{ \App\Models\Pengurus::BANOMS[$code]['label'] ?? $code }} — {{ $desc }}
            </option>
        @endforeach
    </optgroup>
@endforeach
