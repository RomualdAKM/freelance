<script setup>
import Header from "../../components/header.vue";
import { ref,reactive,onMounted } from "vue";
import router from "./../../../router/index.js"

import { useRoute } from 'vue-router'

const route = useRoute()

let contrat = ref([])

const contratId = ref(route.params.contratId)

const getContrat = async () => {
    let response = await axios.get(`/api/get_contrat/${contratId.value}`)
    contrat.value = response.data
    console.log('Contrat',response.data)
}
onMounted( async () => {
    getContrat()
})

</script>

<template>
    <div>
        <Header />
        <div class="content">
            <div class="intro-y news p-5 box mt-24">
                <!-- BEGIN: Blog Layout -->
                <!-- <h2 class="intro-y font-medium text-xl sm:text-2xl">
                    {{ formation.title }}
                </h2>
                <div class="intro-y text-gray-700 dark:text-gray-600 mt-3 text-xs sm:text-sm"> {{ formation.created_at }} <span class="mx-1">•</span> </div>
                <div class="intro-y mt-6">
                    <div class="news__preview image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" :src="'/picture/'+formation.picture">
                    </div>
                </div> -->
               
                <div class="intro-y text-justify leading-relaxed mt-12">
                    <p class="mb-5" v-html="contrat.description"></p>
                </div>
              
                <!-- BEGIN: Comments -->
               
                <div class="intro-y mt-5 pb-10">
                   
                    <div class="mt-5 pt-5 border-t border-gray-200 dark:border-dark-5">
                        <div class="flex">
                            
                            <div class="ml-3 flex-1">
                                <div class="flex items-center"> <a href="#" class="font-medium">Merci pour la Lecture</a>  </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- END: Comments -->
            </div>
        </div>
    </div>
    
</template>