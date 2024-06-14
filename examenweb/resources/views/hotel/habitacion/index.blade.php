@extends('layouts.admin')
@section ('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">LISTADO DE PROVEEDORES</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Proveedores</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('habitacion.index') }}" method="get">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" name="searchText" placeholder="Buscar clientes" value="{{$searchText}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                        <a href="{{route('habitacion.create')}}"   class="btn btn-success">Nuevo</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 200px;">Opciones</th>
                                    <th >#</th>
                                    <th>Tipo</th>
                                    <th style="width: 150px;">Numero de habitacion</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($habitacion as $habi)
                                <tr>
                                    <td>
                                        <a href="{{route('habitacion.edit',$habi->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <!-- Button trigger for danger theme modal -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$habi->id}}">Eliminar</button>
                                    </td>
                                    <td>{{$habi->id}}</td>
                                    <td>{{$habi->tipo}}</td>
                                    <td>{{$habi->numero}}</td>
                                    <td>{{$habi->precio}}</td>
                                    <td>
                                        <img src="{{ url('imagen/habitacion/' . $habi->fotografias) }}" alt="{{ $habi->fotografias }}" height="70px" width="70px" class="img-thumbnail">
                                    </td>
                                    
                                </tr>
                                @include('hotel.habitacion.modal') 
                                @endforeach 
                            </tbody>
                        </table>
                     $habitacion->links() 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hoverable rows end -->

@endsection
