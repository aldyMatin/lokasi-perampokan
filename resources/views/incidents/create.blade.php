<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kejadian</title>
</head>
<body>
    <h1>Tambah Kejadian</h1>
    <form action="{{ route('incidents.store') }}" method="POST">
        @csrf
        <label>Nama Lokasi:</label>
        <input type="text" name="location_name" required>
        <br>
        <label>Latitude:</label>
        <input type="number" step="any" name="latitude" required>
        <br>
        <label>Longitude:</label>
        <input type="number" step="any" name="longitude" required>
        <br>
        <label>Wilayah:</label>
        <input type="text" name="region_name" required>
        <br>
        <label>Deskripsi:</label>
        <textarea name="description"></textarea>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
