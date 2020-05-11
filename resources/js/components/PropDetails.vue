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

    .notice-success {
        border-color: #116466;
    }
    .notice-success>strong {
        color: #116466;
    }
</style>

<!-- Plantilla del componente VUE en la vista -->
<template>
    <div id="showdetails mt-5">
        <div class="container-fluid" v-for="detail in details" :key="detail.id_proposal">
            <div class="notice notice-success">
                <strong><span class="text-center"><h4>ESPECIFICACIONS</h4></span></strong>
                <br>
                <strong>Descripció:</strong> {{ detail.description }}<hr>
                <strong>Professional Family:</strong> {{ detail.professional_family }}<hr>
                <strong>Entitat:</strong> {{ detail.category }}<hr>
                <strong>Data d'inici:</strong> {{ formattedDate(detail.created_at) }}<hr>
                <strong>Data de finalització:</strong> {{ formattedDate(detail.limit_date) }}
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
