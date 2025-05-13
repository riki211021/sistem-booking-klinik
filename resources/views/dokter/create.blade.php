<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dokter</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2c3e50, #3498db);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 28px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #fff;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: none;
            margin-bottom: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
        }

        button {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Dokter</h1>
        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Spesialis:</label>
            <input type="text" name="spesialis" required>

            <label>No Telepon:</label>
            <input type="text" name="no_telepon" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
