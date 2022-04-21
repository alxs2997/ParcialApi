<template>
    <div class="dashboard0">
        <Header/>
        <div class="text-center">

                    <a href="#" class="btn btn-success">Nuevo Juego <i class="fas fa-forward"></i></a>
                </div>
                <br>
       <div class="container">
           <table class="table table-dark table-hover">
  <thead >
    <tr class="table-active">
        <th scope="col">ID</th>
        <th scope="col">TITULO</th>
        <th scope="col">CLASIFICACION</th>
        <th scope="col">AÑO</th>
        <th scope="col">DESCRIPCION</th>
        <th scope="col">TIPO</th>
        <th scope="col">ACCIONES</th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="games in lista" :key="games.id">
      <th scope="row">{{ games.id }}</th>
        <td>{{ games.titulo }}</td>
        <td>{{ games.clasificacion }}</td>
        <td>{{ games.anio }}</td>
        <td>{{ games.Descripcion }}</td>
        <td>{{ games.Tipo }}</td>
        <td>
            <a href="" title="show">
                <i class="fas fa-eye text-success fa-lg"></i>
            </a>
            <a href="">
                <i class="fas fa-edit fa-lg"></i>
            </a>
            
            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                <i class="fas fa-trash text-danger"></i>
            </button>
        </td>
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
