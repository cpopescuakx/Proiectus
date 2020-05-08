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
<template>
    <div class="carousel slide" data-ride="carousel">
        <div class="my-5 carousel-inner p-5">
            <div class="carousel-item text-center pt-5 active box-part text-dark shadow-sm">
                <div class="title">
                    <h4>#RESISTIREM</h4>
                </div>
                <div class="text text-muted py-2">
                    <span>Descripció molt detallada.</span>
                </div>
            </div>
            <div class="carousel-item text-center pt-5 box-part text-dark shadow-sm" v-for="tip in tips" :key="tip.id">
                <div class="title">
                    <h4>{{ tip.question }}</h4>
                </div>
                <div class="text text-muted py-2">
                    <span v-html="tip.answer"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tips: []
            }
        },
        mounted() {
            this.getTips()
        },
        methods: {
            getTips() {
                axios
                    .get('/api/faq')
                    .then(response => (this.tips = response.data))
            }
        }
    }

</script>
