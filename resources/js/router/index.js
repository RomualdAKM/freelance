import { createRouter, createWebHistory } from 'vue-router'
import index from '../pages/views/index.vue'
import register from '../pages/views/auth/register.vue'
import login from '../pages/views/auth/login.vue'
//setting
import resetpassword from '../pages/views/setting/resetpassword.vue'
//dossiers
import indexDossier from '../pages/views/dossiers/index.vue'
import addDossier from '../pages/views/dossiers/add.vue'
import editDossier from '../pages/views/dossiers/edit.vue'
//client
import indexClient from '../pages/views/clients/index.vue'
import addClient from '../pages/views/clients/add.vue'
//formation
import addFormation from '../pages/views/formations/add.vue'
import indexFormation from '../pages/views/formations/index.vue'
import showFormation from '../pages/views/formations/show.vue'
import editFormation from '../pages/views/formations/edit.vue'

import notFound from '../pages/notFound.vue'

const routes = [
    {   
        name: 'index',
        path: '/',
        component: index,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'register',
        path: '/register',
        component: register,
        meta: {
            requiresAuth: false
        }
        
    },
    {   
        name: 'resetpassword',
        path: '/reset-password',
        component: resetpassword,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'login',
        path: '/login',
        component: login,
        meta: {
            requiresAuth: false
        }
        
    },
    //dossiers
    {   
        name: 'indexDossier',
        path: '/dossiers',
        component: indexDossier,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'addDossier',
        path: '/add-dossier',
        component: addDossier,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'editDossier',
        path: '/edit-dossier/:dossierId',
        component: editDossier,
        props: true,
        meta: {
            requiresAuth: true
        }
        
    },

    //clients
    {   
        name: 'addClient',
        path: '/add-client',
        component: addClient,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'indexClient',
        path: '/clients',
        component: indexClient,
        meta: {
            requiresAuth: true
        }
        
    },
    //formation
    {   
        name: 'addFormation',
        path: '/add-formation',
        component: addFormation,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'indexFormation',
        path: '/formations',
        component: indexFormation,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'showFormation',
        path: '/show-formation/:formationId',
        component: showFormation,
        props: true,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'editFormation',
        path: '/edit-formation/:formationId',
        component: editFormation,
        props: true,
        meta: {
            requiresAuth: true
        }
        
    },

    {
        path: '/:pathMatch(.*)*',
        component: notFound,
        meta: {
            requiresAuth: false
        }
        
    }

]

const router = createRouter({
    history: createWebHistory(),
    routes,

})
router.beforeEach((to,from) =>{
    if(to.meta.requiresAuth && !localStorage.getItem('token')){
        return { name: 'indexClient' }
    }

    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return { name: 'index' }
    }
})


export default router
