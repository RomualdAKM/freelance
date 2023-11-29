<script setup>
import { reactive } from 'vue';
import router from "./../../../router/index.js"


let form = reactive({
    name: "",
    first_name: "",
    phone: "",
    email: "",
    adress: "",
    code: "",
    picture: "",
    kbis: "",
    carte_identite: "",
    // password: "",
    // c_password: "",
});

const register = async () => {

    const formData = new FormData();

    // Ajoutez les autres champs au formulaire
    formData.append("name", form.name);
    formData.append("first_name", form.first_name);
    formData.append("phone", form.phone);
    formData.append("email", form.email);
    formData.append("adress", form.adress);
    formData.append("code", form.code);
    // formData.append("password", form.password);
    // formData.append("c_password", form.c_password);

    if (form.picture) {
        formData.append("picture", form.picture);
    }
    if (form.kbis) {
        formData.append("kbis", form.kbis);
    }
    if (form.carte_identite) {
        formData.append("carte_identite", form.carte_identite);
    }
    await axios.post("/api/register", formData).then((response) => {
        if (response.data.success) {
            localStorage.setItem("token", response.data.data.token);
            router.push("/login");
            toast.fire({
            icon: "success",
            title: "consultez votre email",
        });

        } else {
          console.log('error',response.data.message)
           toast.fire({
            icon: "error",
            title: "!!!! Remplissez tout les champs et assurez vous que les passwords correspondent",
        });
        }
    });
};

const changePhoto = (e) => {
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
const changeKbis = (e) => {
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
   
    form.kbis = file;
}
const changeCarte = (e) => {
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
   
    form.carte_identite = file;
}

</script>

<template>
    <div class="login" >
        <div class="container sm:px-10" >
            <div class="block xl:grid grid-cols-2 gap-1" >
                <!-- BEGIN: Register Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="#" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/FRE2E_COMPANY.jpg">
                        <span class="text-white text-lg ml-3"> FR2E COMPANY </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="/dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Quelques clics  
                            <br>
                            pour créer votre compte.
                        </div>
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0" >
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto" >
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Créer un compte
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <form @submit.prevent="register()">

                            <div class="intro-x mt-8">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-4">
                                  
                                    <!-- <label for="">Nom</label> -->
                                    <input type="text" v-model="form.name" class="intro-x   input border border-gray-300 block" placeholder="Nom">
                               
                                    <!-- <label for="">Prénom</label> -->
                                    <input type="text" v-model="form.first_name" class="intro-x  input border border-gray-300 block" placeholder="Prenom">
                               
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-4">
                                
                               
                                    <!-- <label for="">Numéro</label> -->
                                    <input type="number" v-model="form.phone" class="intro-x  input input--lg border border-gray-300 block" placeholder="Numéro">
                               
                                    <!-- <label for="">Email</label> -->
                                    <input type="email" v-model="form.email" class="intro-x  input input--lg border border-gray-300 block" placeholder="Email">
                               
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-4">

                                
                                    <!-- <label for="">Adresse</label> -->
                                    <input type="text" v-model="form.adress" class="intro-x  input input--lg border border-gray-300 block" placeholder="Adresse">
                                
                                    <!-- <label for="">Code Parrain</label> -->
                                    <input type="text" v-model="form.code" class="intro-x  input input--lg border border-gray-300 block" placeholder="Code Parrain">
                               
                            </div>
                            <div class="flex bg-white items-center justify-center w-full mt-4">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez la photo</span></p>
                                       
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" @change="changePhoto"/>
                                </label>
                            </div> 
                            <div class="flex bg-white items-center justify-center w-full mt-4">
                                <label for="dropzone-kbis" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez KBIS</span></p>
                                       
                                    </div>
                                    <input id="dropzone-kbis" type="file" class="hidden" @change="changeKbis"/>
                                </label>
                            </div> 
                            <div class="flex bg-white items-center justify-center w-full mt-4">
                                <label for="dropzone-carte" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Choisissez la Carte D'Identité</span></p>
                                       
                                    </div>
                                    <input id="dropzone-carte" type="file" class="hidden" @change="changeCarte"/>
                                </label>
                            </div>
                               
                            </div>

                            <div class="intro-x mt-5 mb-4 flex justify-between xl:mt-8 text-center xl:text-left">
                                <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top" style="background-color: #08cf3a">Inscription</button>
                                <router-link to="/login" class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Connexion</router-link>
                            </div>
                        </form>
                       
                    </div>
                </div>
                <!-- END: Register Form -->
            </div>
        </div>
    </div>
</template>