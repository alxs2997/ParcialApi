<template>
    <div>
        <Header/>
        <h3>Añadir nuevo comic a su lista.</h3>
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
                        <textarea name="description" id="Description" rows="10" cols="65" v-model="form.Description"></textarea>
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

                <div class="form-group">
                    <button type="button" class="btn btn-primary margen" v-on:click="guardar()">Guardar</button>
                    <button type="button" class="btn btn-dark margen" v-on:click="salir()">Salir</button>
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
            })
            
        },
        salir(){
            this.$router.push("/");
            console.log("boton funciona")
        }
    }
}
</script>

<style scoped>
.left{
    text-align: left;
}
</style>