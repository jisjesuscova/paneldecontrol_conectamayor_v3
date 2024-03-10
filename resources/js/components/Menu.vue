<template>
    <div>
        <!-- /.navbar -->
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/" class="nav-link active" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-home"></i>
                            Inicio
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="add_section == 1 || edit_section == 1 || delete_section == 1 || copy_section == 1 || order_section == 1">
                        <router-link to="/sections" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-puzzle-piece"></i>
                            Secciones
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="add_category == 1 || edit_category == 1 || delete_category == 1 ||copy_category == 1 || order_category == 1">
                        <router-link to="/categories" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-stairs"></i>
                            Categorías
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="add_content == 1 || edit_content == 1 || delete_content == 1 || copy_content == 1 || order_content == 1">
                        <router-link to="/contents" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-newspaper"></i>
                            Contenidos
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="watch_audit == 1">
                        <router-link to="/audits" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-magnifying-glass"></i>
                            Auditorías
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="add_rol == 1 || edit_rol == 1 || delete_rol == 1">
                        <router-link to="/rols" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-user-lock"></i>
                            Rols
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="add_user == 1 || edit_user == 1 || delete_user == 1">
                        <router-link to="/users" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-users"></i>
                            Usuarios
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/settings" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-user"></i>
                            Perfil
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a @click="Logout" href="javascript:;" class="nav-link">
                            <i class="nav-icon fas fa-door-open"></i>
                            Salir
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </div>
  </template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            rol_id: '',
            sidebarVisible: true,
            add_section: '',
            edit_section: '',
            delete_section: '',
            copy_section: '',
            order_section: '',
            add_category: '',
            edit_category: '',
            delete_category: '',
            copy_category: '',
            order_category: '',
            add_content: '',
            edit_content: '',
            delete_content: '',
            copy_content: '',
            order_content: '',
            watch_audit: '',
            add_user: '',
            edit_user: '',
            delete_user: '',
            add_rol: '',
            edit_rol: '',
            delete_rol: '',
        }
    },
    methods: {
        toggleSidebar() {
            const pushMenuBtn = this.$refs.pushMenuBtn;

            $(pushMenuBtn).PushMenu('toggle');
        },
        Logout() {
            const token = localStorage.getItem('token')

            localStorage.removeItem('token');
            window.location.href = '/';
        }
    },
    mounted() {
        this.add_section = localStorage.getItem('add_section');
        this.edit_section = localStorage.getItem('edit_section');
        this.delete_section = localStorage.getItem('delete_section');
        this.copy_section = localStorage.getItem('copy_section');
        this.order_section = localStorage.getItem('order_section');

        this.add_category = localStorage.getItem('add_category');
        this.edit_category = localStorage.getItem('edit_category');
        this.delete_category = localStorage.getItem('delete_category');
        this.copy_category = localStorage.getItem('copy_category');
        this.order_category = localStorage.getItem('order_category');

        this.add_content = localStorage.getItem('add_content');
        this.edit_content = localStorage.getItem('edit_content');
        this.delete_content = localStorage.getItem('delete_content');
        this.copy_content = localStorage.getItem('copy_content');
        this.order_content = localStorage.getItem('order_content');

        this.watch_audit = localStorage.getItem('watch_audit');

        this.add_user = localStorage.getItem('add_user');
        this.edit_user = localStorage.getItem('edit_user');
        this.delete_user = localStorage.getItem('delete_user');

        this.add_rol = localStorage.getItem('add_rol');
        this.edit_rol = localStorage.getItem('edit_rol');
        this.delete_rol = localStorage.getItem('delete_rol');

        axios.get('/session-data')
        .then(response => {
            this.rol_id = response.data.rol_id;
        })
        .catch(error => {
            console.log(error);
        });
    }
}
</script>