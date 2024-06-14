@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nueva Habitacion</h3>
            </div>
            <form action="{{ route('habitacion.update',$habitacion->id) }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tipo">Tipo:</label>
                                <input type="text" class="form-control" name="tipo" id="tipo" value="{{$habitacion->tipo}}"
                                    placeholder="Ingrese el tipo de habitacion">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="numero">Numero:</label>
                                <input type="text" class="form-control" name="numero" id="numero" value="{{$habitacion->numero}}"
                                    placeholder="Ingrese el numero de la habitacion">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="text" class="form-control" name="precio" id="precio" value="{{$habitacion->precio}}"
                                    placeholder="Ingrese el precio de la habitacion">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="fotografia">Seleccione la imagen</label>
                                <input type="file" class="form-control" name="fotografia" id="fotografia" value="{{$habitacion->fotografia}}"> 
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1"> Guardar</button>
                        <button type="reset" class="btn btn-danger me-1 mb-1"
                            onclick="window.location.href='{{ url('/hotel/habitacion') }}'"> Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
