@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <button style='width:70px; height:35px' >Volver</button>
                <div class="card-header">
                    <div class="text-center" style="background-color: khaki">Administrador de Ventas</div> 
                </div>

                <div class="card-body">
                    <sale-component></sale-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection