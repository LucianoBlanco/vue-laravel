@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button style='width:70px; height:35px' >Volver</button>
            <div class="card col-md-12">
                <div class="card-header text-center" style="background-color: khaki">Administrador de Productos</div>

                <div class="card-body">
                    <provider-component></provider-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection