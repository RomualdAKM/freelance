<script setup>
import Header from "../../components/header.vue";
import router from "./../../../router/index.js"
import { ref,onMounted } from 'vue'

const formations = ref({})

const getFormations = () => {
    axios.get('/api/get_formations').then((response) => {
        formations.value = response.data
        console.log('formation',response.data)
    })
}

const user = ref({})

const getAuthUser = () => {
    axios.get('/api/info_auth_user').then((response) => {
        user.value = response.data
        console.log('user',response.data)
    })
}

const deleteFormation =  (formationId) => {
  Swal.fire({
        title: "Are you sure ?",
        text: "You can't go back",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it !",
    }).then((result) => {
        if (result.value) {
            axios.get("/api/delete_formation/" + formationId).then(() => {
                Swal.fire("Delete", "Question delete successfully", "success");
                //getCustomers(pagination.value.currentPage);
                getFormations()
            });
        }
    });
}
const shortenedDescription = (description) => {
    const words = description.split(' ');
    const shortened = words.slice(0, 2).join(' ');
    return `${shortened} ...`;
};

onMounted(() => {
    getFormations()
    getAuthUser()
})
</script>

<template>
     <div>
        <Header />
            <div  class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto mt-12">
                    Formations
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0" v-if="user.role == 'admin'">
                    <router-link to="/add-formation" class="button text-white bg-theme-1 shadow-md mr-2" style="background-color: rgb(4, 141, 4);">Ajouter Nouvelle Formation</router-link>
                   
                </div>
            </div>
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <!-- BEGIN: Blog Layout -->
                <div class="intro-y blog col-span-12 md:col-span-6 box"  v-for="formation in formations" :key="formation.id" >
                    <div class="blog__preview image-fit" >
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" :src="'/picture/'+formation.picture">
                        <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                           
                            <div class="dropdown ml-3  bg-white rounded-full"  v-if="user.role == 'admin'">
                                <a href="#" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                <div class="dropdown-box w-40">
                                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                        <router-link :to="{name: 'editFormation',params:{formationId:formation.id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Modifier  </router-link>
                                        <button type="button" @click="deleteFormation(formation.id)" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-red-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Supprimer  </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10">  <router-link :to="{name: 'showFormation',params:{formationId:formation.id}}" class="block font-medium text-xl mt-3">{{ formation.title }}</router-link> </div>
                    </div>
                    <div class="p-5 text-gray-700 dark:text-gray-600" v-html="shortenedDescription(formation.description)"></div>
                   
                    <div class="px-5 pt-3 pb-5 border-t border-gray-200 dark:border-dark-5">
                        <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                            <div class="mr-2"> Date de publication: <span class="font-medium">{{ formation.created_at }}</span> </div>
                           
                        </div>
                     
                    </div>
                </div>
              
                <!-- END: Blog Layout -->
            </div>
            <!-- BEGIN: Pagiantion -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-5">
                <!-- <ul class="pagination">
                    <li>
                        <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                    </li>
                    <li>
                        <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                    </li>
                    <li> <a class="pagination__link" href="#">...</a> </li>
                    <li> <a class="pagination__link" href="#">1</a> </li>
                    <li> <a class="pagination__link pagination__link--active" href="#">2</a> </li>
                    <li> <a class="pagination__link" href="#">3</a> </li>
                    <li> <a class="pagination__link" href="#">...</a> </li>
                    <li>
                        <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                    </li>
                    <li>
                        <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                    </li>
                </ul> -->
                <!-- <select class="w-20 input box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select> -->
            </div>
            <!-- END: Pagiantion -->
            </div>
    </div>


</template>