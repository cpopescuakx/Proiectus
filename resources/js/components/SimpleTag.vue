<!-- Al añadir SCOPE solo afecta al propio componente -->
<style scoped>
    body {
        background: #eee;
    }

    span {
        font-size: 15px;
    }

    a {
        text-decoration: none;
        color: #0062cc;
        border-bottom: 2px solid #0062cc;
    }

    .box-part {
        background: #FFF;
        border-radius: 0;
        max-height: 350px;
        min-height: 350px;
        max-width: 350px;
        min-width: 350px;
    }

    .text {
        margin: 20px 0px;
    }

    .topic {
        background: #116466;
        margin: 20px 20px;
    }

</style>
<!-- TO-DO: Falta arreglar alineación vertical y comprobar si tocando la plantilla de la vista se arregla ese efecto de transición tan merdento.
        El puto d-flex me petaba el carrusel, buscar alternativa fácil -->
<template>
<div>
   <!-- <button type="button" class="btn btn-secondary">LO QUE SEA</button> -->
    <div class="btn-group" role="group" aria-label="Basic example" v-for="proposaltag in proposaltags" :key="proposaltag.id_tag">
        <button type="button" class="btn btn-secondary">{{ proposaltag.tag_name }}</button>
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
            let path = window.location.pathname;
            let vars = path.split("/");
            let param = vars[vars.length - 2];
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
