<template>
    <div class="card">
        <div class="card-header">Running Processes</div>
        <div class="card-body">
            <div>
                <vue-json-pretty
                    :path="'res'"
                    :data="{ processes }">
                </vue-json-pretty>
            </div>
        </div>
    </div>
</template>

<script>
    import VueJsonPretty from 'vue-json-pretty'
    export default {

        components: {
            VueJsonPretty
        },

        data() {
            return {
                processes: ''
            }
        },

        mounted() {
            axios.get('/api/processes')
                .then(response => {
                    this.processes = response.data;
                });
        }
    }
</script>
