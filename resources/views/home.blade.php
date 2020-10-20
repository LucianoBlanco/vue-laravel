@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrador de Productos</div>

                <div class="card-body">
                    <product-component></product-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
