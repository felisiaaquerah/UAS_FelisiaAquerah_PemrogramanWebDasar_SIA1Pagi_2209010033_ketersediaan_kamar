<!DOCTYPE html>
<html>
<head>
    <title>Admit Pasien</title>
</head>
<body>
    <h1>Admit Pasien</h1>

    <form action="{{ route('patients.admit') }}" method="POST">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="admission_date">Tanggal Masuk:</label>
        <input type="date" id="admission_date" name="admission_date" required><br><br>

        <label for="room_id">Kamar:</label>
        <select id="room_id" name="room_id" required>
            @foreach($availableRooms as $room)
                <option value="{{ $room->id }}">Kamar {{ $room->room_number }} ({{ $room->level }}, {{ $room->type }})</option>
            @endforeach
        </select><br><br>

        <button type="submit">Admit</button>
    </form>
</body>
</html>