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
                    REGESTERD USERS
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
                <tr class="font-weight-bold">
                    <th class="text-left">
                    ID
                    </th>
                    <th class="text-left">
                    NAME
                    </th>
                    <th class="text-left">
                    EMAIL
                    </th>
                    <th class="text-left">
                    DoR
                    </th>
                    <th class="text-left">
                    Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                v-for="(user, i) in users"
                :key="user.id"
                >
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.created_at}}</td>
                    <td>
                        <v-icon icon="mdi-pencil" color="success"  @click="edit(user.id, i)"></v-icon>
                        <v-icon icon="mdi-trash-can" color="warning" @click="destroy(user.id, i)"></v-icon>
                    </td>
                </tr>

                </tbody>
            </v-table>
        </v-container>
        <!-- model -->
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
                        <span class="text-h5">Edit User</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <div class="">
                                <!-- 1st model row -->
                                <v-row>
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Full Name*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.name"
                                            :rules="[rules.required]"
                                            :error="form.errors.name"
                                            :error-messages="form.errors.name"
                                            @click="form.clearErrors('name')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">email*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.email"
                                            :rules="[rules.required]"
                                            :error="form.errors.email"
                                            :error-messages="form.errors.email"
                                            @click="form.clearErrors('compzny')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Password</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            value="password"
                                            disabled
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
            users: Object
        },

        data () {
            return {
                isVisible: false,
                dialog: false,
                form: this.$inertia.form({
                    id: '',
                    name: '',
                    email: '',
                }),
                rules: {
                    required: value => !!value || 'Required.',
                    email: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'Invalid e-mail.'
                    },
                }
            }
        },

        methods: {
            saveData() {
                if(this.form.id === ''){
                    this.form.post(this.route('usersave'))
                }else{
                    this.form.patch(this.route('user.update', this.form))
                }
            },

            edit(id, key){
				this.dialog = true
				this.form.name = this.users[key].name
				this.form.email = this.users[key].email
				this.form.id = this.users[key].id
            },

             //deleting
            destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("user.destroy", id));
                    }
            },

            resetForm(){
				this.form.name = '',
				this.form.email = '',
				this.form.id = ''
            },

        }
    }
</script>

<style lang="scss" scoped>

</style>
