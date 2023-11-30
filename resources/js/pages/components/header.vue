<script setup>
import { ref, onMounted } from "vue";
import router from "./../../router/index.js";

const user = ref({});

const getAuthUser = async () => {
    await axios.get("/api/info_auth_user").then((response) => {
        user.value = response.data;
        console.log("user", response.data);
    });
};

const logout = () => {
    localStorage.removeItem("token");
    router.push("/login");
};

const mobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value;
};

const handleSubMenuClick = (event) => {
  const menu = event.currentTarget;
  const subMenu = menu.parentNode.querySelector('ul');

  if (subMenu && subMenu.offsetParent !== null) {
    menu.querySelector('.menu__sub-icon').classList.remove('transform', 'rotate-180');
    // Replace ii() with your animation logic here
    // e.g., use Vue's transition classes to handle slideUp/slideDown
    // You may need to include a transition wrapper around subMenu
  } else {
    menu.querySelector('.menu__sub-icon').classList.add('transform', 'rotate-180');
    // Replace ii() with your animation logic here
    // e.g., use Vue's transition classes to handle slideUp/slideDown
    // You may need to include a transition wrapper around subMenu
  }
};

onMounted(async () => {
    await getAuthUser();
    feather.replace();
   
});

</script>

<template>
    <div class="mt-5">
       <!-- BEGIN: Mobile Menu -->
        <!-- <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="#" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                </a>
                <a href="javascript:;"  id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="index.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Side Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Simple Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Top Menu </div>
                            </a>
                        </li>
                    </ul>
                </li>
              
               
            </ul>
        </div> -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="#" class="flex mr-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/FRE2E_COMPANY.jpg">
                </a>
                <a href="javascript:;" @click="toggleMobileMenu()">
                <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
                </a>
            </div>
            <ul class="border-t border-theme-24 py-5" :class="{ 'hidden': !mobileMenuOpen }">
                <li>
                    <router-link to="/dossiers" class="menu menu--active">
                        <div class="menu__icon"> <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3"
                                />
                            </svg>
                         </div>
                        <div class="menu__title"> SUIVI DOSSIER </div>
                    </router-link>
                </li>
                <li>
                    <router-link to="/affiliation" class="menu menu--active">
                        <div class="menu__icon">  <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
                                />
                            </svg>
                         </div>
                        <div class="menu__title"> HIERARCHIE </div>
                    </router-link>
                </li>
                <li>
                    <router-link to="/formations" class="menu menu--active">
                        <div class="menu__icon"> 
                            
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                />
                            </svg>
                        </div>
                        <div class="menu__title"> FORMATION </div>
                    </router-link>
                </li>
                <li v-if="user.role == 'admin'">
                    <router-link to="/factures" class="menu menu--active">
                        <div class="menu__icon">  <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"
                                />
                            </svg>
                        </div>
                        <div class="menu__title"> FACTURATION </div>
                    </router-link>
                </li>
                <li>
                    <router-link to="/contrats" class="menu menu--active">
                        <div class="menu__icon">  <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"
                                />
                            </svg>
                         </div>
                        <div class="menu__title"> CONTRAT </div>
                    </router-link>
                </li>
                <li >
                    <router-link to="/remuneration" class="menu menu--active">
                        <div class="menu__icon"> 
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"
                                />
                            </svg> </div>
                        <div class="menu__title"> REMUNERATION </div>
                    </router-link>
                </li>
                <li >
                    <router-link to="/agents" class="menu menu--active">
                        <div class="menu__icon"> <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                />
                            </svg> </div>
                        <div class="menu__title"> AGENTS </div>
                    </router-link>
                </li>
                
            </ul>
    </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div
            class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10"
        >
            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="#" class="-intro-x hidden md:flex">
                    <img
                        alt="Midone Tailwind HTML Admin Template"
                        class="w-12 h-12"
                        src="/FRE2E_COMPANY.jpg"
                    />
                    <!-- <span class="text-white text-lg ml-3"> <span class="font-medium">FRE2E_COMPANY</span> </span> -->
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                    <a href="#" class="" style="color: rgb(10, 10, 10)"
                        >Bienvenue chez</a
                    >
                    <i
                        data-feather="chevron-right"
                        class="breadcrumb__icon"
                    ></i>
                    <a
                        href="#"
                        class="breadcrumb--active"
                        style="color: rgb(10, 10, 10)"
                        >FR2E COMPANY</a
                    >
                </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                   
                    <a
                        class="notification notification--light sm:hidden"
                        href="#"
                    >
                        <i
                            data-feather="search"
                            class="notification__icon dark:text-gray-300"
                        ></i>
                    </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">
                                Pages
                            </div>
                            <div class="mb-5">
                                <a href="#" class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"
                                    >
                                        <i
                                            class="w-4 h-4"
                                            data-feather="inbox"
                                        ></i>
                                    </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"
                                    >
                                        <i
                                            class="w-4 h-4"
                                            data-feather="users"
                                        ></i>
                                    </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"
                                    >
                                        <i
                                            class="w-4 h-4"
                                            data-feather="credit-card"
                                        ></i>
                                    </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">
                                Users
                            </div>
                            <div class="mb-5">
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img
                                            alt="Midone Tailwind HTML Admin Template"
                                            class="rounded-full"
                                            src="dist/images/profile-9.jpg"
                                        />
                                    </div>
                                    <div class="ml-3">Johnny Depp</div>
                                    <div
                                        class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                    >
                                        johnnydepp@left4code.com
                                    </div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img
                                            alt="Midone Tailwind HTML Admin Template"
                                            class="rounded-full"
                                            src="dist/images/profile-5.jpg"
                                        />
                                    </div>
                                    <div class="ml-3">Robert De Niro</div>
                                    <div
                                        class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                    >
                                        robertdeniro@left4code.com
                                    </div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img
                                            alt="Midone Tailwind HTML Admin Template"
                                            class="rounded-full"
                                            src="dist/images/profile-15.jpg"
                                        />
                                    </div>
                                    <div class="ml-3">Hugh Jackman</div>
                                    <div
                                        class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                    >
                                        hughjackman@left4code.com
                                    </div>
                                </a>
                                <a href="#" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img
                                            alt="Midone Tailwind HTML Admin Template"
                                            class="rounded-full"
                                            src="dist/images/profile-6.jpg"
                                        />
                                    </div>
                                    <div class="ml-3">Denzel Washington</div>
                                    <div
                                        class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                    >
                                        denzelwashington@left4code.com
                                    </div>
                                </a>
                            </div>
                            <div class="search-result__content__title">
                                Products
                            </div>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img
                                        alt="Midone Tailwind HTML Admin Template"
                                        class="rounded-full"
                                        src="dist/images/preview-8.jpg"
                                    />
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div
                                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                >
                                    Sport &amp; Outdoor
                                </div>
                            </a>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img
                                        alt="Midone Tailwind HTML Admin Template"
                                        class="rounded-full"
                                        src="dist/images/preview-11.jpg"
                                    />
                                </div>
                                <div class="ml-3">Nikon Z6</div>
                                <div
                                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                >
                                    Photography
                                </div>
                            </a>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img
                                        alt="Midone Tailwind HTML Admin Template"
                                        class="rounded-full"
                                        src="dist/images/preview-10.jpg"
                                    />
                                </div>
                                <div class="ml-3">Oppo Find X2 Pro</div>
                                <div
                                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                >
                                    Smartphone &amp; Tablet
                                </div>
                            </a>
                            <a href="#" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img
                                        alt="Midone Tailwind HTML Admin Template"
                                        class="rounded-full"
                                        src="dist/images/preview-11.jpg"
                                    />
                                </div>
                                <div class="ml-3">Sony Master Series A9G</div>
                                <div
                                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                                >
                                    Electronic
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
               
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div
                        class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                    >
                        <img
                            alt="Midone Tailwind HTML Admin Template"
                            src="/dist/images/profile-13.jpg"
                        />
                    </div>
                    <div class="dropdown-box w-56">
                        <div
                            class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white"
                            style="background-color: green"
                        >
                            <div
                                class="p-4 border-b border-theme-40 dark:border-dark-3"
                            >
                                <div class="font-medium">
                                    {{ user.name }} {{ user.first_name }}
                                </div>
                                <div
                                    class="text-xs text-theme-41 dark:text-gray-600"
                                >
                                    {{ user.email }}
                                </div>
                            </div>
                            <div class="p-2">
                                <!-- <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a> -->
                                <router-link
                                    to="/reset-password"
                                    href="#"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                                >
                                    <i
                                        data-feather="lock"
                                        class="w-4 h-4 mr-2"
                                    ></i>
                                    Changer Mot de Passe
                                </router-link>
                                <!-- <a href="#" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a> -->
                            </div>
                            <div
                                class="p-2 border-t border-theme-40 dark:border-dark-3"
                            >
                                <p
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                                >
                                    CODE PARRAINAGE : {{ user.code }}
                                </p>
                            </div>
                            <div
                                class="p-2 border-t border-theme-40 dark:border-dark-3"
                            >
                                <a
                                    href="#"
                                    @click="logout"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                                >
                                    <i
                                        data-feather="toggle-right"
                                        class="w-4 h-4 mr-2"
                                    ></i>
                                    Déconnexion
                                </a>
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
               
                <li>
                    <a
                        href="javascript:;"
                        class="top-menu top-menu--active"
                        :class="{
                            'side-menu--active': $route.path === '/dossiers',
                        }"
                    >
                        <div class="top-menu__icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3"
                                />
                            </svg>
                        </div>
                        <div
                            class="top-menu__title"
                            style="color: rgb(3, 87, 3)"
                        >
                            SUIVI DOSSIER
                            <i
                                data-feather="chevron-down"
                                class="top-menu__sub-icon"
                                style="color: green"
                            ></i>
                        </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4)">
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/dossiers"
                                    class="top-menu__title"
                                >
                                    LISTE</router-link
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/add-dossier"
                                    class="top-menu__title"
                                >
                                    AJOUTER
                                </router-link>
                            </a>
                        </li>
                        <li v-if="user.role == 'admin'">
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/all-dossiers"
                                    class="top-menu__title"
                                >
                                    DOSSIERS
                                </router-link>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <router-link
                        to="/affiliation"
                        class="top-menu top-menu--active"
                    >
                        <div class="top-menu__icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
                                />
                            </svg>
                        </div>
                        <div
                            class="top-menu__title"
                            style="color: rgb(3, 87, 3)"
                        >
                            HIERARCHIE
                            <i
                                data-feather="chevron-down"
                                class="top-menu__sub-icon"
                            ></i>
                        </div>
                    </router-link>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                />
                            </svg>
                        </div>
                        <div
                            class="top-menu__title"
                            style="color: rgb(3, 87, 3)"
                        >
                            FORMATION
                            <i
                                data-feather="chevron-down"
                                class="top-menu__sub-icon"
                            ></i>
                        </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4)">
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/formations"
                                    class="top-menu__title"
                                >
                                    LISTE</router-link
                                >
                            </a>
                        </li>
                        <li v-if="user.role == 'admin'">
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/add-formation"
                                    class="top-menu__title"
                                >
                                    AJOUTER
                                </router-link>
                            </a>
                        </li>
                    </ul>
                </li>
                <li v-if="user.role == 'admin'">
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"
                                />
                            </svg>
                        </div>
                        <div
                            class="top-menu__title"
                            style="color: rgb(3, 87, 3)"
                        >
                            FACTURATION
                            <i
                                data-feather="chevron-down"
                                class="top-menu__sub-icon"
                            ></i>
                        </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4)">
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/factures"
                                    class="top-menu__title"
                                >
                                    LISTE</router-link
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/add-facture"
                                    class="top-menu__title"
                                >
                                    AJOUTER
                                </router-link>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"
                                />
                            </svg>
                        </div>
                        <div
                            class="top-menu__title"
                            style="color: rgb(3, 87, 3)"
                        >
                            ESPACE COMMERCIAUX
                            <i
                                data-feather="chevron-down"
                                class="top-menu__sub-icon"
                            ></i>
                        </div>
                    </a>
                    <ul class="" style="background-color: rgb(4, 141, 4)">
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <router-link
                                    to="/contrats"
                                    class="top-menu__title"
                                >
                                    CONTRAT</router-link
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#" class="top-menu">
                                <div class="top-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>

                                <router-link
                                    to="/remuneration"
                                    class="top-menu__title"
                                >
                                    REMUNERATION
                                </router-link>
                            </a>
                        </li>
                    </ul>
                </li>

                <li v-if="user.role == 'admin'">
                    <router-link to="/agents" class="top-menu top-menu--active">
                        <div class="top-menu__icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                />
                            </svg>
                        </div>
                        <div
                            class="top-menu__title"
                            style="color: rgb(3, 87, 3)"
                        >
                            AGENTS
                            <i
                                data-feather="chevron-down"
                                class="top-menu__sub-icon"
                            ></i>
                        </div>
                    </router-link>
                </li>
            </ul>
        </nav>
        <!-- END: Top Menu -->
    </div>
</template>
