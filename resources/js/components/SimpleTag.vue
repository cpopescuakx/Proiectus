<!-- Al añadir SCOPE solo afecta al propio componente -->
<style scoped>
    a {
        text-decoration: none;
        color: #eee;
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
    .notice-success>strong {
        color: #116466;
    }
    .notice-info {
        border-color: #45ABCD;
    }
    .notice-info>strong {
        color: #45ABCD;
    }
    .notice-warning {
        border-color: #FEAF20;
    }
    .notice-warning>strong {
        color: #FEAF20;
    }
    .notice-danger {
        border-color: #d73814;
    }
    .notice-danger>strong {
        color: #d73814;
    }

</style>

<!-- Plantilla del componente VUE en la vista -->
<template>
    <div id="showtags">
        <div class="container-fluid">
            <div class="notice-lg notice-success">
                <strong><span class="text-center"><h4>TAGS</h4></span></strong>
                <br>
                <div class="d-inline-flex" v-for="proposaltag in proposaltags" :key="proposaltag.id_tag">
                    <a href="#" class="badge badge-success mr-1">{{ proposaltag.tag_name }}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                proposaltags: []
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
            this.getTags(param);
        },
        methods: {
            getTags(id) {
                axios
                    .get('/api/proposal/tags/'+id)
                    .then(response => (this.proposaltags = response.data))
                    .catch(error => console.log(error))
            }
        }
    }

</script>
