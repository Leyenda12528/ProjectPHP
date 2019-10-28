@extends('layouts.app2')
@section('content')
<div class="tablas">
        <ul class="nav nav-tabs" id="myTab" role="tablist">            
            <li class="nav-item">
                <a class="nav-link active bg-secondary text-white" id="home-tab" data-toggle="tab" href="#list" role="tab" aria-controls="home" aria-selected="true">Listar Administradores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-secondary text-white" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false">Ingresar Nuevo Administrador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-secondary text-white" id="profile-tab" href="http://127.0.0.1:8000/Reportes" target="_blank" role="tab" aria-controls="profile" aria-selected="false">Reportes</a>
            </li>
            @if (isset($exito))
                <li>&nbsp;</li><li><div class="alert alert-success" role="alert">{{ $exito }}</div></li>
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-hover">
                    <thead class="text-white bg-dark">
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
            <!--mostrar admins-->
            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="profile-tab">
                <div class="containter">
                    <div class="row justify-content-center" id="sa">
                        <table class="table table-hover bg-white">
                            <thead class="text-white bg-dark">
                                <tr>
                                    <strong>
                                        <th><h4>Nombre @{{hola}}</h4></th>
                                        <th><h4>Correo electronico</h4></th>
                                        <th><h4>Tarjeta</h4></th>
                                        <th><h4>Editar</h4></th>
                                    </strong>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <tr v-for="user of users">
                                    <td>@{{user.name}}</td>
                                    <td>@{{user.email}}</td>
                                    <td>@{{user.tarjeta}}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--fin  de mostrar admins-->
            
            <!---->
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/tools/sa.js"></script>
@endsection