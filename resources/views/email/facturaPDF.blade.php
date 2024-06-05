<!-- resources/views/email/factura.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body{
            background-color: #eeeeee;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            font-size: 20pt;
        }
        h2{
            font-size: 18pt;
        }
        p, ul, li {
            color: #555;
            font-size: 10pt;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        img{
            object-fit:cover;
        }
    </style>
</head>
<body>
        <h1>Hola {{ $datos->usuario['nombre'] }},</h1>
        <h2>Aquí está tu factura.</h2>
        <p>A continuación encontrarás un resumen del artículo que has pedido.</p>
        <p><strong>Fecha del pedido:</strong> {{ now() }}</p>

        <h2>Resumen de tu pedido</h2>
                <ul>
                    <li><strong>Nombre del libro:</strong> {{$datos->nombre}}</li>
                    <li><strong>Precio:</strong> {{$datos->precio}} €</li>
                    <li><strong>Descripción:</strong></li>
                    <li>{{$datos->descripcion}}</li>
                </ul>
        <h2>Información del Comprador</h2>
        <p><strong>Nombre de comprador:</strong> &#64;{{ $datos->usuario['nick'] }}</p>
        <p><strong>Ubicación:</strong> {{ $datos->usuario['comunidad'] }} / {{ $datos->usuario['provincia'] }}</p>
</body>
</html>
