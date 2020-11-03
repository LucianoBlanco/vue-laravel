<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-strong text-center">BIENVENIDO A VENAL</div>

                    <div class="card-body">
                        <button v-on:click="showViews(client)">Clientes</button>
                        <button >Productos</button>
                        <button >Proveedores</button>
                        <button >Stock</button>
                        <button >Ventas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
         data(){
            return {
                views: {client, product, provider, stock, sale}
            }
        },
        methods:{
            showViews: function(){
                if(this.view.client === 'client')
                    return view('client');
            }            
        }

    }
</script>
