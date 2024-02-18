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
                    Jobs Table
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
                    <th class="text-left">Name</th>
                    <th class="text-left">Position</th>
                    <th class="text-left">Reference</th>
                    <th class="text-left">Deadline</th>
                    <th class="text-left">Vacancies</th>
                    <th class="text-left">Applications</th>
                    <th class="text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr
                v-for="(job, i) in jobs"
                :key="job.id"
                id="tableBody"
                >
                    <td>{{job.id}}</td>
                    <td>{{job.name}}</td>
                    <td>{{job.position}}</td>
                    <td>{{job.reference}}</td>
                    <td>{{job.deadline}}</td>
                    <td>{{job.vacancy}}</td>
                    <td>
                        <v-tooltip
                        location="end"
                        origin="auto"
                        no-click-animation
                        >
                        <template v-slot:activator="{ props }">
                            <v-chip
                            v-bind="props"
                            color="primary"
                            append-icon="mdi-arrow-top-right"
                            @click="viewApplications(job.id)"
                            >
                                {{job.applications.length}}
                            </v-chip>
                        </template>

                        <div>view applications</div>
                        </v-tooltip>
                        <!-- <v-tooltip
                        location="end"
                        origin="auto"
                        no-click-animation
                        >
                            <v-chip
                            v-bind="props"
                            color="primary"
                            append-icon="mdi-arrow-top-right"
                            @click="viewApplications(job.id)"
                            >
                                {{job.applications.length}}
                            </v-chip>
                            <div>Overlay content</div>
                        </v-tooltip> -->
                    </td>
                    <td>
                        <v-icon icon="mdi-pencil" color="success"  @click="edit(job.id, i)"></v-icon>
                        <v-icon icon="mdi-trash-can" color="warning" @click="destroy(job.id, i)"></v-icon>
                    </td>
                </tr>

                </tbody>
            </v-table>

        </v-container>
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
                        <span class="text-h5">Edit job</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <div class="">
                                <!-- 1st job row -->
                                <v-row>
                                    <!-- col1 -->
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">name *</div>
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
                                    <!-- col 2 -->
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">reference *</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.reference"
                                            :rules="[rules.required]"
                                            :error="form.errors.reference"
                                            :error-messages="form.errors.reference"
                                            @click="form.clearErrors('reference')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <!-- col 3 -->
                                    <v-col cols="12" sm="4">
                                        <div class="text-subtitle-4 text-medium-emphasis">position *</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.position"
                                            :rules="[rules.required]"
                                            :error="form.errors.position"
                                            :error-messages="form.errors.position"
                                            @click="form.clearErrors('position')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                </v-row>
                                <!-- 2nd job row -->
                                <v-row>
                                    <!-- col1 -->
                                    <v-col cols="12" sm="6" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Deadline *</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.deadline"
                                            :rules="[rules.required]"
                                            :error="form.errors.deadline"
                                            :error-messages="form.errors.deadline"
                                            @click="form.clearErrors('deadline')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <!-- col 2 -->
                                    <v-col cols="12" sm="6" >
                                        <div class="text-subtitle-4 text-medium-emphasis">vacancy *</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.vacancy"
                                            :rules="[rules.required]"
                                            :error="form.errors.vacancy"
                                            :error-messages="form.errors.vacancy"
                                            @click="form.clearErrors('vacancy')"
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
            AdminLayout,
            Link,
        },
        props: {
            jobs: Object
        },

        data () {
            return {
                isVisible: false,
                dialog: false,
                form: this.$inertia.form({
                    id: '',
                    name: '',
                    position: '',
                    reference: '',
                    deadline: '',
                    vacancy: ''
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
				this.form.position = this.jobs[key].position
				this.form.reference = this.jobs[key].reference
				this.form.id = this.jobs[key].id
				this.form.name = this.jobs[key].name
				this.form.deadline = this.jobs[key].deadline
				this.form.vacancy = this.jobs[key].vacancy
            },

             //deleting
            destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("jobs.destroy", id));
                    }
            },

            resetForm(){
				this.form.position = '',
				this.form.reference = '',
				this.form.id = ''
				this.form.name = ''
				this.form.deadline = ''
				this.form.vacancy = ''
            },

        }
    }
</script>

<style lang="scss" scoped>

</style>
