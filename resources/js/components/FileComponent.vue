<template>
    <div class="card">
        <div class="card-header">Files List</div>
        <div class="card-body">
            <div>
                <vue-json-pretty
                    :path="'res'"
                    :data="{ file }">
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
                file: ''
            }
        },

        mounted() {
            axios.get('/api/file')
                .then(response => {
                    this.file = response.data.message;
                });
        },
    }
</script>
