<!DOCTYPE html>
<html>
<head>
    <title>Data Kejadian</title>
</head>
<body>
    <h1>Daftar Kejadian</h1>
    <a href="{{ route('incidents.create') }}">Tambah Kejadian</a>
    <ul>
        @foreach ($incidents as $incident)
            <li>
                <strong>{{ $incident->location_name }}</strong> ({{ $incident->region_name }})
                <br>Koordinat: {{ $incident->latitude }}, {{ $incident->longitude }}
                <br>{{ $incident->description }}
                <form action="{{ route('incidents.destroy', $incident) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
