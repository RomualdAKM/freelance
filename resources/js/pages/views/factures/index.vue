<script setup>
import Header from "../../components/header.vue";
import router from "./../../../router/index.js"
import { ref,onMounted } from 'vue'

const bills = ref({})



const getBills = async () => {
  await  axios.get('/api/get_bills').then((response) => {
        bills.value = response.data
        console.log('bills',response.data)
    })
}


const sendFacture = async (idFacture) => {
    await axios
        .post("/api/send_facture", {
            id_Facture: idFacture,
        })
        .then((response) => {
            console.log("ok");
            toast.fire({
                icon: "success",
                title: "Facture envoyer avec succé",
            });
        });
};


const telechagerFacture = async (id) => {
    await axios
        .post(
            "/api/download_facture",
            { id: id },
            { responseType: "arraybuffer" }
        )
        .then((response) => {
            const blob = new Blob([response.data], { type: "application/pdf" });
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "invoice.pdf";
            link.click();
        })
        .catch((error) => {
            console.error(error);
        });
};


const deleteFacture = (factureId) => {
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
            axios.get("/api/delete_facture/" + factureId).then(() => {
                Swal.fire("Delete", "facutre delete successfully", "success");
                getBills();
            });
        }
    });
};

onMounted(() => {
    getBills()
})

</script>

<template>
     <div>
    <Header />
        <div  class="content">
            <!-- END: Top Bar -->
            <h2 class="intro-y text-lg font-medium mt-10">
                       Liste des Factures
            </h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                       <div class="intro-y col-span-12 flex justify-between flex-wrap sm:flex-no-wrap items-center mt-2">
                           <router-link to="/add-facture" class="button text-white bg-theme-1 shadow-md mr-2" style="background-color: rgb(4, 141, 4);">Nouvelle Facture</router-link>
                          
                           <!-- <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div> -->
                           <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                               <div class="w-56 relative text-gray-700 dark:text-gray-300">
                                   <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                                   <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
                               </div>
                           </div>
                       </div>
                       <!-- BEGIN: Data List -->
                       <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                           <table class="table table-report -mt-2">
                               <thead>
                                   <tr>
                                       
                                       <th class="whitespace-no-wrap">NUMERO</th>
                                       <th class="text-center whitespace-no-wrap">DATE ECHEANCE</th>
                                       <th class="text-center whitespace-no-wrap">DATE EMISSION</th>
                                       <th class="text-center whitespace-no-wrap">AGENT</th>
                                       <th class="text-center whitespace-no-wrap">TotalHT</th>
                                       <th class="text-center whitespace-no-wrap">ACTIONS</th>

                                   </tr>
                               </thead>
                               <tbody>
                                   <tr class="intro-x" v-for="bill in bills" :key="bill.id">
                                      
                                       <td>
                                           <a href="#" class="font-medium whitespace-no-wrap">{{ bill.id }}</a> 
                                           
                                       </td>
                                       <td class="text-center">{{ bill.date_echeance }}</td>
                                       <td class="text-center">{{ bill.date_emission }}</td>
                                       <td class="text-center">{{ bill.user.name }} {{ bill.user.first_name }}</td>
                                       <td class="text-center">{{ bill.totalHT }} €</td>
                                       <!-- <td class="w-40">
                                           <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ dossier.status }} </div>
                                       </td> -->
                                       <td class="table-report__action w-56">

                                           <div class="flex justify-between items-center">

                                               <!-- <router-link :to="{name: 'editDossier',params:{dossierId:dossier.id}}" class="flex items-center mr-3" > <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Modifier </router-link> -->

                                              
                                                            
                                               <button type="button"  @click="telechagerFacture(bill.id)" 
                                                class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                </button>
                                               <button type="button"   @click="sendFacture(bill.id)"
                                                 class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                                </button>
                                               <button type="button" @click="deleteFacture(bill.id)"  class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </button>
                                           
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
           
            <!-- END: Delete Confirmation Modal -->
        </div>
    </div>
</template>