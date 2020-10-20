<template>
    <div>
        <h3>Agregar Productos</h3>
        <form @submit.prevent="">
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="product.name">
             <input type="number" placeholder="Price"
            class="form-control mb-2" v-model="product.price">
            <input type="text" placeholder="Descripcion"
            class="form-control mb-2" v-model="product.description">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            products: [],
            product: {name: '', price: '', description: ''}
        }
    },
    methods:{
        agregar(){
           // console.log(this.tarea.name , this.tarea.description)
            const params={
                name: this.tarea.name, 
                description: this.tarea.description
                }
            axios.post('/producto',)
        }
    }
}
</script>