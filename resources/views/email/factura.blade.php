<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            width: 100%;
            text-align: center;
        }
        h1 {
            font-size: 20pt;
        }
        h2{
            font-size: 12pt;
        }
        p {
            font-size: 8pt;
        }
    </style>
</head>
<body>
    <h1>Hola {{ $datos->userLog['nombre'] }},</h1>
    <h2>Gracias por comprar en Books4u, Aquí está tu factura.</h2>
    <p><strong>Fecha del pedido:</strong> {{ now() }}</p>
</body>
</html>
