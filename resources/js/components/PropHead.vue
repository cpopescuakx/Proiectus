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

</style>d

<!-- Plantilla del componente VUE en la vista -->
<template>
    <div id="prophead">
        <div class="container-fluid">
            <ul class="notice notice-success col" v-for="detail in details" :key="detail.id_proposal">
                <li>
                    <h4>Títol: {{ detail.name }}</h4>
                    <div>
                        <h6>Creat per: {{ detail.school_name }}</h6>
                        <img class="rounded-circle mr-auto w-50 img-thumbnail" alt="250x250" :src="'/img/logo_pic/logo'+detail.logo_entity" data-holder-rendered="true" />
                    </div>
                    <hr>
                    <p><strong>Data de creació: </strong>{{ detail.created_at }}</p>
                    <p>Fa 5 dies</p>
                </li>
                <li>
                    <i class="medium material-icons">account_box</i>
                    <p>Autor/a: {{ detail.username }}</p>
                </li>
            </ul>
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
            getDetails(id) {
                axios
                    .get('/api/proposals/details/'+id)
                    .then(response => (this.details = response.data))
                    .catch(error => console.log(error))
            }
        }
    }

</script>
