<template>
    <div class="dashboard">
        
        <Header/>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3>De clic sobre el dato que quiere ver, modificar o eliminar.</h3>
       <div class="container">
            <b-button pill variant="info" v-on:click="nuevo()">Añadir otro Comic</b-button>
            <br>
            <br>
           <table class="table table-hover">
  <thead class="thead table-dark">
    <tr class="table-active-bordered">
        <th scope="col">ID</th>
        <th scope="col">TITULO</th>
        <th scope="col">CLASIFICACION</th>
        <th scope="col">AÑO</th>
        <th scope="col">DESCRIPCION</th>
        <th scope="col">TIPO</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="comics in lista" :key="comics.id" v-on:click="editar(comics.id)">
      <th scope="row">{{ comics.id }}</th>
        <td>{{ comics.titulo }}</td>
        <td width="250px">{{ comics.clasificacion }}</td>
        <td>{{ comics.anio }}</td>
        <td>{{ comics.Description }}</td>
        <td>{{ comics.Tipo }}</td>
    </tr>
  </tbody>
</table>
       </div>
</div>
        <Footer/>
    </div>
</template>

<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import axios from 'axios';
export default{
    name:"Dashboard",
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
            this.$router.push('/editar/' + id);
        },
        nuevo(){
            this.$router.push('/nuevo');
        }
    },    

    mounted:function(){
        let dir = "http://localhost:8000/api/comics";
        axios.get(dir).then(d=>{
            console.log(d.data);
            this.lista = d.data.data;
        })
    }
}

</script>

<style scoped>

</style>
