<template>
    <div>
          <Header />
          <div class="content p-24" >
              <div class="intro-y box lg:mt-5 p-12">
                <h1>Ajouter un contrat</h1>
                <select  class="input border mt-2 mb-4 w-full" v-model="contrat.user_id">

                    <option value="" selected>Choisir un agent</option>

                    <option v-for="user in users" :key="user.id" :value="user.id">{{  user.name }}</option>

                    <option value="tout" >Tout</option>

                </select>
                      
                <ckeditor :editor="editor" v-model="contrat.description" :config="editorConfig"></ckeditor>
                <div class="flex justify-between">

                  <button type="button" class="button bg-theme-1 text-white mt-5" @click="editContrat()" style="background-color: rgb(4, 141, 4);">
                            Modifier
                  </button>
                  <router-link to="/contrats" class="button bg-theme-1 text-white mt-5" style="background-color: rgb(234, 9, 9);">
                            Annuler
                  </router-link>

                </div> 
              </div>
          </div>
    </div>
  </template>
  
<script setup>
  import Header from "../../components/header.vue";
  import { ref,reactive,onMounted } from "vue";
  import router from "./../../../router/index.js"
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import { useRoute } from 'vue-router'

const route = useRoute()

let contrat = ref({
    user_id:"",
    description:"",
    
})


const contratId = ref(route.params.contratId)

const getContrat = async () => {
    let response = await axios.get(`/api/get_contrat/${contratId.value}`)
    contrat.value = response.data
    console.log('Contrat',response.data)
}

  const users = ref({})


const getUsers = () => {
    axios.get('/api/users').then((response) => {
        users.value = response.data
        console.log('users',response.data)
    })
}
  
  const editor = ref(ClassicEditor);
  // const editorData = ref('<p>Content of the editor.</p>');
  const editorConfig = ref({
    // The configuration of the editor.
  });
 
  
  const editContrat = async () => {
  
  
  await axios.post("/api/edit_contrat/" + contrat.value.id, contrat.value).then((response) => {
  
  if(response.data.success){
  
              router.push("/contrats")
  
              console.log('ok')
                toast.fire({
                    icon: "success",
                    title: "contrat modifier avec success",
                });
  
              }
               
            else{
              toast.fire({
                    icon: "error",
                    title: "Remplissez correctement tout les champs",
                });
              console.log('errorr',response.data.message)
              //errors.value = response.data.message
            }   
  
  })
  
  }

  onMounted(() => {
    getUsers()
    getContrat()
})
  </script>