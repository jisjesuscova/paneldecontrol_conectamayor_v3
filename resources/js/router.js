import { createWebHistory, createRouter } from "vue-router";
import Account from './pages/Account.vue'
import Section from './pages/Section.vue'
import Category from './pages/Category.vue'
import Content from './pages/Content.vue'
import Audit from './pages/Audit.vue'
import Setting from './pages/Setting.vue'
import CreateSection from './pages/CreateSection.vue'
import EditSection from './pages/EditSection.vue'
import CreateCategory from './pages/CreateCategory.vue'
import EditCategory from './pages/EditCategory.vue'
import CreateContent from './pages/CreateContent.vue'
import EditContent from './pages/EditContent.vue'
import User from './pages/User.vue'
import CreateUser from './pages/CreateUser.vue'
import Rol from './pages/Rol.vue'
import CreateRol from './pages/CreateRol.vue'
import EditRol from './pages/EditRol.vue'
import EditUser from './pages/EditUser.vue'

const routes = [
    {
        name:'/',
        path:'/',
        component: Account
    },
    {
        name:'/sections',
        path:'/sections',
        component: Section
    },
    {
        name:'categories',
        path:'/categories',
        component: Category
    },
    {
        name:'contents',
        path:'/contents',
        component: Content
    },
    {
        name:'audits',
        path:'/audits',
        component: Audit
    },
    {
        name:'settings',
        path:'/settings',
        component: Setting
    },
    {
        name:'section/create',
        path:'/section/create',
        component: CreateSection
    },
    {
        name:'section/edit/:id',
        path:'/section/edit/:id',
        component: EditSection
    },
    {
        name:'category/create',
        path:'/category/create',
        component: CreateCategory
    },
    {
        name:'category/edit/:id',
        path:'/category/edit/:id',
        component: EditCategory
    },
    {
        name:'content/create',
        path:'/content/create',
        component: CreateContent
    },
    {
        name:'content/edit/:id',
        path:'/content/edit/:id',
        component: EditContent
    },
    {
        name:'users',
        path:'/users',
        component: User
    },
    {
        name:'user/create',
        path:'/user/create',
        component: CreateUser
    },
    {
        name:'rols',
        path:'/rols',
        component: Rol
    },
    {
        name:'rol/create',
        path:'/rol/create',
        component: CreateRol
    },
    {
        name:'rol/edit/:id',
        path:'/rol/edit/:id',
        component: EditRol
    },
    {
        name:'user/edit/:id',
        path:'/user/edit/:id',
        component: EditUser
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router