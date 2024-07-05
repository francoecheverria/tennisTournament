<!-- historicos.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Listado de Torneos Históricos</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f0f0f0;
        }

        .link {
            text-decoration: none;
            color: blue;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Listado de Torneos Históricos</h1>
    <div>
        <a class="custom-button" href="{{ route('torneo.form') }}">Volver al Menú Principal</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Género</th>
                <th>Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tournamentHistories as $history)
                <tr>
                    <td>{{ $history->date }}</td>
                    <td>{{ $history->gender }}</td>
                    <td><a href="{{ route('torneo.detalle', ['id' => $history->id]) }}" class="link">Ver Detalle</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
