<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kejadian</title>
    <!-- Foundation CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites/dist/css/foundation.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        textarea, input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Kejadian</h1>
        <form action="{{ route('incidents.store') }}" method="POST">
            @csrf
            <div>
                <label for="location_name">Nama Lokasi:</label>
                <input type="text" id="location_name" name="location_name" required>
            </div>
            <div>
                <label for="latitude">Latitude:</label>
                <input type="number" step="any" id="latitude" name="latitude" required>
            </div>
            <div>
                <label for="longitude">Longitude:</label>
                <input type="number" step="any" id="longitude" name="longitude" required>
            </div>
            <div>
                <label for="region_name">Wilayah:</label>
                <input type="text" id="region_name" name="region_name" required>
            </div>
            <div>
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>

    <!-- Foundation JS -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites/dist/js/foundation.min.js"></script>
</body>
</html>
