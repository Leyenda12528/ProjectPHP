<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          text-align: center;
        }
        </style>
    <title>Ticket</title>
</head>
<body>
    
    <div class="m-3">
        <div class="text-center bg-dark p-3 text-white">
            <h3>Ticket de Compra ABBIANKKA</h3>
        </div>
        <div class="m-3">
            <div class="clas"></div>
            <div>
                <table class="table">
                    <thead class="">
                        <tr class="bg-info text-center">
                            <th>&nbsp; Detalles Vuelo</th>
                            <th><strong>Número {{$ticket['Vuelo']}}</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th class="table-dark pt-4">Fecha Viaje </th>
                            <td>{{$ticket['fecha']}} <br>{{$ticket['horaP']}}</td>
                        </tr>
                        <tr class="text-center">
                            <th class="">Cant. Pasajeros </th>
                            <td>{{$ticket['pasajeros']}}</td>
                        </tr>
                        <tr class="text-center">
                            <th class="table-dark pt-4">Ruta </th>
                            <td>{{$ticket['desde']}} - {{$ticket['hacia']}}</td>
                        </tr>
                        <tr class="text-center">
                            <th class="">Clase </th>
                            <td>{{$ticket['claseT']}}</td>
                        </tr>
                        <tr class="text-center">
                            <th class="table-dark">Precio </th>
                            <td>&#36;&nbsp;{{$ticket['precio']}}.00</td>
                        </tr>
                        <tr class="text-center">
                            <th class="table-secondary">Total </th>
                            <td class="table-secondary">&#36;&nbsp;{{$ticket['total']}}.00</td>
                        </tr>
                    </tbody>
                </table>
                <h6>Pago Efectuado: {{$ticket['dia']}}</h6>
            </div>
        </div>
    </div>
    <footer class="footer">
        Copyright &copy; Team Leyend@s
    </footer>
</body>
</html>