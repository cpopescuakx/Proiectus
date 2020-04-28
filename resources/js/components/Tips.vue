<template>
    <div class="container">
        <div class="row justify-content-center bg-primary">
            <div class="col-md-8">
                <div class="card">
                    <li class="card-body">
                        {{ tips }}

                    </li>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tips: null
                }
        },
        mounted() {
            axios
                .get('/api/proposals')
                .then(response => (this.tips = response))
        }
    }
</script>