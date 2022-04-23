<template>
    <div>
        <Header/>
        <h3>Añadir nuevo Juego a su lista.</h3>
            <div class="container">
                <form action="" class="form-horizontal">
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Título:</label>
                    <div class="col-sm-5">
                        <input type="text" placeholder="Introduce título..." name="titulo" class="form-control" id="titulo" v-model="form.titulo">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Descripción:</label>
                    <div class="col-sm-5">
                        <textarea name="description" placeholder="Introduce descripción de no más de 500 caracteres..." class="form-control" id="Description" rows="10" cols="65" v-model="form.Descripcion"></textarea>
                        <small id="texto_chico" class="form-text text-muted">*Por favor escriba una descripción breve.</small>
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Clasificación:</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="para mayores de..." name="clasificacion" class="form-control" id="clasificacion" v-model="form.clasificacion">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Año:</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="año..." name="año" class="form-control" id="anio" v-model="form.anio">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Tipo:</label>
                    <div class="col-sm-8">
                        <input type="text" placeholder="pertenece al género" name="tipo" class="form-control" id="Tipo" v-model="form.Tipo">
                    </div>
                </div>
                    <br>
                <div class="form-group">
                    <b-button pill variant="primary" v-on:click="guardar()">Guardar</b-button>
                    <b-button pill variant="secondary" v-on:click="salir()">Salir</b-button>
                </div>
            </form>
            </div>
        <!--<Footer/>-->
    </div>
</template>

<script>
import Header from '@/components/Header.vue'
//import Footer from '@/components/Footer.vue'
import axios from 'axios'
export default{
    name:"Nuev0",
   data:function(){
       return{
           form:{
               "titulo" : "",
                "Descripcion" : "",
                "clasificacion": "",
                "anio": "",                
                "Tipo" : "",
                "timestamps": ""
                
           }
       }
   },
    components:{
        Header,
        //Footer
    },
    methods:{
        guardar(){
            axios.post("http://localhost:8000/api/games/", this.form)
            .then(data =>{
                console.log(data);
                this.$router.push("/dashboard0");
                this.makeToast("Hecho","comic agreado","success");
            }).catch( e=>{
                console.log(e);
                this.makeToast("ERROR!","Fallamos al guargar","danger");
            })
            
        },
        salir(){
            this.$router.push("/dashboard0");
            console.log("boton funciona")
        },
        makeToast(titulo,texto,tipo) {
        this.$bvToast.toast(texto, {
          title: titulo,
          variant: tipo,
          autoHideDelay: 5000,
          solid: true,
          appendToast: false
        })
      }
    }
}
</script>

<style scoped>
.left{
    text-align: left;
}
</style>