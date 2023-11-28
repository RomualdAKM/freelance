<script setup>
import Header from "../../components/header.vue";
import router from "./../../../router/index.js"
import { ref,onMounted } from 'vue'

const contrats = ref({})
const allcontrats = ref({})
// let search = ref('')
const user = ref({})

const getContrats = () => {
    axios.get('/api/get_contrats').then((response) => {
        contrats.value = response.data
        console.log('contrats',response.data)
    })
}
const getAllContrats = () => {
    axios.get('/api/get_all_contrats').then((response) => {
        allcontrats.value = response.data
        console.log('allcontrats',response.data)
    })
}

const getAuthUser = () => {
    axios.get('/api/info_auth_user').then((response) => {
        user.value = response.data
        console.log('user',response.data)
    })
}

const deleteContrat =  (contratId) => {
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
            axios.get("/api/delete_contrat/" + contratId).then(() => {
                Swal.fire("Delete", "contrat delete successfully", "success");
                //getCustomers(pagination.value.currentPage);
                getAllContrats()
            });
        }
    });
}

const shortenedDescription = (description) => {
    const words = description.split(' ');
    const shortened = words.slice(0, 2).join(' ');
    return `${shortened} ...`;
}

onMounted(() => {
    getContrats()
    getAuthUser()
    getAllContrats()
})

</script>

<template>
    <div>
    <Header />
        <div  class="content">
            <!-- END: Top Bar -->
            <h2 class="intro-y text-lg font-medium mt-10">
                       Liste de tout vos contrats
            </h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                       <div class="intro-y col-span-12 flex justify-between flex-wrap sm:flex-no-wrap items-center mt-2">

                           <router-link to="/add-contrat" class="button text-white bg-theme-1 shadow-md mr-2" style="background-color: rgb(4, 141, 4);" v-if="user.role == 'admin'">Nouveau Contrat</router-link>
                          
                           <!-- <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div> -->
                           <!-- <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                               <div class="w-56 relative text-gray-700 dark:text-gray-300">
                                   <input type="text" v-model="search" @change="getCustomers()" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                                   <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
                               </div>
                           </div> -->
                       </div>
                       <!-- BEGIN: Data List -->
                       <div class="intro-y col-span-12 overflow-auto lg:overflow-visible" v-if="user.role == 'user'">
                           <table class="table table-report -mt-2">
                               <thead>
                                   <tr>
                                       
                                       <th class="whitespace-no-wrap">DATE</th>
                                       <th class="text-center whitespace-no-wrap">DESCRIPTION</th>
                                       <!-- <th class="text-center whitespace-no-wrap">Email</th>
                                       <th class="text-center whitespace-no-wrap">Tel</th> -->
                                       <th class="text-center whitespace-no-wrap">ACTIONS</th>

                                   </tr>
                               </thead>
                               <tbody>
                                   <tr class="intro-x" v-for="contrat in contrats" :key="contrat.id">
                                      
                                       <td>
                                           <a href="#" class="font-medium whitespace-no-wrap">{{ contrat.created_at }}</a> 
                                           
                                       </td>
                                       <td class="text-center" v-html="shortenedDescription(contrat.description)"></td>
                                      
                                       <!-- <td class="w-40">
                                           <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ dossier.status }} </div>
                                       </td> -->
                                       <td class="table-report__action w-56">

                                           <div class="flex justify-center items-center">

                                               <router-link :to="{name: 'showContrat',params:{contratId:contrat.id}}" class="flex items-center mr-3" > <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Voir </router-link>

                                               <!-- <button type="button" @click="deleteContrat(contrat.id)" class="flex items-center text-theme-6"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Supprimer </button> -->

                                            </div>

                                       </td>
                                   </tr>
                                  
                               </tbody>
                           </table>
                       </div>

                       <div class="intro-y col-span-12 overflow-auto lg:overflow-visible" v-if="user.role == 'admin'">
                           <table class="table table-report -mt-2">
                               <thead>
                                   <tr>
                                       
                                       <th class="whitespace-no-wrap" style="color: green;">DATE</th>
                                       <th class="text-center whitespace-no-wrap" style="color: green;">DESCRIPTION</th>
                                       <!-- <th class="text-center whitespace-no-wrap">Email</th>
                                       <th class="text-center whitespace-no-wrap">Tel</th> -->
                                       <th class="text-center whitespace-no-wrap" style="color: green;">ACTIONS</th>

                                   </tr>
                               </thead>
                               <tbody>
                                   <tr class="intro-x" v-for="contrat in allcontrats" :key="contrat.id">
                                      
                                       <td>
                                           <a href="#" class="font-medium whitespace-no-wrap">{{ contrat.created_at }}</a> 
                                           
                                       </td>
                                       <td class="text-center" v-html="shortenedDescription(contrat.description)"></td>
                                      
                                       <!-- <td class="w-40">
                                           <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ dossier.status }} </div>
                                       </td> -->
                                       <td class="table-report__action w-56">

                                           <div class="flex justify-center items-center">

                                               <router-link :to="{name: 'showContrat',params:{contratId:contrat.id}}" class="flex items-center mr-3" > <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Voir </router-link>

                                               <router-link :to="{name: 'editContrat',params:{contratId:contrat.id}}" class="flex items-center mr-3" style="color: green;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Modifier </router-link>

                                               <button type="button" @click="deleteContrat(contrat.id)" class="flex items-center text-theme-6"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Supprimer </button>

                                               <!-- <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            -->
                                            </div>

                                       </td>
                                   </tr>
                                  
                               </tbody>
                           </table>
                       </div>
                       <!-- END: Data List -->
                       <!-- BEGIN: Pagination -->
                       <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
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
                       <!-- END: Pagination -->
            </div>
            <!-- BEGIN: Delete Confirmation Modal -->
            <div class="modal" id="delete-confirmation-modal">
                       <div class="modal__content">
                           <div class="p-5 text-center">
                               <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                               <div class="text-3xl mt-5">Are you sure?</div>
                               <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                           </div>
                           <div class="px-5 pb-8 text-center">
                               <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                               <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
                           </div>
                       </div>
            </div>
            <!-- END: Delete Confirmation Modal -->
        </div>
    </div>
</template>
