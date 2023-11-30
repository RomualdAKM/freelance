<script setup>
import Header from "../../components/header.vue";
import { ref,reactive,onMounted } from "vue";
import router from "./../../../router/index.js"

import { useRoute } from 'vue-router'

const route = useRoute()

const dossierId = ref(route.params.dossierId)

let dossier = ref({

    name:"",
    adress:"",
    amount_quote:"",
    status:"",
    date_bill:"",

})

const getDossier = async () => {
    let response = await axios.get(`/api/get_document/${dossierId.value}`)
    dossier.value = response.data
    console.log('dossier',response.data)
}

const editDossier = async () => {

await axios.post("/api/edit_document/" + dossier.value.id, dossier.value)
.then((response) => {
    if(response.data.success){
        router.push("/dossiers")
        toast.fire({
        icon: "success",
        title: "dossier Modifier avec success",
    })
    }else{
           toast.fire({
                  icon: "error",
                  title: "Remplissez Correctement tout les champs",
                });
                console.log('errorr',response.data.message)
            }
        })
        
    }

    onMounted( async () => {
        getDossier()
    })
</script>

<template>
     <div>
        <Header />
        <div class="content p-4" >
            <div class="intro-y box lg:mt-5 p-4">
                <form >
                    <div >
    
                        <label>Intitulé Dossier</label>
                        <input
                            type="text"
                            class="input w-full border mt-2"
                            v-model="dossier.name"
                            placeholder="dossier..."
                        />
                        <label>Adresse</label>
                        <input
                            type="text"
                            class="input w-full border mt-2"
                            v-model="dossier.adress"
                           
                        />
                        <label>Montant Devis</label>
                        <input
                            type="text"
                            class="input w-full border mt-2"
                            v-model="dossier.amount_quote"
                           
                        />
                        <label>Date Facturation</label>
                       
                        <input
                            type="date"
                            class="input w-full border mt-2"
                            v-model="dossier.date_bill"
                            
                        />
                        <label>Status</label>

                        <select class="input w-full border mt-2" v-model="dossier.status">
                            <option value="En traitement">En traitement</option>
                            <option value="En Attente Audit">En Attente Audit</option>
                            <option value="Audit Realiser">Audit Réaliser</option>
                            <option value="Attente Cofrac">Attente Cofrac</option>
                            <option value="Signature de Devis">Signature de Devisn</option>
                            <option value="Installation">Installation</option>
                            <option value="Facturation">Facturation</option>
                        </select>
                    </div>
                        <div class="flex justify-between">

                            <button type="button" class="button bg-theme-1 text-white mt-5" @click="editDossier()" style="background-color: rgb(4, 141, 4);">
                                Valider
                            </button>
                            <router-link to="/contrats" class="button bg-theme-1 text-white mt-5" style="background-color: rgb(234, 9, 9);">
                                    Annuler
                          </router-link>
                        </div>
                </form>

            </div>
        </div>
    </div>
</template>