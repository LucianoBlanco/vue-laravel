<template>
    <div>
        <form @submit.prevent="editProvider(provider)" v-if="editProviderActive">
            <h3>Editar Proveedores</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="provider.name">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="submit"
            @click="cancelEdit()">Cancelar</button>
        </form>

        <form @submit.prevent="agregar()" v-else>
            <h3>Agregar Proveedor</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="provider.name">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>

        <hr class="mt-3">
        <h3>Listado de Proveedores</h3>
        <ul class="list-group my-2">
            <li class="list-group-item"
            v-for="(item, index) in providers" :key="index">
                <p>Nombre: {{item.name}}</p>
                <button class="btn btn-danger btn-sm"
                @click="deleteProvider(item,index)">Eliminar</button>
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
            providers: [],
            provider: {name: ''},
            editProviderActive: false
        }
    },
    created(){
        axios.get('/provider')
         .then((res) => {
             this.providers = res.data;
         })
    },
    methods:{
        agregar(){
         //  console.log(this.provider.name);
            if(this.provider.name.trim() === '') {
                 alert('Debes completar todos los campos antes de guardar');
                 return;
            }
            const params={
                name: this.provider.name
                 }
            this.provider.name = '';

            axios.post('/provider', params)
                .then((res) => //console.log(res.data))
                {
                    this.providers.push(res.data)
                })
        },
        editForm(item){
            this.editProviderActive = true;
            this.provider.name = item.name;
            this.provider.id = item.id;
        },
        editProvider(item){
            const params = {name: item.name};
            axios.put(`/provider/${item.id}`, params)
                .then((res) => {
                    this.editProviderActive = false;
                    const index = this.providers.findIndex(
                        indexProvider => indexProvider.id === res.data.id)
                        this.providers.splice(index, 1, res.data);

                        this.provider = {name: ''}
                        axios.get('/provider')
                            .then((res) => {
                                this.providers = res.data;
                            })
                })
        },
        deleteProvider(item,index){
            axios.delete(`/provider/${item.id}`)
                .then(()=>{
                    this.providers.splice(index, 1)
                })
        },
        cancelEdit(){
            this.editProviderActive = false;
            this.provider = {name: ''}
        }
    }
}
</script>