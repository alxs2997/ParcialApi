<template>
    <div>
        <Header/>
        <h3>Añadir nuevo comic a su lista.</h3>
            <div class="container">
                <form action="" class="form-horizontal">
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Título:</label>
                    <div class="col-sm-5">
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Introduce título..." v-model="form.titulo">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Descripción:</label>
                    <div class="col-sm-5">
                        <textarea name="description" placeholder="Introduce descripción de no más de 500 caracteres..." class="form-control" id="Description" rows="10" cols="65" v-model="form.Description"></textarea>
                         <small id="texto_chico" class="form-text text-muted">*Por favor escriba una descripción breve.</small>
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Clasificación:</label>
                    <div class="col-sm-2">
                        <input type="text" name="clasificacion" placeholder="para mayores de..." class="form-control" id="clasificacion" v-model="form.clasificacion">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Año:</label>
                    <div class="col-sm-2">
                        <input type="text" name="año" placeholder="año..." class="form-control" id="anio" v-model="form.anio">
                    </div>
                </div>
                <div class="form-group left">
                    <label form="" class="control-label col-sm-2">Tipo:</label>
                    <div class="col-sm-8">
                        <input type="text" name="tipo" placeholder="pertenece al género" class="form-control" id="Tipo" v-model="form.Tipo">
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
    name:"Nuevo",
   data:function(){
       return{
           form:{
               "titulo" : "",
                "Description" : "",
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
            axios.post("http://localhost:8000/api/comics/", this.form)
            .then(data =>{
                console.log(data);
                this.$router.push("/");
                this.makeToast("Hecho","comic agreado","success");
            }).catch( e=>{
                console.log(e);
                this.makeToast("ERROR!","Fallamos al guargar","danger");
            })
            
        },
        salir(){
            this.$router.push("/");
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