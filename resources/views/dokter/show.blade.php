<!-- resources/views/pasien/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Pasien</title>
</head>
<body>
    <h1>Detail Pasien</h1>

    <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
    <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
    <p><strong>Telepon:</strong> {{ $pasien->telepon }}</p>

    <br>
    <a href="{{ route('pasien.index') }}">Kembali ke Daftar Pasien</a>
</body>
</html>
