<script setup>
import Header from "../../components/header.vue";
import router from "./../../../router/index.js"

import { ref,reactive } from "vue";

let form = reactive({
    password:"",
    c_password:"",
})
const changePassword = async () => {
  await axios.post('/api/change_password',form).then((response) => {

    if(response.data.success){

                router.push("/reset-password")

                console.log('ok')
                  toast.fire({
                      icon: "success",
                      title: "mot de passe changé avec success",
                  });

                }
                 
              else{
                toast.fire({
                      icon: "error",
                      title: "Remplissez correctement tout les champs",
                  });
                console.log('errorr',response.data.message)
                // errors.value = response.data.message
              }   
   
  })

}
</script>

<template>
    <div>
        <Header />
        <!-- BEGIN: Content -->
        <div class="content p-4">
            

                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Profile Menu -->
                    <!-- <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-5">
                                <div class="w-12 h-12 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-base">Angelina Jolie</div>
                                    <div class="text-gray-600">Backend Engineer</div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700 dark:text-gray-300"></i> </a>
                                    <div class="dropdown-box w-56">
                                        <div class="dropdown-box__content box dark:bg-dark-1">
                                            <div class="p-4 border-b border-gray-200 dark:border-dark-5 font-medium">Export Options</div>
                                            <div class="p-2">
                                                <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> English </a>
                                                <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <i data-feather="box" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Indonesia 
                                                    <div class="text-xs text-white px-1 rounded-full bg-theme-6 ml-auto">10</div>
                                                </a>
                                                <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="layout" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> English </a>
                                                <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="sidebar" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Indonesia </a>
                                            </div>
                                            <div class="px-3 py-3 border-t border-gray-200 dark:border-dark-5 font-medium flex">
                                                <button type="button" class="button button--sm bg-theme-1 text-white">Settings</button>
                                                <button type="button" class="button button--sm bg-gray-200 text-gray-600 dark:bg-dark-5 dark:text-gray-300 ml-auto">View Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href="#"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                                <a class="flex items-center mt-5" href="#"> <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings </a>
                                <a class="flex items-center mt-5" href="#"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                <a class="flex items-center mt-5" href="#"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings </a>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <a class="flex items-center" href="#"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Email Settings </a>
                                <a class="flex items-center mt-5" href="#"> <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards </a>
                                <a class="flex items-center mt-5" href="#"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks </a>
                                <a class="flex items-center mt-5" href="#"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Tax Information </a>
                            </div>
                            <div class="p-5 border-t flex dark:border-dark-5">
                                <button type="button" class="button button--sm block bg-theme-1 text-white">New Group</button>
                                <button type="button" class="button button--sm border text-gray-700 dark:bg-dark-5 dark:text-gray-300 ml-auto">New Quick Link</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- END: Profile Menu -->
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                        <!-- BEGIN: Change Password -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Change Mot de Passe
                                </h2>
                            </div>
                            <div class="p-5">
                               
                                <div class="mt-3">
                                    <label>Nouveau Mot de Passe</label>
                                    <input v-model="form.password" type="password" class="input w-full border mt-2">
                                </div>

                                <div class="mt-3">
                                    <label>Confirmé Nouveau Mot de Passe</label>
                                    <input v-model="form.c_password" type="password" class="input w-full border mt-2">
                                </div>

                                <button type="button" class="button bg-theme-1 text-white mt-4" @click="changePassword()">Change Password</button>

                            </div>
                        </div>
                        <!-- END: Change Password -->
                    </div>
                </div>
        </div>
        <!-- END: Content -->
    </div>
</template>