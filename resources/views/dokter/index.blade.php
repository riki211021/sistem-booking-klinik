<!DOCTYPE html>
<html>
<head>
    <title>Data Dokter</title>

    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #2c3e50;
    color: #ecf0f1;
    margin: 40px;
}

h1 {
    text-align: center;
    color: #f1c40f;
    margin-bottom: 30px;
}

a {
    color: #1abc9c;
    text-decoration: none;
    font-weight: bold;
    margin-right: 15px;
}

a:hover {
    color: #16a085;
}

.nav-links {
    text-align: center;
    margin-bottom: 25px;
}

.btn-add {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #e67e22;
    color: #fff;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.btn-add:hover {
    background-color: #d35400;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #34495e;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}

th, td {
    padding: 14px 18px;
    text-align: left;
    border-bottom: 1px solid #2c3e50;
}

th {
    background-color: #1abc9c;
    color: #fff;
}

tr:hover {
    background-color: #3d566e;
}

button {
    background-color: #e74c3c;
    color: white;
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease;
}

button:hover {
    background-color: #c0392b;
}

.action-links a {
    margin-right: 8px;
}

form {
    display: inline;
}

    </style>
</head>
<body>
    <h1>Daftar Dokter</h1>

    {{-- Tombol Navigasi ke Halaman Lain --}}
    <div style="margin-bottom: 20px;">
        <a href="{{ route('booking.index') }}">📅 Lihat Booking</a> |
        <a href="{{ route('pasien.index') }}">🧑‍⚕️ Lihat Pasien</a>
    </div>

    {{-- Tombol Tambah Dokter --}}
    <a href="{{ route('dokter.create') }}">+ Tambah Dokter</a>

    {{-- Tabel Dokter --}}
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach ($dokters as $dokter)
        <tr>
            <td>{{ $dokter->nama }}</td>
            <td>{{ $dokter->spesialis }}</td>
            <td>{{ $dokter->no_telepon }}</td>
            <td>
                <a href="{{ route('dokter.edit', $dokter->id) }}">Edit</a> |
                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
