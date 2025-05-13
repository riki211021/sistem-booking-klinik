<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f8;
            margin: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        a {
            color: #3498db;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        a:hover {
            color: #21618c;
        }

        .form-table-wrapper {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        form {
            flex: 1;
            max-width: 30%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .table-container {
            flex: 2;
            max-width: 70%;
            overflow-x: auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #21618c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .nav {
            text-align: center;
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        @media (max-width: 900px) {
            .form-table-wrapper {
                flex-direction: column;
            }

            form, .table-container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

    <h1>Daftar Pasien</h1>

    <!-- Navigasi -->
    <div class="nav">
        <a href="{{ route('booking.index') }}">📅 Lihat Booking</a> |
        <a href="{{ route('dokter.index') }}">🧑‍⚕️ Lihat Dokter</a>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-table-wrapper">

        <!-- Form Tambah Pasien -->
        <form method="POST" action="{{ route('pasien.store') }}">
            @csrf
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Alamat:</label>
            <input type="text" name="alamat" required>

            <label>No. Telepon:</label>
            <input type="text" name="no_telepon" required>

            <button type="submit">Simpan</button>
        </form>

        <!-- Tabel Data Pasien -->
        <div class="table-container">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
                @foreach($pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->no_telepon }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $pasien->id) }}">Edit</a> |
                      
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline; margin:0; padding:0; background:none; border:none;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus pasien ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>
