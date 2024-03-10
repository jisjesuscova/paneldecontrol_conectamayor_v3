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
                                    <h3 class="card-title">Crear Rol</h3>
                                </div>
                                <form @submit.prevent="submit">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label for="rut"
                                                    >Rol
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="rol_input"
                                                    placeholder="Rol"
                                                    aria-label="Rol"
                                                />
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>
                                            Secciones
                                        </h5>
                                        <div class="row mt-4">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Agregar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="add_section_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Editar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="edit_section_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Borrar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="delete_section_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Copiar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="copy_section_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Ordenar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="order_section_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <h5>
                                            Categorias
                                        </h5>
                                        <div class="row mt-4">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Agregar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="add_category_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Editar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="edit_category_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Borrar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="delete_category_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Copiar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="copy_category_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Ordenar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="order_category_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>
                                        <h5>
                                            Contenidos
                                        </h5>
                                        <div class="row mt-4">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Agregar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="add_content_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Editar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="edit_content_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Borrar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="delete_content_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Copiar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="copy_content_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Ordenar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="order_content_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>
                                            Auditorias
                                        </h5>
                                        <div class="row mt-4">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                        >Ver
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                    >
                                                <select
                                                    required
                                                    v-model="watch_audit_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>
                                            Rol
                                        </h5>
                                        <div class="row mt-4">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Agregar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="add_rol_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Editar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="edit_rol_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Borrar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="delete_rol_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>
                                            Usuarios
                                        </h5>
                                        <div class="row mt-4">
                                            <div class="col-md-1">

                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Agregar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="add_user_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Editar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="edit_user_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""
                                                    >Borrar
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    required
                                                    v-model="delete_user_input"
                                                    class="form-control"
                                                >
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
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
                                                    Actualizar
                                                </button>

                                                <router-link
                                                    href="javascript:;"
                                                    to="/rols"
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
            rol_input: "",
            add_section_input: "1",
            edit_section_input: "1",
            delete_section_input: "1",
            copy_section_input: "1",
            order_section_input: "1",
            add_category_input: "1",
            edit_category_input: "1",
            delete_category_input: "1",
            copy_category_input: "1",
            order_category_input: "1",
            add_content_input: "1",
            edit_content_input: "1",
            delete_content_input: "1",
            copy_content_input: "1",
            order_content_input: "1",
            watch_audit_input: "1",
            add_user_input: "1",
            edit_user_input: "1",
            delete_user_input: "1",
            add_rol_input: "1",
            edit_rol_input: "1",
            delete_rol_input: "1",
        };
    },
    methods: {
        async submit() {
            this.loading = true;
            const token = localStorage.getItem("token");

            if (token) {
                const formData = new FormData();

                formData.append("rol", this.rol_input);
                formData.append("add_section", this.add_section_input);
                formData.append("edit_section", this.edit_section_input);
                formData.append("delete_section", this.delete_section_input);
                formData.append("copy_section", this.copy_section_input);
                formData.append("order_section", this.order_section_input);
                formData.append("add_category", this.add_category_input);
                formData.append("edit_category", this.edit_category_input);
                formData.append("delete_category", this.delete_category_input);
                formData.append("copy_category", this.copy_category_input);
                formData.append("order_category", this.order_category_input);
                formData.append("add_content", this.add_content_input);
                formData.append("edit_content", this.edit_content_input);
                formData.append("delete_content", this.delete_content_input);
                formData.append("copy_content", this.copy_content_input);
                formData.append("order_content", this.order_content_input);
                formData.append("watch_audit", this.watch_audit_input);
                formData.append("add_user", this.add_user_input);
                formData.append("edit_user", this.edit_user_input);
                formData.append("delete_user", this.delete_user_input);
                formData.append("add_rol", this.add_rol_input);
                formData.append("edit_rol", this.edit_rol_input);
                formData.append("delete_rol", this.delete_rol_input);

                try {
                    const response = await axios.post(
                        "https://paneldecontrolem.cl/api/rol/" + this.$route.params.id,
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

                    localStorage.setItem("created_alliance", 1);

                    this.$router.push("/rols");
                } catch (error) {
                    console.error("Error al guardar el rol:", error);
                }
            } else {
                this.$router.push("/");
                this.isLoading = false;
                this.loading = false;
            }
        },
        async getData() {
            const token = localStorage.getItem("token");

            if(token) {
                try {
                    const response = await axios.get("https://paneldecontrolem.cl/api/rol/" + this.$route.params.id, {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });

                    this.rol_input = response.data.rol.rol;
                    this.add_section_input = response.data.rol_permissions.add_section;
                    this.edit_section_input = response.data.rol_permissions.edit_section;
                    this.delete_section_input = response.data.rol_permissions.delete_section;
                    this.copy_section_input = response.data.rol_permissions.copy_section;
                    this.order_section_input = response.data.rol_permissions.order_section;
                    this.add_category_input = response.data.rol_permissions.add_category;
                    this.edit_category_input = response.data.rol_permissions.edit_category;
                    this.delete_category_input = response.data.rol_permissions.delete_category;
                    this.copy_category_input = response.data.rol_permissions.copy_category;
                    this.order_category_input = response.data.rol_permissions.order_category;
                    this.add_content_input = response.data.rol_permissions.add_content;
                    this.edit_content_input = response.data.rol_permissions.edit_content;
                    this.delete_content_input = response.data.rol_permissions.delete_content;
                    this.copy_content_input = response.data.rol_permissions.copy_content;
                    this.order_content_input = response.data.rol_permissions.order_content;
                    this.watch_audit_input = response.data.rol_permissions.watch_audit;
                    this.add_user_input = response.data.rol_permissions.add_user;
                    this.edit_user_input = response.data.rol_permissions.edit_user;
                    this.delete_user_input = response.data.rol_permissions.delete_user;
                    this.add_rol_input = response.data.rol_permissions.add_rol;
                    this.edit_rol_input = response.data.rol_permissions.edit_rol;
                    this.delete_rol_input = response.data.rol_permissions.delete_rol;
                    
                } catch (error) {
                    console.error("Error al obtener los roles:", error);
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

        await this.getData();
    },
};
</script>
<style scoped>
.text-info {
    color: #d7da27 !important;
    font-size: 20px !important;
}
</style>
