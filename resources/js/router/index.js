import { createRouter, createWebHistory } from 'vue-router'
import index from '../pages/views/index.vue'
import register from '../pages/views/auth/register.vue'
import login from '../pages/views/auth/login.vue'
//setting
import resetpassword from '../pages/views/setting/resetpassword.vue'
//dossiers
import indexDossier from '../pages/views/dossiers/index.vue'
import allDossier from '../pages/views/dossiers/all.vue'
import addDossier from '../pages/views/dossiers/add.vue'
import editDossier from '../pages/views/dossiers/edit.vue'
//client
import indexClient from '../pages/views/clients/index.vue'
import allClient from '../pages/views/clients/all.vue'
import addClient from '../pages/views/clients/add.vue'
//formation
import addFormation from '../pages/views/formations/add.vue'
import indexFormation from '../pages/views/formations/index.vue'
import showFormation from '../pages/views/formations/show.vue'
import editFormation from '../pages/views/formations/edit.vue'
//facture
import addFacture from '../pages/views/factures/add.vue'
import indexFacture from '../pages/views/factures/index.vue'

//affiliation
import indexAffiliation from '../pages/views/affiliation/index.vue'
import showAffiliation from '../pages/views/affiliation/show.vue'

//contrat
import addContrat from '../pages/views/contrat/add.vue'
import indexContrat from '../pages/views/contrat/index.vue'
import showContrat from '../pages/views/contrat/show.vue'


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
        name: 'allDossier',
        path: '/all-dossiers',
        component: allDossier,
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
        },
        beforeEnter: (to, from, next) => {
            // Code à exécuter avant que la nouvelle route soit rendue
            // Vous pouvez effectuer des opérations ici avant que la route soit rendue
            console.log('Before entering index route');
            
            // Assurez-vous d'appeler next() pour permettre à la navigation de continuer
            next();
        }
        
    },
    {   
        name: 'indexClient',
        path: '/clients',
        component: indexClient,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            // Code à exécuter avant que la nouvelle route soit rendue
            // Vous pouvez effectuer des opérations ici avant que la route soit rendue
            console.log('Before entering index route');
            
            // Assurez-vous d'appeler next() pour permettre à la navigation de continuer
            next();
        }
        
    },

    {   
        name: 'allClient',
        path: '/all-clients',
        component: allClient,
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            // Code à exécuter avant que la nouvelle route soit rendue
            // Vous pouvez effectuer des opérations ici avant que la route soit rendue
            console.log('Before entering index route');
            
            // Assurez-vous d'appeler next() pour permettre à la navigation de continuer
            next();
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
    //facturations
    {   
        name: 'addFacture',
        path: '/add-facture',
        component: addFacture,
        meta: {
            requiresAuth: true
        }
        
    },
    {   
        name: 'indexFacture',
        path: '/factures',
        component: indexFacture,
        meta: {
            requiresAuth: true
        }
        
    },
    //affiliation
    {   
        name: 'indexAffiliation',
        path: '/affiliation',
        component: indexAffiliation,
        meta: {
            requiresAuth: true
        }
        
    },
    //contrat
    {   
        name: 'addContrat',
        path: '/add-contrat',
        component: addContrat,
        meta: {
            requiresAuth: true
        }
    
    },
    {   
        name: 'indexContrat',
        path: '/contrats',
        component: indexContrat,
        meta: {
            requiresAuth: true
        }
        
    },
    
    {   
        name: 'showContrat',
        path: '/show-contrat/:contratId',
        component: showContrat,
        props: true,
        meta: {
            requiresAuth: true
        }
        
    },

    {   
        name: 'showAffiliation',
        path: '/show-affilier/:affilierId',
        component: showAffiliation,
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
        return { name: 'login' }
    }

    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return { name: 'indexClient' }
    }
})


export default router
