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
                    {{applications[0].job_name}} Applicatons Recievied
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
                    <th class="text-left">User Name</th>
                    <th class="text-left">Cover Letter</th>
                    <th class="text-left">Status</th>
                    <th class="text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr
                v-for="application in applications"
                :key="application.id"
                id="tableBody"
                >
                    <td>{{application.user_name}}</td>
                    <td>{{application.cover_letter}}</td>
                    <td>
                        <v-chip
                            v-bind="props"
                            color="red"
                            >
                                pending
                            </v-chip>
                    </td>
                     <td>
                        <v-icon icon="mdi-content-save-check" color="primary"></v-icon>
                        <v-icon icon="mdi-pencil" color="success"></v-icon>
                        <v-icon icon="mdi-trash-can" color="warning"></v-icon>
                    </td>

                </tr>

                </tbody>
            </v-table>

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
            AdminLayout,
            Link,
        },
        props: {
            applications: Object
        },

        data () {
            return {
                isVisible: false,
                dialog: false,
                form: this.$inertia.form({
                    id: '',

                }),
                rules: {
                    required: value => !!value || 'Required.',
                    reference: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'Invalid e-mail.'
                    },
                }
            }
        },

        methods: {
            viewApplications(id){
                Inertia.get(this.route("jobs.show", id));
            },
            saveData() {
                if(this.form.id === ''){
                    this.form.post(this.route('jobs.store'))
                }else{
                    this.form.patch(this.route('jobs.update', this.form))

                }
            },

            edit(id, key){
				this.dialog = true

				this.form.id = this.applications[key].id

            },

             //deleting
            destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("applications.destroy", id));
                    }
            },

            resetForm(){

				this.form.id = ''

            },

        }
    }
</script>

<style lang="scss" scoped>

</style>
