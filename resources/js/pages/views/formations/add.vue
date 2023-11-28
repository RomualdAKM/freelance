<template>
  <div>
        <Header />
        <div class="content p-24" >
            <div class="intro-y box lg:mt-5 p-12">
              <h1>Ajouter une Formation</h1>
                        <input
                            type="text"
                            class="input w-full border mt-3"
                            v-model="form.title"
                            placeholder="Titre Formation"
                        />
                        <div class="flex items-center justify-center mt-6 mb-4">
                        <label for="dropzone-changePhoto1" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Image Formation</span></p>
                               
                            </div>
                            <input id="dropzone-changePhoto1" type="file" class="hidden" @change="changePhoto1"/>
                        </label>
                    </div> 
              <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
              <div class="flex justify-between">
                <button type="button" class="button bg-theme-1 text-white mt-5" @click="saveFormation()" style="background-color: rgb(4, 141, 4);">
                          Valider
                </button>

                <router-link to="/formations" class="button bg-theme-1 text-white mt-5" style="background-color: rgb(234, 9, 9);">
                            Annuler
                </router-link>

              </div>
            </div>
        </div>
  </div>
</template>

<script setup>
import Header from "../../components/header.vue";
import { ref,reactive } from "vue";
import router from "./../../../router/index.js"
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


let form = reactive({
    title:"",
    description:"",
    picture:"",
})

const editor = ref(ClassicEditor);
// const editorData = ref('<p>Content of the editor.</p>');
const editorConfig = ref({
  // The configuration of the editor.
});
const changePhoto1 = (e) => {
    const file = e.target.files[0];
    const limit = 4024 * 4024 * 7; // Limite de taille en octets (7 Mo dans cet exemple)

    if (file.size > limit) {
        swal({
            icon: "error",
            title: "Ooops...",
            text: "Vous téléchargez un fichier trop volumineux.",
        });
        return false;
    }
   
    form.picture = file;
}

const saveFormation = async () => {

const formData = new FormData();

// Ajoutez les autres champs au formulaire
formData.append("title", form.title);
formData.append("description", form.description);

if (form.picture) {
    formData.append("picture", form.picture);
}



await axios.post('/api/create_formation', formData).then((response) => {

if(response.data.success){

            router.push("/formations")

            console.log('ok')
              toast.fire({
                  icon: "success",
                  title: "formation enregistré avec success",
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
</script>