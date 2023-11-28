<script setup>
import { ref,onMounted } from 'vue'
import router from "./../../router/index.js"

const user = ref({})

const getAuthUser = async () => {
   await axios.get('/api/info_auth_user').then((response) => {
        user.value = response.data
        console.log('user',response.data)
    })
}

const logout = () => {
    localStorage.removeItem("token");
    router.push("/login");
};

onMounted( async () => {
   await getAuthUser()
    feather.replace()
    
})

</script>

<template>

    <div class="mt-5" >
         <!-- BEGIN: Mobile Menu -->
         <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="#" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/dist/images/logo.svg">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-center"><line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line></svg>
                </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <!-- <li>
                    <a href="index.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li> -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> CLIENT <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/clientss" class="menu__title"> Liste </router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-client" class="menu__title"> Ajouter </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> SUIVI DOSSIER <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/dossiers" class="menu__title"> Liste </router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-dossier" class="menu__title"> Ajouter </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> FORMATION <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/formations" class="menu__title"> Liste </router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-formation" class="menu__title"> Ajouter </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> FACTURATION <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/factures" class="menu__title"> Liste </router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-facture" class="menu__title"> Ajouter </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
               
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="#" class="-intro-x hidden md:flex">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-12 h-12" src="/FRE2E_COMPANY.jpg">
                    <!-- <span class="text-white text-lg ml-3"> <span class="font-medium">FRE2E_COMPANY</span> </span> -->
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb breadcrumb--light mr-auto"> <a href="#" class="" style="color: rgb(10, 10, 10);">Bienvenue chez</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" class="breadcrumb--active" style="color: rgb(10, 10, 10);">FRE2E_COMPANY</a> </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <!-- <div class="search hidden sm:block">
                        <input type="text" class="search__input input dark:bg-dark-1 placeholder-theme-13" placeholder="Search...">
                        <i data-feather="search" class="search__icon dark:text-gray-300"></i> 
                    </div> -->
                    <a class="notification notification--light sm:hidden" href="#"> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="#" class="flex items-center">
                                    <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-9.jpg">
                                    </div>
                                    <div class="ml-3">Johnny Depp</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">johnnydepp@left4code.com</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-5.jpg">
                                    </div>
                                    <div class="ml-3">Robert De Niro</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">robertdeniro@left4code.com</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                    </div>
                                    <div class="ml-3">Hugh Jackman</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">hughjackman@left4code.com</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                    </div>
                                    <div class="ml-3">Denzel Washington</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-8.jpg">
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                            </a>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Nikon Z6</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                            </a>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-10.jpg">
                                </div>
                                <div class="ml-3">Oppo Find X2 Pro</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                            </a>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Sony Master Series A9G</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <!-- <div class="intro-x dropdown mr-4 sm:mr-6">
                    <div class="dropdown-toggle notification notification--light notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                    <div class="notification-content pt-2 dropdown-box">
                        <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-9.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a> 
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-5.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Robert De Niro</a> 
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Hugh Jackman</a> 
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a> 
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a> 
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110">
                        <img alt="Midone Tailwind HTML Admin Template" src="/dist/images/profile-13.jpg">
                    </div>
                    <div class="dropdown-box w-56">
                        <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                <div class="font-medium">{{user.name}} {{user.first_name}}</div>
                                <div class="text-xs text-theme-41 dark:text-gray-600">{{ user.email }}</div>
                                
                            </div>
                            <div class="p-2">
                                <!-- <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a> -->
                                <router-link to="/reset-password" href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Changer Mot de Passe </router-link>
                                <!-- <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a> -->
                            </div>
                            <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                <p class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> CODE PARRAINAGE : {{ user.code }} </p>
                            </div>
                            <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                <a href="#" @click="logout" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Déconnexion </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav">
            <ul>
                <!-- <li>
                    <a href="top-menu-light-dashboard.html" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="top-menu__title"> Dashboard </div>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                        <div class="top-menu__title"> MES CLIENTS <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4);">
                        <li>
                            <a href="index.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/clients" class="top-menu__title"> LISTE</router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-client" class="top-menu__title"> AJOUTER </router-link>
                            </a>
                        </li>
                        <li v-if="user.role == 'admin'">
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/all-clients" class="top-menu__title"> CLIENTS </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li> -->
                <!-- <li v-if="user.role == 'admin'">
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box"></i> </div>
                        <div class="top-menu__title"> CLIENTS <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/all-clients" class="top-menu__title"> Liste</router-link>
                            </a>
                        </li>
                       
                       
                    </ul>
                </li> -->
                <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box" style="color:rgb(3, 87, 3);"></i> </div>
                        <div class="top-menu__title" style="color:rgb(3, 87, 3);"> SUIVI DOSSIER <i data-feather="chevron-down" class="top-menu__sub-icon" style="color:green;"></i> </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4);">
                        <li>
                            <a href="index.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/dossiers" class="top-menu__title"> LISTE</router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-dossier" class="top-menu__title"> AJOUTER </router-link>
                            </a>
                        </li>
                        <li v-if="user.role == 'admin'">
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/all-dossiers" class="top-menu__title"> DOSSIERS </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <router-link to="/affiliation" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box" style="color:rgb(3, 87, 3);"></i> </div>
                        <div class="top-menu__title" style="color:rgb(3, 87, 3);"> HIERARCHIE <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </router-link>
                   
                </li>
               
                <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon" > <i data-feather="box" style="color:rgb(3, 87, 3);"></i> </div>
                        <div class="top-menu__title" style="color:rgb(3, 87, 3);"> FORMATION <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4);">
                        <li>
                            <a href="index.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/formations" class="top-menu__title"> LISTE</router-link>
                            </a>
                        </li>
                        <li v-if="user.role == 'admin'">
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-formation" class="top-menu__title"> AJOUTER </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li v-if="user.role == 'admin'">
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box" style="color:rgb(3, 87, 3);"></i> </div>
                        <div class="top-menu__title" style="color:rgb(3, 87, 3);"> FACTURATION <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4);">
                        <li>
                            <a href="index.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/factures" class="top-menu__title"> LISTE</router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/add-facture" class="top-menu__title"> AJOUTER </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box" style="color:rgb(3, 87, 3);"></i> </div>
                        <div class="top-menu__title" style="color:rgb(3, 87, 3);"> ESPACE COMMERCIAUX <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4);">
                        <li>
                            <a href="index.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="/contrats" class="top-menu__title"> CONTRAT</router-link>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                                <router-link to="#" class="top-menu__title"> REMUNERATION </router-link>
                            </a>
                        </li>
                       
                    </ul>
                </li>

                <li v-if="user.role == 'admin'">
                    <router-link to="/agents" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-feather="box" style="color:rgb(3, 87, 3);"></i> </div>
                        <div class="top-menu__title" style="color:rgb(3, 87, 3);"> AGENTS <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </router-link>
                   
                </li>
               
               

            </ul>
        </nav>
        <!-- END: Top Menu -->
    </div>


</template>