<!DOCTYPE html>
<html>
<head>
    <title>Detail Pasien</title>
</head>
<body>
    <h1>Detail Pasien</h1>

    <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
    <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
    <p><strong>No Telepon:</strong> {{ $pasien->no_telepon }}</p>

    <a href="{{ route('pasien.index') }}">← Kembali ke Daftar Pasien</a>
</body>
</html>
