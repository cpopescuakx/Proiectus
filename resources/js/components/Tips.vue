<!-- Al añadir SCOPE solo afecta al propio componente -->
<style scoped>
    span {
        font-size: 15px;
    }

    a {
        text-decoration: none;
        color: #0062cc;
        border-bottom: 2px solid #0062cc;
    }

    .notice {
        padding: 5px;
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

    .box-part {
        border-radius: 0;
    }

    .text {
        margin: 20px 0px;
    }

    .carousel-fade .carousel-item {
        opacity: 0;
        transition-duration: .6s;
        transition-property: opacity;
    }

    .carousel-fade .carousel-item.active,
    .carousel-fade .carousel-item-next.carousel-item-left,
    .carousel-fade .carousel-item-prev.carousel-item-right {
        opacity: 1;
    }

    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-right {
        opacity: 0;
    }

    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .carousel-item.active,
    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-prev {
        transform: translateX(0);
        transform: translate3d(0, 0, 0);
    }

    .carousel-item {
        height: 200px;
    }
</style>
<template>
<div id="tips">
    <div class="container-fluid">
        <div class="carousel slide carousel-fade box-part notice notice-success" data-ride="carousel">
            <div class="my-5 carousel-inner">
                <div class="carousel-item text-center pt-5 active">
                    <h4><strong>#RESISTIREM</strong></h4>
                    <div class="text text-muted">
                        <span>Descripció molt detallada. Si no hay 2 líneas se ralla y falla</span>
                    </div>
                </div>
                <div class="carousel-item text-center pt-5" v-for="tip in tips" :key="tip.id">
                    <h4><strong>{{ tip.question }}</strong></h4>
                    <div class="text text-muted">
                        <span class="answer" v-html="tip.answer"></span>
                    </div>
                </div>
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
