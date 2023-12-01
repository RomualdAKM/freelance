<script setup>
import Header from "../../components/header.vue";
import { ref,reactive,onMounted } from "vue";
import router from "./../../../router/index.js"

import { useRoute } from 'vue-router'

const route = useRoute()

const dossierId = ref(route.params.dossierId)

const dossier =  ref({})
const user = ref({});

const getAuthUser = async () => {
    await axios.get("/api/info_auth_user").then((response) => {
        user.value = response.data;
        console.log("user", response.data);
    });
};
const getDossier = async () => {
    let response = await axios.get(`/api/get_document/${dossierId.value}`)
    dossier.value = response.data
    console.log('dossier',response.data)
}

onMounted( async () => {
        getDossier()
        getAuthUser()
})

</script>

<template>
    <div>
        <Header />
        <div class="content p-4 " >
            <div class="intro-y box lg:mt-5 p-4 ">

                <router-link v-if="user.role == 'admin'" to="/all-dossiers" class="button text-white bg-theme-1 shadow-md mr-2 mb-12" style="background-color: rgb(4, 141, 4);">RETOUR</router-link>
                          
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">

                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO FACADE 1</h2>
                        <iframe :src="'/maisons/' + dossier.photo_maison1" width="100%" height="400px"></iframe>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO FACADE 2</h2>
                        <iframe :src="'/maisons/' + dossier.photo_maison2" width="100%" height="400px"></iframe>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO FACADE 3</h2>
                        <iframe :src="'/maisons/' + dossier.photo_maison3" width="100%" height="400px"></iframe>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO FACADE 4</h2>
                        <iframe :src="'/maisons/' + dossier.photo_maison4" width="100%" height="400px"></iframe>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">

                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO COMBRE 1</h2>
                        <iframe :src="'/combles/' + dossier.photo_comble1" width="100%" height="400px"></iframe>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO COMBRE 2</h2>
                        <iframe :src="'/combles/' + dossier.photo_comble2" width="100%" height="400px"></iframe>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO SOUS SOL 1</h2>
                        <iframe :src="'/sous_sol/' + dossier.photo_sous_sol1" width="100%" height="400px"></iframe>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO SOUS SOL 2</h2>
                        <iframe :src="'/sous_sol/' + dossier.photo_sous_sol2" width="100%" height="400px"></iframe>
                    </div>
                    
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">

                    <div>
                        <h2 class="text-lg font-medium truncate">PHOTO IMPOT</h2>
                        <iframe :src="'/avis_imposition/' + dossier.photo_impot" width="100%" height="400px"></iframe>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium truncate">DPE</h2>
                        <iframe :src="'/dpe/' + dossier.dpe" width="100%" height="400px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>