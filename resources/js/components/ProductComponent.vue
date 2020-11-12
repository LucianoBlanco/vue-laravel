<template>
    <div class="col-md-6">
        <form @submit.prevent="editProduct(product)" v-if="editProductActive">
        <h3>Editar Productos</h3>
        <input type="text" placeholder="Nombre"
        class="form-control mb-2" v-model="product.name">
            <input type="number" placeholder="Price"
        class="form-control mb-2" v-model="product.price">
        <input type="text" placeholder="Descripcion"
        class="form-control mb-2" v-model="product.description">
        <button class="btn btn-success" type="submit">Guardar</button>
        <button class="btn btn-danger" type="submit"
        @click="cancelEdit()">Cancelar</button>
        </form>

        <form @submit.prevent="agregar()" v-else>
            <h3>Agregar Productos</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="product.name">
            <input type="number" placeholder="Price"
            class="form-control mb-2" v-model="product.price">
            <input type="text" placeholder="Descripcion"
            class="form-control mb-2" v-model="product.description">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>
        
        <hr class="mt-3">
        <table>
            <thead>
                <h3>Listado de Productos</h3>
                <tr class="list-group-item my-2" v-for="(item, index) in products" :key="index">
                    <!-- <th class="list-group-item" -->
                            <th>Nombre: {{item.name}} ______</th>
                            <th>Precio: {{item.price}} _____</th>
                            <th>Descripcion: {{item.description}}</th>
                            <button class="btn btn-danger btn-sm"
                            @click="deleteProduct(item,index)">Eliminar</button>
                            <button class="btn btn-warning btn-sm" 
                            @click="editForm(item)">Editar</button>
                    <!-- </th> -->
                </tr>
            </thead>
        </table>
           
    </div>
    
</template>

<script>
export default {
    data(){
        return {
            products: [],
            product: {name: '', price: '', description: ''},
            editProductActive: false
        }
    },
    created(){
        axios.get('/producto')
         .then((res) => {
             this.products = res.data;
         })
    },
    methods:{
        agregar(){
         //  console.log(this.product.name , this.product.price);
            if(this.product.name.trim() === '' || this.product.price.trim() === '' || this.product.description.trim() === ''){
                 alert('Debes completar todos los campos antes de guardar');
                 return;
            }
            const params={
                name: this.product.name,
                price: this.product.price, 
                description: this.product.description
                 }
            this.product.name = '';
            this.product.price = '';
            this.product.description = '';
            axios.post('/producto', params)
                .then((res) => //console.log(res.data))
                {
                    this.products.push(res.data.product.data)
                })
        },
        editForm(item){
            this.editProductActive = true;
            this.product.name = item.name;
            this.product.price = item.price;
            this.product.description = item.description;
            this.product.id = item.id;
        },
        editProduct(item){
            const params = {name: item.name, price: item.price, description: item.description};
            axios.put(`/producto/${item.id}`, params)
                .then((res) => {
                    this.editProductActive = false;
                    const index = this.products.findIndex(
                        indexProduct => indexProduct.id === res.data.id)
                        this.products.splice(index, 1, res.data);

                        this.product = {name: '', price: '', description: ''}
                        axios.get('/producto')
                            .then((res) => {
                                this.products = res.data;
                            })
                })
        },
        deleteProduct(item,index){
            axios.delete(`/producto/${item.id}`)
                .then(()=>{
                    this.products.splice(index, 1)
                })
        },
        cancelEdit(){
            this.editProductActive = false;
            this.product = {name: '', price: '', description: ''}
        }
    }
}
</script>