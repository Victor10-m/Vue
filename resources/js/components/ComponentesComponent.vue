// componente de todos los componetes 
<template>
<div class="card">

         <!-- llamamos el componente para el formulario  -->
            <form-component  @new="addPensamiento"></form-component>
         <!-- llamamos el componente del registor de pensamientos  -->
            <pensamiento-component 
            v-for="(pensamiento, index) in pensamientos" 
            :key="pensamiento.id" 
            :pensamiento="pensamiento"
            @Editar="editarPensamiento(index, ...arguments)"
            @delete="deletePensamiento(index)">
            </pensamiento-component>
  
</div>
          

</template>

<script>
export default {
        
        data(){
            return{
                pensamientos: [{
                    'id': 1,
                    'Descripcion': 'abc',
                    'fecha': '02/04/20'
                }]
            }
        },
        mounted() {
            console.log('Component mounted.')
        
    },

    methods: {
        addPensamiento(pensamiento) {
            this.pensamientos.push(pensamiento);
        },
        editarPensamiento(index, pensamiento) {
            this.pensamientos[index] = pensamiento;
        },
        deletePensamiento(index) {
            this.pensamientos.splice(index, 1);
    }

    }
}
</script>