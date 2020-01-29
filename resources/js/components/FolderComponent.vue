<template>
    <div class="card">
        <div class="card-header">Folders List</div>
        <div class="card-body">
            <div>
                <vue-json-pretty
                    :path="'res'"
                    :data="{ folder }">
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
                folder: ''
            }
        },

        mounted() {
            axios.get('/api/folder')
                .then(response => {
                    this.folder = response.data.message;
                });
        },
    }
</script>
