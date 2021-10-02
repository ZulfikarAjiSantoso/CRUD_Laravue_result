<template>

   <div>
      <section v-if="id">
         <h1>hello {{detailuser.name}}</h1>
         <!-- <router-link to="/user">Kembali</router-link> -->
         <router-link :to="{name : 'User'}">Kembali</router-link>
         <router-link :to="{name : 'Gambar', params:{id: detailuser.id}}">uploaded</router-link>
         <a href="" @click.prevent="handledelete" > Hapus </a>
         <a href="" @click.prevent="Edit" > Edit </a>
        
      </section>
      
   </div>
</template>

<script>
export default {
   props: ['id'],
   data() {
      return {

         detailuser: {}
      }
   },
     mounted(){
        this.getUser()

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
      getUser(){
          axios.get('/api/users/' + this.id).then((response) => {
              this.detailuser = response.data
         })

      },
      handledelete(){
        if(confirm('Hapus ngak')){
            axios.delete('/api/users/' +this.id).then((response)=> {
               if(response.data.status){
                   alert(response.data.message)
                this.$router.push({
                   name: 'User'
                })
               }
         })
        }else{
           return false
        }
      },
      Edit(){
          this.$router.push({
                   name: 'Edit',
                   params: {
                      id: this.id
                      }
                })
      }
   }

   
}
</script>

<style>

</style>