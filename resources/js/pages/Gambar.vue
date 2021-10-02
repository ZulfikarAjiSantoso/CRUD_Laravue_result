<template>
    <div>
        <h1>Upload Foto</h1>
        <img :src="priviw" alt="" width="100">
        <div>
            <input type="file" name="photo" @change="upload">
        </div>
        <button @click="submit">upload</button>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data(){
        return{
            priviw: null,
            photo: null
        }
        },
   
        methods: {
            upload(e) {
             let files = e.target.files[0]
             this.priviw = URL.createObjectURL(files)
             this.photo=files
            },
            submit(){
            let formdata = new FormData()
            formdata.append('photo', this.photo)
                axios.post('/api/users/photo/'+this.id, formdata )
                .then(response => {
                    console.log(response)
                    
                }) 
            }
        }
  
}
</script>