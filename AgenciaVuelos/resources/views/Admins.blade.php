@extends('layouts.app')
@section('content')

<div class="tablas">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active bg-secondary text-white mx-1" id="home-tab" data-toggle="tab" href="#list"
                role="tab" aria-controls="home" aria-selected="true">Listar Administradores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-secondary text-white mx-1" id="profile-tab" href="http://127.0.0.1:8000/Reportes"
                target="_blank" role="tab" aria-controls="profile" aria-selected="false">Reportes</a>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bg-secondary text-white" data-toggle="modal" data-target="#formu">
                <i class="fas fa-plus-square"></i> Ingresar Administrador
            </button>
        </li>
        @if (isset($exito))
        <li>&nbsp;</li>
        <li>
            <div class="alert alert-success" role="alert">{{ $exito }}</div>
        </li>
        @endif
    </ul>
    <div class="tab-content" id="myTabContent">

        <!--mostrar admins-->
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="profile-tab">
            <div class="containter">
                <div class="row justify-content-center" id="sa">
                    <table class="table table-hover bg-white">
                        <thead class="text-white bg-dark">
                            <tr>
                                <strong>
                                    <th>
                                        <h4>Nombre @{{hola}}</h4>
                                    </th>
                                    <th>
                                        <h4>Correo electronico</h4>
                                    </th>
                                    <th>
                                        <h4>Tarjeta</h4>
                                    </th>
                                    <th>
                                        <h4>Eliminar</h4>
                                    </th>
                                </strong>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            <tr v-for="user of users">
                                <td>@{{user.name}}</td>
                                <td>@{{user.email}}</td>
                                <td>@{{user.tarjeta}}</td>
                                <td>
                                    <div v-on:click="seguro(user)" class="btn btn-danger rounded-circle text-white">
                                        <i class="fas fa-backspace"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Elminiar -->
                    <div class="modal fade" id="seguro" tabindex="-1" role="dialog" aria-labelledby="ediLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="ediLabel">Eiminar Administrador: @{{selected.name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿ Esta seguro de eliminar a este Admnistrador de forma permanente?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" v-on:click="eliminar">Aceptar</button>
                                    <button type="submit" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="erase">
                        <input type="hidden" id="token" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </form>
                    <!-- Fin Elminiar -->
                </div>
            </div>
        </div>
        <!--fin  de mostrar admins-->


        <!-- add admin-->
        <div id="add">
            <!-- Modal -->
            <div class="modal fade" id="formu" tabindex="-1" role="dialog" aria-labelledby="formuLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content card">
                        <div class="">
                            <h4><strong>Nuevo Administrador</strong>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            @include('auth.register2')
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <!---->
        </div>
        <!-- Fin add admin-->

    </div>
</div>
<script src="https://kit.fontawesome.com/18e33f708d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="js/tools/sa.js"></script>
@endsection