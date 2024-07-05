<!DOCTYPE html>
<html>

<head>
    <title>Resultado del Torneo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
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

        .tournament-bracket {
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
        }

        .round {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .match {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin: 5px;
        }

        .round-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .line {
            height: 20px;
            border-left: 1px solid #000;
            margin: 0 auto;
        }

        .vertical-line {
            width: 1px;
            height: 20px;
            background-color: #000;
            margin: 0 auto;
        }

        .horizontal-line {
            height: 1px;
            width: 100%;
            background-color: #000;
        }

        .connector {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1585px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Resultado del Torneo</h1>
        <div class="tournament-bracket">
            @foreach ($rounds as $roundIndex => $round)
                @if ($roundIndex > 0)
                    <div class="connector">
                        <div class="vertical-line"></div>
                        <div class="horizontal-line"></div>
                        <div class="vertical-line"></div>
                    </div>
                @endif
                <div class="round">
                    @foreach ($round as $player)
                        <div class="match">
                            {{ $player->name }}
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="match">
                <h2>Ganador: {{ $winner->name }}</h2>
            </div>
        </div>
        <h2>Listado de Participantes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nivel</th>
                    <th>Fuerza</th>
                    <th>Velocidad</th>
                    @if ($player->gender === 'female')
                        <th>Tiempo de Reacción</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->skill_level }}</td>
                        <td>{{ $player->strength }}</td>
                        <td>{{ $player->speed }}</td>
                        @if ($player->gender === 'female')
                            <td>{{ $player->reaction_time }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a class="custom-button" href="{{ route('torneo.form') }}">Volver al Menú Principal</a>
        </div>
    </div>
</body>

</html>
