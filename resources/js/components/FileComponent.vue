<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        Files List
                    </span>

                    <a class="action-link" tabindex="-1" @click="showCreateFileForm">
                        Create New File
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <vue-json-pretty
                        :path="'res'"
                        :data="{ file }">
                    </vue-json-pretty>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-create-file" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Create File
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in createForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Create Client Form -->
                        <form role="form">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Name</label>

                                <div class="col-md-9">
                                    <input id="create-file-name" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.name">
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="store">
                            Create
                        </button>
                    </div>
                </div>
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
                file: '',

                createForm: {
                    errors: [],
                    name: '',
                },
            }
        },

        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getFiles();

                $('#modal-create-file').on('shown.bs.modal', () => {
                    $('#create-file-name').focus();
                });
            },

            /**
             * Get all of the OAuth clients for the user.
             */
            getFiles() {
                axios.get('/api/file')
                    .then(response => {
                        this.file = response.data.message;
                    });
            },

            /**
             * Show the form for creating new clients.
             */
            showCreateFileForm() {
                $('#modal-create-file').modal('show');
            },

            /**
             * Create a new OAuth client for the user.
             */
            store() {
                this.persist(
                    'post', '/api/file/create',
                    this.createForm, '#modal-create-file'
                );
            },
            persist(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(response => {
                        this.getFiles();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        $(modal).modal('hide');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            form.errors = _.flatten(_.toArray(error.response.data.errors));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
        }

    }
</script>
