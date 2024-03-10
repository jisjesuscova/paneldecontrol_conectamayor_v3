<template>
    <div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div v-if="loading">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center loading">
                                        <div
                                            class="d-flex flex-column align-items-center"
                                        >
                                            <img
                                                :src="`../../template/dist/img/spinner.gif`"
                                                alt=""
                                                height="70"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Usuario</h3>
                                </div>
                                <form @submit.prevent="submit">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <label for="rut"
                                                    >Rol
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="rol_input"
                                                    class="form-control"
                                                >
                                                    <option value="">- Roles -</option>
                                                    <option v-for="rol_post in rol_posts" :key="rol_post.id" :value="rol_post.id">{{ rol_post.rol }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="name"
                                                    >Nombre
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="name_input"
                                                    placeholder="Nombre"
                                                    aria-label="Nombre"
                                                />
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <label for="email"
                                                    >Correo
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="email_input"
                                                    placeholder="Correo"
                                                    aria-label="Correo"
                                                />
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <label for="password"
                                                    >Contraseña
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="password"
                                                    class="form-control"
                                                    v-model="password_input"
                                                    placeholder="Contraseña"
                                                    aria-label="Contraseña"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12 w-full">
                                                <button
                                                    type="submit"
                                                    class="btn btn-success mr-2"
                                                >
                                                    <i
                                                        class="fa-solid fa-check"
                                                    ></i>
                                                    Guardar
                                                </button>

                                                <router-link
                                                    href="javascript:;"
                                                    to="/users"
                                                    class="btn btn-danger ml-2"
                                                >
                                                    <i
                                                        class="fa-solid fa-remove"
                                                    ></i>
                                                    Cancelar
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mask } from "vue-the-mask";

export default {
    directives: { mask },
    data() {
        return {
            loading: true,
            name_input: "",
            email_input: "",
            password_input: "",
            rol_input: "",
            rol_posts: [],
        };
    },
    methods: {
        async getRols() {
            const token = localStorage.getItem("token");

            if (token) {
                try {
                    const response = await axios.post(
                        "https://paneldecontrolem.cl/api/get_all",
                        {
                            headers: {
                                Authorization: `Bearer ${token}`,
                            },
                        }
                    );

                    this.rol_posts = response.data.data;
                    this.loading = false;
                } catch (error) {
                    console.error("Error al obtener los roles:", error);
                }
            } else {
                this.$router.push("/");
                this.isLoading = false;
                this.loading = false;
            }
        },
        async submit() {
            this.loading = true;
            const token = localStorage.getItem("token");

            if (token) {
                const formData = new FormData();
                
                formData.append("rol_id", this.rol_input);
                formData.append("name", this.name_input);
                formData.append("email", this.email_input);
                formData.append("password", this.password_input);

                try {
                    const response = await axios.post(
                        "https://paneldecontrolem.cl/api/user/store",
                        formData,
                        {
                            headers: {
                                Authorization: `Bearer ${token}`,
                                "Content-Type": "multipart/form-data",
                            },
                        }
                    );

                    this.posts = response.data.data;
                    this.loading = false;

                    localStorage.setItem("created_user", 1);

                    this.$router.push("/users");
                } catch (error) {
                    console.error("Error al guardar el usuario:", error);
                }
            } else {
                this.$router.push("/");
                this.isLoading = false;
                this.loading = false;
            }
        },
    },
    async mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 5000);

        await this.getRols();
    },
};
</script>
<style scoped>
.text-info {
    color: #d7da27 !important;
    font-size: 20px !important;
}
</style>
