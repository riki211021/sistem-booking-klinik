<!DOCTYPE html>
<html>
<head>
    <title>Daftar Booking Klinik</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f8;
            margin: 40px;
            color: #333;
        }

        h1, h2 {
            text-align: center;
            color: #2c3e50;
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
            margin-top: 30px;
        }

        .form-wrapper {
            flex: 0 0 30%;
            max-width: 30%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .table-container {
            flex: 0 0 70%;
            max-width:30% 30% 70%;
            overflow-x: auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="datetime-local"],
        select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: border 0.3s ease;
        }

        input[type="datetime-local"]:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #21618c;
        }

        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 1px 6px rgba(0,0,0,0.1);
            border-radius: 8px;
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

        .success-message {
            color: green;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <h1>Daftar Booking Klinik</h1>

    <!-- 🔗 Navigasi -->
    <p>
        <a href="{{ route('dokter.index') }}">🧑‍⚕️Data Dokter</a> |
        <a href="{{ route('pasien.index') }}">🧑‍⚕️Data Pasien</a>
    </p>

    <!-- ✅ Notifikasi -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-table-wrapper">
        <!-- 📝 Form di kiri -->
        <div class="form-wrapper">
            <h2>Tambah Booking Baru</h2>
            <form method="POST" action="{{ route('booking.store') }}">
                @csrf
                <label>Pasien:</label>
                <select name="pasien_id" required>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                    @endforeach
                </select>

                <label>Dokter:</label>
                <select name="dokter_id" required>
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                    @endforeach
                </select>

                <label>Jadwal:</label>
                <input type="datetime-local" name="jadwal" required>

                <button type="submit">Simpan</button>
            </form>
        </div>

        <!-- 📋 Tabel di kanan -->
        <div class="table-container">
            <h2>Data Booking</h2>
            <table>
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->pasien->nama }}</td>
                        <td>{{ $booking->dokter->nama }}</td>
                        <td>{{ $booking->jadwal }}</td>
                        <td>
                            <a href="{{ route('booking.edit', $booking->id) }}">Edit</a>
                            <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline; margin:0; padding:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
