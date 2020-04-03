// componente del formulario
<template>
                <div class="card">
                <div class="card-header">¿Que haras hoy?</div>

                <div class="card-body">
                                    
                        <form action="" v-on:submit.prevent="newPensamiento()">
                        <div class="form-group">
                        <label for="">Hoy hare:</label>
                        <input type="text" class="form-control" name="hacer" v-model="Descripcion">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar actividad</button>
                        </form>
                </div>
            </div>
</template>

<script>
export default {
    data(){
        return{
            Descripcion: ''
        }
    },
    
        mounted() {
            console.log('Component mounted.')
        
    },

        methods: {
        newPensamiento(){
            const params = {
                Descripcion: this.Descripcion
            };

            this.Descripcion = '';
            axios.post('/pensamientos', params)
            .then((response) => {
                const pensamiento = response.data;       
                this.$emit('new', pensamiento);
                
            });

       
    }
}
}
</script>
