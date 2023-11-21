<script setup>
import { reactive, ref } from "vue";
import router from "./../../../router/index.js"


let form = reactive({
    email: "",
    password: "",
});



const login = async () => {
    await axios.post("api/login", form).then((response) => {
        if (response.data.success) {
            localStorage.setItem("token", response.data.data.token);
            router.push("/clients");
             toast.fire({
            icon: "success",
            title: "Connect  Successfully",
        });
        } else {
           toast.fire({
            icon: "error",
            title: response.data.message,
        });
        }
    });
};

</script>

<template>
    <div class="login">

        <div class="container sm:px-10">
                <div class="block xl:grid grid-cols-2 gap-4">
                    <!-- BEGIN: Login Info -->
                    <div class="hidden xl:flex flex-col min-h-screen">
                        <a href="#" class="-intro-x flex items-center pt-5">
                            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/dist/images/logo.svg">
                            <span class="text-white text-lg ml-3"> Mid<span class="font-medium">One</span> </span>
                        </a>
                        <div class="my-auto">
                            <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="/dist/images/illustration.svg">
                            <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                                Encore quelques clics 
                                <br>
                                pour vous connecter à votre compte.
                            </div>
                           
                        </div>
                    </div>
                    <!-- END: Login Info -->
                    <!-- BEGIN: Login Form -->
                    
                    <form @submit.prevent="login()" class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                                Connexion
                            </h2>
                            <div class="intro-x mt-8">
                                <input type="text" v-model="form.email" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email">
                                <input type="password" v-model="form.password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                            </div>
                            <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input type="checkbox" class="input border mr-2" id="remember-me">
                                    <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                                </div>
                                <!-- <a href="#">Forgot Password?</a>  -->
                            </div>
                            <div class="intro-x flex justify-between mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" class="button button--lg w-full xl:w-32 h-10 text-white bg-theme-1 mt-3 xl:mr-3 align-top">Connexion</button>
                                <router-link to="/register" class="button button--lg w-full xl:w-32 h-10 text-gray-700 border mt-3 border-gray-400 dark:border-dark-5 dark:text-gray-300 xl:mt-3 align-top">Inscription</router-link>
                            </div>
                            <!-- <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                                By signin up, you agree to our 
                                <br>
                                <a class="text-theme-1 dark:text-theme-10" href="#">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="#">Privacy Policy</a> 
                            </div> -->
                        </div>
                    </form>
                    <!-- END: Login Form -->
                </div>
        </div>
    </div>
</template>