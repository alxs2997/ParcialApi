<template>
    <div class="dashboard0">
        <Header/>
                <h3>De clic sobre el dato que quiere ver, modificar o eliminar.</h3>
                <b-button pill variant="info" v-on:click="nuevo()">Añadir otro Juego</b-button>
            <br>
            <br>
       <div class="container">
           
           <table class="table table-hover">
  <thead class="thead table-dark" >
    <tr class="table-active">
        <th scope="col text-center">ID</th>
        <th scope="col">TITULO</th>
        <th scope="col" width="250px">CLASIFICACION</th>
        <th scope="col">AÑO</th>
        <th scope="col">DESCRIPCION</th>
        <th scope="col">TIPO</th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="games in lista" :key="games.id" v-on:click="editar(games.id)">
      <th scope="row">{{ games.id }}</th>
        <td>{{ games.titulo }}</td>
        <td>{{ games.clasificacion }}</td>
        <td>{{ games.anio }}</td>
        <td>{{ games.Descripcion }}</td>
        <td>{{ games.Tipo }}</td>
    </tr>
  </tbody>
</table>
       </div>
        <Footer/>
    </div>
</template>

<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import axios from 'axios'
export default{
    name:"Dashboard0",
    data(){
        return{
            lista:null,
           
        }
    },
    components:{
        Header,
        Footer
    },
     methods:{
        editar(id){
            this.$router.push('/edita0/' + id);
        },
        nuevo(){
            this.$router.push('/nuev0');
        }
    },    
    mounted:function(){
        let dir = "http://localhost:8000/api/games";
        axios.get(dir).then(d=>{
            console.log(d.data);
            this.lista = d.data.data;
        })
    }
}
   

</script>

<style scoped>

</style>
