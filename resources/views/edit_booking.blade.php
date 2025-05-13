<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 30px 40px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            color: #fff;
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input[type="datetime-local"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #ffffff;
            text-decoration: underline;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Booking</h1>
        <form action="{{ route('booking.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Pilih Pasien -->
            <label for="pasien_id">Pasien:</label>
            <select name="pasien_id" required>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}" {{ $booking->pasien_id == $pasien->id ? 'selected' : '' }}>
                        {{ $pasien->nama }}
                    </option>
                @endforeach
            </select>

            <!-- Pilih Dokter -->
            <label for="dokter_id">Dokter:</label>
            <select name="dokter_id" required>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}" {{ $booking->dokter_id == $dokter->id ? 'selected' : '' }}>
                        {{ $dokter->nama }}
                    </option>
                @endforeach
            </select>

            <!-- Jadwal -->
            <label for="jadwal">Jadwal:</label>
            <input type="datetime-local" name="jadwal" value="{{ \Carbon\Carbon::parse($booking->jadwal)->format('Y-m-d\TH:i') }}" required>

            <button type="submit">Update Booking</button>
        </form>

        <a href="{{ route('booking.index') }}" class="back-link">← Kembali ke Daftar Booking</a>
    </div>
</body>
</html>
