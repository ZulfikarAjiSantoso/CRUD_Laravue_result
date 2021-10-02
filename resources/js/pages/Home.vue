<template>
    <div class="container mt-5" >
         <router-link :to="{name: 'create'}" 
                    class="btn btn-primary shadow mb-1 d-flex justify-content-center align-items-center"
                    style="width: 6rem; height: 2rem"
                >Add</router-link>
        <table class="table">
        <thead>
            <tr>
       
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody >
            <tr v-for="user in anggota" :key="user.id">
        
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.type}}</td>
                <td class="  ">
                   
                    <router-link :to="{name: 'edit', params: {id:user.id}}" 
                    class="btn btn-warning btn-sm w-25 mb-1"
                    
                    >Edit</router-link>
                    <a href="" @click="handledelete(user.id)" class="btn btn-danger btn-sm"> Hapus </a>
                </td>
            </tr>
          
        </tbody>
        </table>
    </div>
</template>


<script>


export default {
     
    data() {
      return {
         anggota : [],
      
      }
   },
    mounted(){
        var app = this;
        axios.get('/api/home')
        .then((response) => {
            app.anggota = response.data
        })
          .catch(function (response) {
                    console.log(response);
                    alert("Data tidak bisa di muat");
                });

    },
   methods: {
        // getUsers(){
        //   axios.get('/api/home').then((response) => {
        //    this.anggota = response.data
        
        //  })
      
      handledelete(id){
          if(confirm('Data di Hapus?')){
              axios.delete('/api/home/'+ id)
                .then(function (response) {
                if(response.data.status){
                      alert(response.data.message)
                }
                })
          }else{
              return false
          }
      }
   }
}


</script>