import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../components/Home'
import Logistics from '../components/logistics/Home'
import LogisticsNew from '../components/logistics/New'
import LogisticsEdit from '../components/logistics/Edit'
import Brands from '../components/brands/Home'
import BrandsNew from '../components/brands/New'
import Categories from '../components/categories/Home'
import CategoriesNew from '../components/categories/New'
import CategoriesEdit from '../components/categories/Edit'




Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/logistics',
        name: 'Logistics',
        component: Logistics
    },
    {
        path: '/logistics/New',
        name: 'Logistics_New',
        component: LogisticsNew
    },
    {
        path: '/logistics/Edit/:id',
        name: 'Logistics_Edit',
        component: LogisticsEdit
    },
    {
        path: '/brands',
        name: 'Brands',
        component: Brands
    },
    {
        path: '/brands/New',
        name: 'Brands_New',
        component: BrandsNew
    },
    {
        path: '/categories',
        name: 'Categories',
        component: Categories
    },
    {
        path: '/categories/New',
        name: 'Categories',
        component: CategoriesNew
    },
    {
        path: '/categories/Edit/:id',
        name: 'Categories_Edit',
        component: CategoriesEdit
    },


];

const router = new VueRouter({
    routes
});

export default router;
