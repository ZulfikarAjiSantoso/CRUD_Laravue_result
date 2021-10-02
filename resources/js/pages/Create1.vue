<template>
    <form @submit.prevent="handleSubmit" class="container mt-3 w-50">
        <!-- <div class="form-group d-flex flex-column ">
            <label >Upload Foto</label>
            <img :src="priviw" alt="" width="100">
            <input type="file"  name="image" @change="upload"  >
        </div> -->
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" placeholder="Name" v-model="form.name">
             <small class="error text-danger"  v-if="errors.name">
                {{errors.name[0]}}
            </small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="form.email">
         
              <small class="error text-danger" v-if="errors.email">
                {{errors.email[0]}}
            </small>
        </div>
         <label for="exampleInputPassword1">Gender</label>
            <select class="form-control" v-model="form.type">   
                 <option selected>Choose...</option> 
                <option value="male">male</option>
                <option value="female">female</option> -->
            </select>
        <br>
        <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary d-flex flex-column justify-content-center align-items-center">Submit</button>
           <router-link to="/home" class="btn btn-sm btn-danger d-flex flex-column justify-content-center text-bold" >Back</router-link>
        </div>
    </form>
</template>

<script>
export default {
    data(){
        return{
            form: {
                name:'',
                email:'',
                type: ''
                
            },
            priviw: null,
            image: null,
             errors:{ }

           
        }
    },

    methods: {

        upload(e){
            let files = e.target.files[0]
            this.priviw = URL.createObjectURL(files)
            this.image=files
            
        },
        handleSubmit(){
            axios.post('/api/home', this.form).then((response) => {
                if(response.data.status){
                       console.log(response)
                    alert(response.data.message)
                    this.$router.push({ 
                        name:'Home'
                    })
                }
            }).catch((error) => {
                  if(error.response.status === 422){
                    this.errors= error.response.data.errors

                }
            })
        }
    }
}
</script>

<style>

</style>