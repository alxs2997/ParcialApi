<template>
    <div>
        <Header />
        <div class="container">
            <form action="" class="form-horizontal">
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Título:</label>
                    <div class="col-sm-5">
                        <input type="text" name="titulo" class="form-control" id="titulo" v-model="form.titulo">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Descripción:</label>
                    <div class="col-sm-5">
                        <textarea name="description" id="Descripcion" rows="10" cols="65" v-model="form.Descripcion"></textarea>
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Clasificación:</label>
                    <div class="col-sm-2">
                        <input type="text" name="clasificacion" class="form-control" id="clasificacion" v-model="form.clasificacion">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Año:</label>
                    <div class="col-sm-2">
                        <input type="text" name="año" class="form-control" id="anio" v-model="form.anio">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Tipo:</label>
                    <div class="col-sm-8">
                        <input type="text" name="tipo" class="form-control" id="Tipo" v-model="form.Tipo">
                    </div>
                </div>
                    <br>
                <div class="form-group">
                    <b-button pill variant="danger" v-on:click="eliminar()">Eliminar</b-button>
                    <b-button pill variant="primary" v-on:click="editar()">Editar</b-button>
                    <b-button pill variant="secondary" v-on:click="salir()">Salir</b-button>
                </div>
            </form>
        </div>
        
        <!--<Footer />-->
    </div>

</template>

<script>
import Header from '@/components/Header.vue';
//import Footer from '@/components/Footer.vue';
import axios from 'axios';

export default({
   name:"Edita0",
   components:{
       Header,
       //Footer
   },
   data:function(){
       return{
           form:{
               "id" : "",
               "titulo" : "",
                "Descripcion" : "",
                "clasificacion": "",
                "anio": "",                
                "Tipo" : "",
                "timestamps": ""
                
           }
       }
   },
   methods:{
       editar(){
           axios.put("http://localhost:8000/api/games/",this.form)
           .then(data=>{
                console.log(data);
                this.$router.push("/dashboard0");
           })
       },
        salir(){
       this.$router.push("/dashboard0");
        },
        eliminar(){

             this.form.id,
            axios.delete("http://localhost:8000/api/games/" + this.form.id)
            .then(datos=>{
                console.log(datos);
                 this.$router.push("/dashboard0");
            });
        }
   },
   mounted:function(){
       this.form.id = this.$route.params.id
       console.log(this.id);
       axios.get("http://localhost:8000/api/games/" + this.form.id)
       .then( datos => {
           console.log(this.form);
           this.form.titulo = datos.data.data.titulo;
           this.form.Descripcion = datos.data.data.Descripcion;
           this.form.clasificacion = datos.data.data.clasificacion;
           this.form.anio = datos.data.data.anio;
           this.form.Tipo = datos.data.data.Tipo;
           this.form.timestamps = datos.data.data.timestamps;
       })
   }
})
</script>


<style scoped>
.left{
    text-align: left;
}
</style>