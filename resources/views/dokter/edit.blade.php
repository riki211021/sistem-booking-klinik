<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Dokter</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #1abc9c, #2ecc71);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 12px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 28px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
        }

        label {
            display: block;
            color: #fff;
            margin-top: 15px;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            margin-top: 5px;
            background-color: rgba(255, 255, 255, 0.85);
        }

        button, .back-button {
            margin-top: 20px;
            background-color: #2980b9;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        button:hover, .back-button:hover {
            background-color: #1f618d;
        }

        .back-button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Dokter</h1>
        <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $dokter->nama }}" required>

            <label>Spesialis:</label>
            <input type="text" name="spesialis" value="{{ $dokter->spesialis }}" required>

            <label>No Telepon:</label>
            <input type="text" name="no_telepon" value="{{ $dokter->no_telepon }}" required>

            <button type="submit">Update</button>
            <a href="{{ route('dokter.index') }}" class="back-button">← Kembali ke menu Dokter</a>
        </form>
    </div>
</body>
</html>
