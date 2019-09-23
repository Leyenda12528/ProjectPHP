@extends('layouts.app')
@section('content')

<div class="tablas">
        <ul class="nav nav-tabs" id="myTab" role="tablist">            
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new" role="tab" aria-controls="home" aria-selected="true">Ingresar Nuevo Administrador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#list" role="tab" aria-controls="profile" aria-selected="false">Listar Administradores</a>
            </li>
            @if (isset($exito))
                <li>&nbsp;</li><li><div class="alert alert-success" role="alert">{{ $exito }}</div></li>
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="home-tab">
          <table class="table table-hover">
                    <thead class="text-white">
                        <tr>
                            <th><strong>Administrador</strong></th>                            
                        </tr>
                    </thead>
                    <tbody id=''>
                        <tr>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                    @include('auth.register2')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>                        
                    </tbody>
                </table>
        </div>
          <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="profile-tab">
                <div class="containter">
                        <div class="row justify-content-center">
                                <table class="table table-hover">
                                        <thead class="text-white">
                                            <tr>
                                                <strong>
                                                        <th>Nombre</th>
                                                        <th>Correo electronico</th>
                                                        <th>Tarjeta</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                </strong>
                                            </tr>
                                        </thead>
                                        <tbody id='' class="text-white">
                                            @foreach ($users as $users)
                                                <tr>
                                                    <td>{{$users->name}}</td>
                                                    <td>{{$users->email}}</td>
                                                    <td>{{$users->tarjeta}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>    
                    </div>
                </div>
            </div>
        </div>
        </div>



@endsection