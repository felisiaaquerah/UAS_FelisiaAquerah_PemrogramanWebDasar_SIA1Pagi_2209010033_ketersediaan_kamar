<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kamar</title>
</head>
<body>
    <h1>Daftar Kamar Tersedia</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($rooms as $room)
            <li>Kamar {{ $room->room_number }} ({{ $room->level }}, {{ $room->type }})</li>
        @endforeach
    </ul>

    <a href="{{ route('patients.admitForm') }}">Admit Pasien</a>
</body>
</html>