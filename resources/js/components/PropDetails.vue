<!-- Al añadir SCOPE solo afecta al propio componente -->
<style scoped>
    a {
        text-decoration: none;
        color: #eee;
    }

    strong {
        color: #116466;
    }

    .badge-success {
        background-color: #116466;
    }

    .badge-success:hover {
        background-color: #2C3531;
    }

    .notice {
        padding: 15px;
        background-color: #fafafa;
        border-left: 6px solid #7f7f84;
        margin-bottom: 10px;
        -webkit-box-shadow: 0 5px 8px 1px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 8px 1px rgba(0,0,0,.2);
                box-shadow: 0 5px 8px 1px rgba(0,0,0,.2);
    }

    .notice-success {
        border-color: #116466;
    }

    .dropdown>button>i {
        color: #116466;
    }

    .dropdown-menu {
        background-color: #fafafa;
    }

    .dropdown-item {
        color: #116466;
    }

    .dropdown-item:hover {
        background-color: #116466;
        color: #eee;
    }
</style>

<!-- Plantilla del componente VUE en la vista -->
<template>
    <div id="showdetails mt-5">
        <div class="container-fluid" v-for="detail in details" :key="detail.id_proposal">
            <div class="notice notice-success">
                <div class="d-flex flex-row justify-content-center">
                    <div class="col">
                        <!-- Simulamos una columna para una correcta alineación -->
                    </div>

                    <div class="col">
                        <strong><h4 class="text-center">ESPECIFICACIONS</h4></strong>
                    </div>

                    <div class="col dropdown"> 
                        <button class="btn float-right" role="button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" :href="'/Proposals/'+detail.id_proposal+'/edit'">Editar proposta</a>
                            <div class="dropdown-divider"></div>
                            <a v-if="(detail.status == 'inactive')" class="dropdown-item" :href="'/Proposals/'+detail.id_proposal+'/active'" >Activar proposta</a>
                            <a v-else class="dropdown-item" :href="'/Proposals/'+detail.id_proposal+'/inactive'">Desactivar proposta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" :href="'/Proposals/'+detail.id_proposal">Eliminar proposta</a>
                        </div>
                    </div>
                </div>
                <br>
                <strong>Descripció:</strong><br>
                    {{ detail.description }}<hr>
                <strong>Professional Family:</strong><br>
                    {{ detail.professional_family }}<hr>
                <strong>Entitat:</strong><br>
                    <p v-if="detail.category == 'school'">Institut</p>
                    <p v-else>Empresa</p>
                    <hr>
                <strong>Data d'inici:</strong><br>
                    {{ formattedDate(detail.created_at) }}<hr>
                <strong>Data de finalització:</strong><br>
                    {{ formattedDate(detail.limit_date) }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                details: []
            }
        },
        mounted() {
            // Es necesario almacenar en una variable la id_proposal que se envía a través de la URL de nuestro navegador
            // Así, podemos indicar al GET Request de la API que pase ese valor como parámetro y hacer un GET personalizado O.o
            let path = window.location.pathname; // Accedemos a la última parte de nuestra URL
            let vars = path.split("/"); // Creamos un array con todos los valores que obtenemos
            let param = vars[vars.length - 2]; // Seleccionamos el parámetro que necesitamos 
            //console.log(path);
            //console.log(vars);
            //console.log(param);
            this.getDetails(param);
        },
        methods: {
            // GET Request API / proposals / details / $id
            getDetails(id) {
                axios
                    .get('/api/proposals/details/'+id)
                    .then(response => (this.details = response.data))
                    .catch(error => console.log(error))
            },

            // Método que da formato a la fecha
            formattedDate: function(d) {
                let arr = d.split(/[- :]/);
                let months = ['gener', 'febrer', 'març', 'abril', 'maig', 'juny', 'juliol', 'agost', 'setembre', 'octubre', 'novembre', 'desembre'];
                let date = new Date(Date.UTC(arr[0], arr[1]-1, arr[2], arr[3], arr[4], arr[5]));
                return date.getDate() + " de " + (months[date.getMonth() + 1]) + " de " + date.getFullYear()
            }
        }
    }

</script>
