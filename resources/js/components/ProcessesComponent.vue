<template>
    <div class="card">
        <div class="card-header">Running Processes</div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                {{ processes }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                processes: ''
            }
        },

        mounted() {
            axios.get('/api/processes')
                .then(response => {
                    this.processes = response.data.message;
                });
        }
    }
</script>
