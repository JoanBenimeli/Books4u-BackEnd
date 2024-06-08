<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            padding: 0;
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
        .banda{
            width: 100%;
            background-color: black;
            color: white;
        }
        .ttl{
            font-size: 30pt;
            text-align: center;
            color:white;
        }
    </style>
</head>
<body>
    <div class="banda">
        <p class="ttl">Books4u</p>
    </div>
    <div style="text-align: center;">
        <h1>Hola {{ $datos->userLog['nombre'] }},</h1>
        <h2>Aquí está tu factura.</h2>
        <p>A continuación encontrarás un resumen del artículo que has pedido.</p>
        <p><strong>Fecha del pedido:</strong> {{ now() }}</p>
    </div>
    <div style="margin-top: 20px; width:60%;">   
        <h2>Resumen de tu pedido</h2>
            <ul>
                <li><strong>Nombre del libro:</strong> {{$datos->libro['nombre']}}</li>
                <li><strong>Precio:</strong> {{$datos->libro['precio']}} €</li>
                <li><strong>Descripción:</strong></li>
                <li>{{$datos->libro['descripcion']}}</li>
            </ul>
        <h2>Información del vendedor</h2>
        <p><strong>Nombre de vendedor:</strong> {{ $datos->libro['usuario']['nombre'] }} / &#64;{{ $datos->libro['usuario']['nick'] }}</p>
        <p><strong>Ubicación:</strong> {{ $datos->libro['usuario']['comunidad'] }} / {{ $datos->libro['usuario']['provincia'] }}</p>
    </div>
    <div class="banda"></div>
</body>
</html>
