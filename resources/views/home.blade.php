@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card display: inline-block">
                
                <div class="card-header" style="background-color: khaki">
                    <div class="align-right "><button style='width:70px; height:35px; background-color: lavender'>Volver</button></div>
                    <div class=" text-center ">Administrador de Productos</div> 
                </div>

                <div class="card-body">
                    <div>
                        <product-component></product-component>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>
@endsection
