<!-- resources/views/pasien/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pasien</title>
</head>
<body>
    <h1>Form Tambah Pasien</h1>

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat"><br><br>

        <label>Telepon:</label><br>
        <input type="text" name="telepon"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('pasien.index') }}">Kembali ke Daftar Pasien</a>
</body>
</html>
