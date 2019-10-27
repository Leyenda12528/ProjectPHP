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
    <title>Reporte</title>
</head>
<body>
    
    <div class="m-3">
        <div class="text-center bg-dark p-3 text-white">
            <h1>Reporte de Vuelos ABBIANKKA</h1>
        </div>
        
        <div class="m-3">
            <div class="py-2">
                <div class="mx-3 btn btn-primary top-space border border-danger text-white text-center">
                    Total de Vuelos : {{ $cantV }}
                </div>
                <div class="mx-3 btn btn-secondary top-space border border-danger">
                    Total de Aviones : {{ $cantA }}
                </div>
                
            </div>
            <div>
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>Id Vuelo</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Ruta</th>
                                    <th>Avión</th>
                                    <th>Modelo</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($data as $item)
                                        <tr class="text-center">
                                            <th scope="row">{{$item->viaje_id}}</th>
                                            <td>{{$item->fecha}}</td>
                                            <td>{{$item->hora}}</td>
                                            <td>{{$item->ciudad_origen}}/{{$item->ciudad_destino}}</td>
                                            <td>{{$item->avion}}</td>
                                            <td>{{$item->modelo}}</td>
                                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
            </div>

        </div>
    </div>
    <footer class="footer">
        Copyright &copy; Team Leyend@s
    </footer>
</body>
</html>