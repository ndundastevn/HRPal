<template>
    <AdminLayout>
        <!-- Welcome -->
       <div class="text-h4 pa-2">Admin's Dashboard</div>
        <!-- End welcome -->
        <!-- Alart -->
        <v-alert
        type="success"
        class="mb-4"
        density="comfortable"
        v-model="form.wasSuccessful"
        closable
        close-label="Close Alert"
        v-if="form.wasSuccessful"
        >
            Data Saved Successful.
        </v-alert>

        <v-container class="bg-white mt-2">
             <v-sheet color="gray-lighten-3" class="font-weight-bold">
                    posts Table
            </v-sheet>
             <div class="text-right">
                <v-btn
                color="success"
                prepend-icon="mdi-plus"
                @click="dialog=true"
                >
                Add New
                </v-btn>
            </div>
            <!-- Table -->
            <v-table class="px-4">
                <thead>
                <tr class="font-weight-bold" id="tableHead">
                    <th class="text-left">ID</th>
                    <th class="text-left">title</th>
                    <th class="text-left">body</th>
                    <th class="text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr
                v-for="(post, i) in posts"
                :key="post.id"
                id="tableBody"
                >
                    <td>{{post.id}}</td>
                    <td>{{post.title}}</td>
                    <td>{{post.body}}</td>
                    <td>
                        <v-icon icon="mdi-pencil" color="success"  @click="edit(post.id, i)"></v-icon>
                        <v-icon icon="mdi-trash-can" color="warning" @click="destroy(post.id, i)"></v-icon>
                    </td>
                </tr>

                </tbody>
            </v-table>
            <!-- popup model -->
            <v-row justify="center">
                <v-dialog
                v-model="dialog"
                persistent
                max-width="700"
                >
                    <template v-if="form.recentlySuccessful">
                        {{resetForm()}}
                        {{dialog = false}}
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="text-h5">Edit post</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container>
                                <div class="">
                                    <!-- 1st post row -->
                                    <v-row>
                                        <v-col cols="12" sm="6" >
                                            <div class="text-subtitle-4 text-medium-emphasis">title *</div>
                                            <v-text-field
                                                density="compact"
                                                variant="outlined"
                                                v-model="form.title"
                                                :rules="[rules.required]"
                                                :error="form.errors.title"
                                                :error-messages="form.errors.title"
                                                @click="form.clearErrors('title')"
                                            >
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" >
                                            <div class="text-subtitle-4 text-medium-emphasis">body *</div>
                                            <v-text-field
                                                density="compact"
                                                variant="outlined"
                                                v-model="form.body"
                                                :rules="[rules.required]"
                                                :error="form.errors.body"
                                                :error-messages="form.errors.body"
                                                @click="form.clearErrors('compzny')"
                                            >
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                </div>
                            </v-container>
                            <small>* indicates required field</small>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="blue-darken-1"
                                variant="text"
                                @click="dialog = false; resetForm()"
                            >
                                Close
                            </v-btn>
                            <v-btn
                                color="blue-darken-1"
                                variant="text"
                                @click="saveData"
                                :disabled="form.processing"
                            >
                                Save
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>
        </v-container>

        </AdminLayout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout.vue';
    import { Inertia } from '@inertiajs/inertia'
    import axios from 'axios';
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            AdminLayout
        },
        props: {
            posts: Object
        },

        data () {
            return {
                isVisible: false,
                dialog: false,
                form: this.$inertia.form({
                    id: '',
                    title: '',
                    body: '',
                }),
                rules: {
                    required: value => !!value || 'Required.',
                    body: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'Invalid e-mail.'
                    },
                }
            }
        },

        methods: {
            saveData() {
                if(this.form.id === ''){
                    this.form.post(this.route('posts.store'))
                }else{
                    this.form.patch(this.route('posts.update', this.form))
                }
            },

            edit(id, key){
				this.dialog = true
				this.form.title = this.posts[key].title
				this.form.body = this.posts[key].body
				this.form.id = this.posts[key].id
            },

             //deleting
            destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("posts.destroy", id));
                    }
            },

            resetForm(){
				this.form.title = '',
				this.form.body = '',
				this.form.id = ''
            },

        }
    }
</script>

<style lang="scss" scoped>

</style>
