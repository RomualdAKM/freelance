<script setup>
  import Header from "../../components/header.vue";
  import { ref,reactive,onMounted } from "vue";
  import router from "./../../../router/index.js"

</script>

<template>
     <div>
          <Header />
          <div class="content p-4" >
              <div class="intro-y box lg:mt-5 p-4">
                <img src="/mlm.jpg" alt=""  class="rounded-md">
              </div>
           </div>
     </div>
</template>