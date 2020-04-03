// componente del poensamiento 
<template>

            <div class="card">
               <div class="card-header">Publicado  {{pensamiento.created_at}}</div>
                <div class="card-body">

                    <input v-if="updateMode" type="text" class="form-control" v-model="pensamiento.descripcion" >
                    <p v-else>  {{pensamiento.descripcion}} </p>
                    

                </div>    
                <div class="card-footer">
                <button v-if="updateMode" class="btn btn-success" v-on:click="onClickEditar"> Guardar</button>
                <button v-else class="btn btn-success" v-on:click="onClickUpdate"> Editar</button>
                <button class="btn btn-danger" v-on:click="onClickDelete"> Eliminar</button>
                </div>            
            </div>
</template>

<script>
    export default {
        props: ['pensamiento'],
        data (){
            return{
                updateMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then(() =>{
                this.$emit('delete');
                });
            },
            onClickUpdate() {
                this.updateMode = true; 
            },
            onClickEditar() {
                const params = {
                    Descripcion: this.pensamiento.descripcion
                };
                axios.put(`/pensamientos/${this.pensamiento.id}`, params).then((response) =>{
                this.updateMode = false;
                const pensamiento = response.data; 
                this.$emit('Editar', pensamiento);
                })

            }
        }
    }
</script>
