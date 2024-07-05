<!DOCTYPE html>
<html>

<head>
    <title>Torneo de Tenis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            padding: 0;
        }

        h1,
        h2 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 1085px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .players {
            margin-top: 35px;
        }

        .custom-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 5px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            line-height: 1;
        }

        .custom-button:hover {
            background-color: #45a049;
        }

        form {
            margin-top: 10px;
        }

        form div {
            margin-bottom: 10px;
        }

        label {
            margin-right: 10px;
        }

        input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        function showPlayers(gender) {
            document.getElementById('malePlayers').style.display = (gender === 'male') ? 'block' : 'none';
            document.getElementById('femalePlayers').style.display = (gender === 'female') ? 'block' : 'none';
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Torneo de Tenis</h1>
        <div style="text-align: center;">
            <button class="custom-button" onclick="showPlayers('female')">Torneo Femenino</button>
            <button class="custom-button" onclick="showPlayers('male')">Torneo Masculino</button>
            <a href="{{ route('torneo.historicos') }}" class="custom-button">Históricos</a>
        </div>

        <div id="femalePlayers" style="display:none;">
            <h2>Jugadoras: </h2>
            <form action="{{ route('torneo.simulate') }}" method="POST">
                @csrf
                <input type="hidden" name="gender" value="female">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Nivel</th>
                            <th>Fuerza</th>
                            <th>Velocidad</th>
                            <th>Tiempo de Reacción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($playersFemale as $player)
                        <tr>
                            <td>
                                <input type="hidden" name="players[{{ $loop->index }}][id]" value="{{ $player->id }}">
                                <input type="text" name="players[{{ $loop->index }}][name]" value="{{ $player->name }}">
                            </td>
                            <td><input type="number" name="players[{{ $loop->index }}][skill_level]" value="{{ $player->skill_level }}" placeholder="Nivel de Habilidad"></td>
                            <td><input type="number" name="players[{{ $loop->index }}][strength]" value="{{ $player->strength }}" placeholder="Fuerza"></td>
                            <td><input type="number" name="players[{{ $loop->index }}][speed]" value="{{ $player->speed }}" placeholder="Velocidad"></td>
                            <td><input type="number" name="players[{{ $loop->index }}][reaction_time]" value="{{ $player->reaction_time }}" placeholder="Tiempo de Reacción"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center;">
                    <button type="submit" class="custom-button">Simular Torneo</button>
                </div>
            </form>
        </div>

        <div id="malePlayers" style="display:none;">
            <h2>Jugadores: </h2>
            <form action="{{ route('torneo.simulate') }}" method="POST">
                @csrf
                <input type="hidden" name="gender" value="male">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Nivel</th>
                            <th>Fuerza</th>
                            <th>Velocidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($playersMale as $player)
                        <tr>
                            <td>
                                <input type="hidden" name="players[{{ $loop->index }}][id]" value="{{ $player->id }}">
                                <input type="text" name="players[{{ $loop->index }}][name]" value="{{ $player->name }}">
                            </td>
                            <td><input type="number" name="players[{{ $loop->index }}][skill_level]" value="{{ $player->skill_level }}" placeholder="Nivel de Habilidad"></td>
                            <td><input type="number" name="players[{{ $loop->index }}][strength]" value="{{ $player->strength }}" placeholder="Fuerza"></td>
                            <td><input type="number" name="players[{{ $loop->index }}][speed]" value="{{ $player->speed }}" placeholder="Velocidad"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center;">
                    <button type="submit" class="custom-button">Simular Torneo</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>