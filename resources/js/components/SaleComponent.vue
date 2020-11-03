<template>
    <div>
        
        <form @submit.prevent="editSale(sale)" v-if="editSaleActive">
            <h3>Editar Ventas</h3>
            <input type="number" placeholder="Valor Unidad"
            class="form-control mb-2" v-model="sale.valueUnity">
             <input type="number" placeholder="Total"
            class="form-control mb-2" v-model="sale.total">
            <input type="date" placeholder="Fecha"
            class="form-control mb-2" v-model="sale.fetch">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="submit"
            @click="cancelEdit()">Cancelar</button>
        </form>

        <form @submit.prevent="agregar()" v-else>
            <h3>Realizar Venta</h3>
            <input type="number" placeholder="Valor Unidad"
            class="form-control mb-2" v-model="sale.valueUnity">
             <input type="number" placeholder="Total"
            class="form-control mb-2" v-model="sale.total">
            <input type="date" placeholder="Fecha"
            class="form-control mb-2" v-model="sale.fetch">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>
        <hr class="mt-3">
        <h3>Ventas realizadas</h3>
        <ul class="list-group my-2">
            <li class="list-group-item"
            v-for="(item, index) in sales" :key="index">
                <p>Valor Unidad: {{item.valueUnity}}</p>
                <p>Total: {{item.total}}</p>
                <p>Fecha: {{item.fetch}}</p>
                <button class="btn btn-danger btn-sm"
                @click="deleteSale(item,index)">Eliminar</button>
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
            sales: [],
            sale: {valueUnity: '', total: '', fetch: ''},
            editSaleActive: false
        }
    },
    created(){
        axios.get('/sale')
         .then((res) => {
             this.sales = res.data;
         })
    },
    methods:{
        agregar(){
        // console.log(this.sale.valueUnity , this.sale.total, this.sale.fetch);
            if(this.sale.valueUnity.trim() === '' || this.sale.total.trim() === '' || this.sale.fetch.trim() === ''){
                  alert('Debes completar todos los campos antes de guardar');
                  return;
            }
            const params={
                valueUnity: this.sale.valueUnity,
                total: this.sale.total, 
                fetch: this.sale.fetch
                }
            this.sale.valueUnity = '';
            this.sale.total = '';
            this.sale.fetch = '';
            axios.post('/sale', params)
                .then((res) => //console.log(res.data))
                {
                    this.sales.push(res.data)
                })

        },
        editForm(item){
            this.editSaleActive = true;
            this.sale.valueUnity = item.valueUnity;
            this.sale.total = item.total;
            this.sale.fetch = item.fetch;
            this.sale.id = item.id;
        },
        editSale(item){
            const params = {valueUnity: item.valueUnity, total: item.total, fetch: item.fetch};
            axios.put(`/sale/${item.id}`, params)
                .then((res) => {
                    this.editSaleActive = false;
                    const index = this.sales.findIndex(
                        indexSale => indexSale.id === res.data.id)
                        this.sales.splice(index, 1, res.data);

                        this.sale = {valueUnity: '', total: '', fetch: ''}
                        axios.get('/sale')
                            .then((res) => {
                                this.sales = res.data;
                            })
                })
        },
        deleteSale(item,index){
            axios.delete(`/sale/${item.id}`)
                .then(()=>{
                    this.sales.splice(index, 1)
                })
        },
        cancelEdit(){
            this.editSaleActive = false;
            this.sale = {valueUnity: '', total: '', fetch: ''}
        }
    }
}
</script>