<template>
  <div>
      <h1>Register</h1>
      <form @submit.prevent="handleSubmit">
        <div>
            <label >Nama</label>
            <input type="text" v-model="form.name">
            <small class="error" v-if="errors.name">
                {{errors.name[0]}}
            </small>
            </div>
        <div>
            <label >Email address</label>
            <input type="email" v-model="form.email">
           <small class="error" v-if="errors.email">
                {{errors.email[0]}}
            </small>
        </div>
        <div>
            <label >Password</label>
            <input type="password" id="exampleInputPassword1" placeholder="Password" v-model="form.password">
            <small class="error" v-if="errors.password">
                {{errors.password[0]}}
            </small>
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  </div>
</template>

<script>
export default {
    data(){
        return {
            form:{
                name: '',
                email: '',
                password: '',
            },
            errors:{ }
        }
        
    },
    methods: {
        handleSubmit() {
            axios.post('/api/users', this.form).then((response) => {
                if(response.data.status){
                    console.log(response)
                    alert(response.data.message)
                    this.$router.push({ 
                        name:'User'
                    })
                    
                }
            }).catch((error) => {
                if(error.response.status === 443){
                    this.errors= error.response.data.errors

                }
                
            })
        } 
    }

}
</script>

<style>

</style>