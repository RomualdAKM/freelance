<script setup>
import Header from "../../components/header.vue";
import { ref,reactive } from "vue";
import router from "./../../../router/index.js"

let form = reactive({
    name:"",
    adress:"",
})

const saveDossier = async () => {
  await axios.post('/api/create_document',form).then((response) => {

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
        <div class="content p-24" >
            <div class="intro-y box lg:mt-5 p-12">
                <form >
                    <div >
    
                        <label>Intitulé Dossier</label>
                        <input
                            type="text"
                            class="input w-full border mt-2"
                            v-model="form.name"
                            placeholder="dossier..."
                        />
                        <label>Adresse</label>
                        <input
                            type="text"
                            class="input w-full border mt-2"
                            v-model="form.adress"
                            placeholder="adresse..."
                        />
                    </div>
                           
                    <button type="button" class="button bg-theme-1 text-white mt-5" @click="saveDossier()" style="background-color: rgb(4, 141, 4);">
                        Valider
                    </button>
                </form>

            </div>
        </div>
    </div>
</template>
