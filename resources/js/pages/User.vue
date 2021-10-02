<template>
   <!-- <h1>hello {{$route.params.name}}</h1> -->
   <div>
      <!-- <section v-if="$route.params.name">
         <h1>hello {{$route.params.name}}</h1>
      </section> -->
      <!-- atau -->
      <!-- <section v-if="id">
         <h1>hello {{detailuser.name}}</h1> -->
         <!-- <router-link to="/user">Kembali</router-link> -->
         <!-- <router-link :to="{name : 'User'}">Kembali</router-link>
      </section> -->
      <section>
         <h1>DAFTAR USER</h1>
         <router-link to="/user/create">Create</router-link>
         <ul>
            <li v-for="user in users" :key="user.id">
               <!-- <router-link :to="'/user/'+ user.name">{{user.name}}</router-link> -->
               <!-- atau -->
               <!-- <router-link :to="profile_u(user.name)">{{user.name}}</router-link> -->
               <!-- atau -->
               <a href="" @click.prevent="lihatuser(user.id)">{{user.name}}</a>
            </li>
         </ul>
      </section>
   </div>
</template>

<script>
export default {
 
   data() {
      return {
         users : [],
      
      }
   },
     mounted(){
        this.getUsers()

         // axios.get('/api/users').then((response) => {
         //   this.users = response.data
         // })
         // atau
         // fetch('/api/users')
         // .then(response => response.json())
         // .then(data => {
         //    console.log(data)
         //    this.users = data
         // });
      },
   methods: {
      getUsers(){
          axios.get('/api/users').then((response) => {
           this.users = response.data
        
         })
      },
      profile_u(name) {
        return '/user/'+ name.toLowerCase()
      },
    
      lihatuser(id){
         // this.$router.push('/user/' + name.toLowerCase())
         // atau
         this.$router.push({
            name:'Profile',
            params: {id:id}  
            // bisa tulis satu saja yang id
         })
      }
   }

   
}
</script>

<style>

</style>