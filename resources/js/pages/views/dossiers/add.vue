<script setup>
import Header from "../../components/header.vue";
import { ref,reactive } from "vue";
import router from "./../../../router/index.js"

let form = reactive({
    name:"",
    first_name:"",
    adress:"",
    phone:"",
    email:"",
    dpe:"",
    photo_impot:"",
    photo_maison1:"",
    photo_maison2:"",
    photo_maison3:"",
    photo_maison4:"",
    photo_comble1:"",
    photo_comble2:"",
    photo_sous_sol1:"",
    photo_sous_sol2:"",
})

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
   
    form.photo_maison1 = file;
}
const changePhoto2 = (e) => {
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
   
    form.photo_maison2 = file;
}
const changePhoto3 = (e) => {
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
   
    form.photo_maison3 = file;
}
const changePhoto4 = (e) => {
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
   
    form.photo_maison4 = file;
}
const changeComble1 = (e) => {
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
   
    form.photo_comble1 = file;
}
const changeComble2 = (e) => {
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
   
    form.photo_comble2 = file;
}

const changesousol1 = (e) => {
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
   
    form.photo_sous_sol1 = file;
}
const changesousol2 = (e) => {
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
   
    form.photo_sous_sol2 = file;
}

const changeDpe = (e) => {
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
   
    form.dpe = file;
}
const changeAvis = (e) => {
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
   
    form.photo_impot = file;
}

const saveDossier = async () => {

    const formData = new FormData();

        // Ajoutez les autres champs au formulaire
        formData.append("name", form.name);
        formData.append("first_name", form.first_name);
        formData.append("phone", form.phone);
        formData.append("email", form.email);
        formData.append("adress", form.adress);

        if (form.photo_impot) {
            formData.append("photo_impot", form.photo_impot);
        }
        if (form.dpe) {
            formData.append("dpe", form.dpe);
        }
        if (form.photo_maison1) {
            formData.append("photo_maison1", form.photo_maison1);
        }
        if (form.photo_maison2) {
            formData.append("photo_maison2", form.photo_maison2);
        }
        if (form.photo_maison3) {
            formData.append("photo_maison3", form.photo_maison3);
        }
        if (form.photo_maison4) {
            formData.append("photo_maison4", form.photo_maison4);
        }
        if (form.photo_comble1) {
            formData.append("photo_comble1", form.photo_comble1);
        }
        if (form.photo_comble2) {
            formData.append("photo_comble2", form.photo_comble2);
        }
      
        if (form.photo_sous_sol1) {
            formData.append("photo_sous_sol1", form.photo_sous_sol1);
        }
        if (form.photo_sous_sol2) {
            formData.append("photo_sous_sol2", form.photo_sous_sol2);
        }
      

    await axios.post('/api/create_document',formData).then((response) => {

    if(response.data.success){

                router.push("/dossiers")

                console.log('ok')
                  toast.fire({
                      icon: "success",
                      title: "dossier enregistré avec success",
                  });

                }
                 
              else{
                toast.fire({
                      icon: "error",
                      title: "Remplissez correctement tout les champs",
                  });
                console.log('errorr',response.data.message)
                errors.value = response.data.message
              }   
   
  })

}
</script>

<template>
    <div>
        <Header />
        <div class="content p-4" >
            <div class="intro-y box lg:mt-5 p-4">
                <h3>AJOUTER DOSSIER </h3>
                <form >
                    <div >
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-2 mt-4 mb-12">
                        
                       
                        <input
                            type="text"
                            class="input border mt-2"
                            v-model="form.name"
                            placeholder="nom"
                        />
                       
                        <input
                            type="text"
                            class="input  border mt-2"
                            v-model="form.first_name"
                            placeholder="prenom"
                            required
                        />

                        <input
                            type="text"
                            class="input border mt-2"
                            v-model="form.phone"
                            placeholder="numéro"
                            required
                        />
                        
                        <input
                            type="email"
                            class="input border mt-2"
                            v-model="form.email"
                            placeholder="email"
                            required
                        />
                        <input
                            type="text"
                            class="input border mt-2"
                            v-model="form.adress"
                            placeholder="adresse"
                            required
                        />
                    </div>
                    
                </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mt-4">

                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changePhoto1" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez 1er Facade Maison</span></p>
                               
                            </div>
                            <input id="dropzone-changePhoto1" type="file" class="hidden" @change="changePhoto1" required/>
                        </label>
                    </div> 
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changePhoto2" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez 2éme Facade Maison</span> </p>
                                
                            </div>
                            <input id="dropzone-changePhoto2" type="file" class="hidden" @change="changePhoto2" required/>
                        </label>
                    </div> 
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changePhoto3" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez 3éme Facade Maison</span> </p>
                              
                            </div>
                            <input id="dropzone-changePhoto3" type="file" class="hidden" @change="changePhoto3" required/>
                        </label>
                    </div> 
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changePhoto4" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez 4éme Facade Maison</span> </p>
                              
                            </div>
                            <input id="dropzone-changePhoto4" type="file" class="hidden" @change="changePhoto4" required/>
                        </label>
                    </div> 

                    </div> 
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mt-4">

                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changeComble1" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez  Photo Combles 1</span> </p>
                               
                            </div>
                            <input id="dropzone-changeComble1" type="file" class="hidden" @change="changeComble1" required/>
                        </label>
                    </div> 
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changeComble2" class="flex flex-col items-center justify-center w-full h-24 border-2 border-éme gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez Photo Combles 2</span> </p>
                                
                            </div>
                            <input id="dropzone-changeComble2" type="file" class="hidden" @change="changeComble2" required/>
                        </label>
                    </div> 
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changeComble3" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez Photo Sous Sol 1</span> </p>
                              
                            </div>
                            <input id="dropzone-changeComble3" type="file" class="hidden" @change="changesousol1" required/>
                        </label>
                    </div> 
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changeComble4" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez Photo Sous Sol 2</span> </p>
                              
                            </div>
                            <input id="dropzone-changeComble4" type="file" class="hidden" @change="changesousol2" required/>
                        </label>
                    </div> 

                    </div> 
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-12">
                        <div class="flex items-center justify-center ">
                        <label for="dropzone-changeDpe" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez DPE ou AUDIT</span></p>
                               
                            </div>
                            <input id="dropzone-changeDpe" type="file" class="hidden" @change="changeDpe" required/>
                        </label>
                    </div>
                    <div class="flex items-center justify-center ">
                        <label for="dropzone-changeAvis" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"> Photo Impots </span></p>
                               
                            </div>
                            <input id="dropzone-changeAvis" type="file" class="hidden" @change="changeAvis" required/>
                        </label>
                    </div>
                    </div>
                    <div class="flex justify-between">

                        <button type="button" class="button bg-theme-1 text-white mt-5" @click="saveDossier()" style="background-color: rgb(4, 141, 4);">
                            Valider
                        </button>
                        <router-link to="/dossiers" class="button bg-theme-1 text-white mt-5" style="background-color: rgb(234, 9, 9);">
                            Annuler
                        </router-link>

                    </div>
                </form>

            </div>
        </div>
    </div>
</template>
