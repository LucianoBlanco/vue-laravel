<template>
    <div>
        
        <form @submit.prevent="editClient(client)" v-if="editClientActive">
            <h3>Editar datos de Clientes</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="client.name">
             <input type="text" placeholder="Apellido"
            class="form-control mb-2" v-model="client.surname">
            <input type="number" placeholder="DNI"
            class="form-control mb-2" v-model="client.dni">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="submit"
            @click="cancelEdit()">Cancelar</button>
        </form>

        <form @submit.prevent="agregar()" v-else>
            <h3>Ingresar Cliente Nuevo</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="client.name">
             <input type="text" placeholder="Apellido"
            class="form-control mb-2" v-model="client.surname">
            <input type="number" placeholder="DNI"
            class="form-control mb-2" v-model="client.dni">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>
        <hr class="mt-3">
        <h3>Listado de Clientes</h3>
        <ul class="list-group my-2">
            <li class="list-group-item"
            v-for="(item, index) in clients" :key="index">
                <p>Nombre: {{item.name}}</p>
                <p>Apellido: {{item.surname}}</p>
                <p>DNI: {{item.dni}}</p>
                <button class="btn btn-danger btn-sm"
                @click="deleteClient(item,index)">Eliminar</button>
                <button class="btn btn-warning btn-sm" 
                @click="editForm(item)">Editar</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data(){
        return {
            clients: [],
            client: {name: '', surname: '', dni: ''},
            editClientActive: false
        }
    },
    created(){
        axios.get('/client')
         .then((res) => {
             this.clients = res.data;
         })
    },
    methods:{
        agregar(){
         //  console.log(this.product.name , this.product.price);
            if(this.client.name.trim() === '' || this.client.surname.trim() === '' || this.client.dni.trim() === ''){
                 alert('Debes completar todos los campos antes de guardar');
                 return;
            }
            const params={
                name: this.client.name,
                surname: this.client.surname, 
                dni: this.client.dni
                 }
            this.client.name = '';
            this.client.surname = '';
            this.client.dni = '';
            axios.post('/client', params)
                .then((res) => //console.log(res.data))
                {
                    this.clients.push(res.data)
                })
        },
        editForm(item){
            this.editClientActive = true;
            this.client.name = item.name;
            this.client.surname = item.surname;
            this.client.dni = item.dni;
            this.client.id = item.id;
        },
        editClient(item){
            const params = {name: item.name, surname: item.surname, dni: item.dni};
            axios.put(`/client/${item.id}`, params)
                .then((res) => {
                    this.editClientActive = false;
                    const index = this.clients.findIndex(
                        indexClient => indexClient.id === res.data.id)
                        this.clients.splice(index, 1, res.data);

                        this.client = {name: '', surname: '', dni: ''}
                        axios.get('/client')
                            .then((res) => {
                                this.clients = res.data;
                            })
                })
        },
        deleteClient(item,index){
            axios.delete(`/client/${item.id}`)
                .then(()=>{
                    this.clients.splice(index, 1)
                })
        },
        cancelEdit(){
            this.editClientActive = false;
            this.client = {name: '', surname: '', dni: ''}
        }
    }
}
</script>