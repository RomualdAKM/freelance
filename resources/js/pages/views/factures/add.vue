<script setup>
import Header from "../../components/header.vue";
import { ref,reactive,onMounted,watch } from "vue";
import router from "./../../../router/index.js"

const items = ref([
  { 
    article: '',
    quantite: '',
    price: '', 
    numberTVA: 0, 
    montantTVA: '',
  }
]);

const currentDate = new Date()

const form = ref({
  
  total: 0,
  totalHT: 0, // Ajoutez une valeur initiale de 0
  totalTVA: 0,
  date_emission: currentDate.toISOString().split("T")[0], 
  date_echeance: '', 
  nom: '',
  iban: '',
  bic: '',
  reference: '',
});

const users = ref({})


const getUsers = () => {
    axios.get('/api/users').then((response) => {
        users.value = response.data
        console.log('users',response.data)
    })
}

const addItem = () => {
  items.value.push({ article: '', quantite: '', price: '', numberTVA: '', montantTVA: '' });
};
const removeItem = (index) => {
  items.value.splice(index, 1);
};

const saveFacture = async () => {
  const dataToSend = {
              form: form.value,
              items: items.value,
            }
            await axios.post('api/create_bill', dataToSend).then((response)=> {
              if(response.data.success){
                console.log('ok')
                toast.fire({
                      icon: "success",
                      title: "Facture enregistré avec succés",
                  });
                 router.push("/factures")
              }else{
                toast.fire({
                      icon: "error",
                      title: "Remplissez correctement tout les champs",
                  });
              }

            })
}

const calculateTotal = () => {
  let total = 0;
  let totalHT = 0;
  let totalTVA = 0;

  for (let item of items.value) {
    item.montantTVA = item.price * item.quantite * item.numberTVA / 100;
    total += item.montantTVA;
    totalHT += item.price * item.quantite;
    totalTVA += item.numberTVA;
  }

  form.value.total = total;
  form.value.totalHT = totalHT;
  form.value.totalTVA = totalTVA;
};

watch(items, () => {
  calculateTotal();
}, { deep: true });

onMounted(() => {
    getUsers()
})

</script>

<template>
     <div>
        <Header />
        <div class="content p-4" >
            <div class="intro-y box lg:mt-5 p-4"> 
                <h2 class="text-lg font-medium truncate mr-5 mb-5 text-center"> AJOUTER UNE FACTURE </h2>
                <form >
                    <div>
                      <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mt-4 mb-12">                 
                         
                       <input
                           type="text"
                           class="input w-full border mt-2"
                           v-model="form.nom"
                           placeholder="nom du beneficiaire..."
                           required
                       />
                       <input
                           type="text"
                           class="input w-full border mt-2"
                           v-model="form.iban"
                           placeholder="iban..."
                           required
                       />
                       <input
                           type="text"
                           class="input w-full border mt-2"
                           v-model="form.bic"
                           placeholder="bic..."
                           required
                       />
                       <input
                           type="text"
                           class="input w-full border mt-2"
                           v-model="form.reference"
                           placeholder="référence..."
                       />
               </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-4 mb-12">                 
                        <select  class="input border mt-2" v-model="form.user_id" required>

                            <option value="" selected>Choisir un agent</option>

                            <option v-for="user in users" :key="user.id" :value="user.id">{{  user.name }} {{  user.first_name }}</option>
                            
                        </select>
                       
                       
                        <input
                            type="date"
                            class="input w-full border mt-2"
                            v-model="form.date_emission"
                            placeholder="date émission..."
                            disabled
                        />
                        <input
                            type="date"
                            class="input w-full border mt-2"
                            v-model="form.date_echeance"
                            placeholder="date échéance..."
                            required
                        />
                    </div>
                    <button type="button" class="btn btn-red-900 bg-green-500 w-full py-3 text-white-500" @click="addItem()">+</button>

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-2 mt-4 mb-12" v-for="(item, index) in items" :key="index">                 
                        
                        
                        <input
                        type="text"
                        class="input w-full border mt-2"
                        v-model="item.article"
                        placeholder="description..."
                        required
                        />
                        <input
                        type="text"
                        class="input w-full border mt-2"
                        v-model="item.quantite"
                        placeholder="quantité..."
                        required
                        />
                        <input
                        type="number"
                        class="input w-full border mt-2"
                        v-model="item.price"
                        placeholder="prix..."
                        required
                        />
                        <select  class="input border mt-2" v-model="item.numberTVA" required>
                            <option value="0">0</option>
                            <option value="18">18 </option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>

                        <button type="button"  class="button text-center text-white ml-12 mt-2" @click="removeItem(index)"> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                     </button>
                    </div>
                           
                    <!-- <button type="button" class="button bg-theme-1 text-white mt-5" @click="saveDossier()">
                        Valider
                    </button> -->

                </div>
                </form>
                <table class="table equal-space">
                     
                     <tbody class="flex justify-between">  
                       <tr> 
                         
                         <td class="text-xs !font-extrabold dark:text-white" colspan="2">TotalHT :</td>
                         <td class="text-xs !font-extrabold dark:text-white text-end">{{ form.totalHT }} €</td>
                       </tr>                
                       <tr> 
                         
                         <td class="text-xs !font-extrabold dark:text-white" colspan="2">  TotalTVA :</td>
                         <td class="text-xs !font-extrabold dark:text-white text-end">{{ form.total }} €</td>
                       </tr>
                       <tr> 
                         
                         <td class="text-xs !font-extrabold dark:text-white" colspan="2">  TotalTTC :</td>
                         <td class="text-xs !font-extrabold dark:text-white text-end">{{  form.totalHT + (form.totalTVA*form.totalHT)/100 }} €</td>

                       </tr>
                      
                     </tbody>
                </table>

               
                   <div class="flex justify-between">
                    <button class="btn btn-primary border-4 p-1 mt-2 bg-green-500 text-white text-xs flex gap-2 items-center"  @click.prevent="saveFacture()"
                     type="button" style="background-color: rgb(4, 141, 4);">
                     Enregistrer
                    </button>
                    <router-link to="/factures" class="button bg-theme-1 text-white mt-5" style="background-color: rgb(234, 9, 9);">
                            Annuler
                   </router-link>
                </div>
            </div>
        </div>
    </div>
</template>