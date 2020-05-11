<!-- Al añadir SCOPE solo afecta al propio componente -->
<style scoped>
    a {
        text-decoration: none;
        color: #eee;
    }

    img {
        border: 3px solid #116466;
        max-width: 100px;
    }

    ul {
        list-style: none;
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

    .notice-sm {
        padding: 10px;
        font-size: 80%;
        background-color: #fafafa;
        border-left: 6px solid #7f7f84;
        margin-bottom: 10px;
        -webkit-box-shadow: 0 5px 8px 1px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 8px 1px rgba(0,0,0,.2);
                box-shadow: 0 5px 8px 1px rgba(0,0,0,.2);
    }
    .notice-lg {
        padding: 35px;
        font-size: large;
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
    strong {
        color: #116466;
    }
    .notice-success>li>strong {
        color: #116466;
    }

    .icono {
        color: #116466;
    }

</style>d

<!-- Plantilla del componente VUE en la vista -->
<template>
    <div id="prophead">
        <div class="container-fluid">
            <div class="notice notice-success d-flex flex-column" v-for="detail in details" :key="detail.id_proposal">
                <!-- Título componente -->
                <strong><span class="text-center"><h4>PROJECTE</h4></span></strong>
                <div class="row">
                    <!-- Apartado con título, entidad y fecha -->
                    <div class="col d-flex flex-column">
                        <strong><h4>{{ detail.name }}</h4></strong>
                        <h6 class="text-muted">Creat per: {{ detail.school_name }}</h6>
                        <!-- MEJORAR: Crear un método que cambie la fecha por un texto del estilo "Hace X días" -->
                        <p><strong>Data de creació: </strong>{{ formattedDate(detail.created_at) }}</p>
                    </div>
                
                    <!-- Apartado con logo de la entidad -->
                    <div class="mr-3 d-flex justify-content-around">
                        <img class="ml-auto" alt="imagen" :src="'/img/logo_pic/logo'+detail.logo_entity" data-holder-rendered="true" width="100" height="100"/>
                    </div>
                </div>
                <!-- Autor/a proposta -->
                <div class="d-inline-flex justify-content-end mr-2">
                    <i class="medium material-icons ml-auto mr-2 icono">account_box</i>
                    <p class="mr-2"><strong>{{ detail.username }}</strong></p>
                </div>
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
            // CHAPUZA 1.0: Hay que hacerlo automático con un bucle
            let param = vars[vars.length - 2];
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
                let date = new Date(Date.UTC(arr[0], arr[1]-1, arr[2], arr[3], arr[4], arr[5]));
                return date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear()
            }
        }
    }

</script>
