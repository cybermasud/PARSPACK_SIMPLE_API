<template>
    <div class="card">
        <div class="card-header">Folders List</div>
        <div class="card-body">
            <div>
                <button v-on:click="create()">Create Folder</button>
            </div>
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
        methods: {
            create: function () {
                axios.post('/api/folder/create');
            }
        }
    }
</script>
