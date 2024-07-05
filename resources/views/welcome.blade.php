<!DOCTYPE html>
<html>

<head>
    <title>Torneo de Tenis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 80%;
            max-width: 800px;
        }

        h1,
        h2 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: justify;
            line-height: 1.6;
            color: #666;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Torneo de Tenis</h1>
        <div style="text-align: center;">
            <p>La simulación del torneo funciona de la siguiente forma: hay 2 modos de torneo, uno femenino y otro masculino, ambos modos tienen 16 jugadores. Estos tienen niveles de habilidades: Nivel del jugador, Velocidad, Fuerza y Tiempo de reacción, este último solamente es para los torneos femeninos. Los enfrentamientos son entre 2 competidores y la modalidad es por eliminación directa. Además de las habilidades, cada jugador tiene el factor suerte. Este depende del nivel del jugador y afecta a sus habilidades influyendo positiva o negativamente:</p>
            <ul style="text-align: left;">
                <li>Si el nivel del jugador es menor a 25, su suerte puede variar de -25 a 25 puntos.</li>
                <li>Si es menor a 50, la suerte puede variar de -15 a 50 puntos.</li>
                <li>Si es menor a 100, los puntos van desde 25 a 70.</li>
            </ul>
            <a href="{{ route('torneo.form') }}" class="custom-button">Comenzar</a>
        </div>
    </div>
</body>

</html>
