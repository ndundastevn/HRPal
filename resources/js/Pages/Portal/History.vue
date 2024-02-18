<template>
    <CrsLayout>
        <div class="text-body-2 mb-4">
            <span class="text-blue">STEP FIVE</span> / Employment History
        </div>

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

        <v-container class="bg-white">
            <div class="font-weight-bold">EMPLOYMENT HISTORY</div>
            <div class="font-weight-light pt-4 pb-4">Please fill in the required fields.</div>
            <!-- Add new button -->
            <div class="text-right">
                <v-btn
                color="success"
                prepend-icon="mdi-plus"
                @click="dialog=true"
                >
                Add New
                </v-btn>
            </div>
            <v-sheet>
                <!-- table -->
                 <v-table>
                    <thead>
                        <tr>
                            <th class="text-left">
                            Institution
                            </th>
                            <th class="text-left">
                            Designation
                            </th>
                            <th class="text-left">
                            Start Year
                            </th>
                            <th class="text-left">
                            End Year
                            </th>
                            <th class="text-left">
                            Salary
                            </th>
                            <th class="text-left">
                            Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr v-if="education === null" class="text-error">
                            <td colspan="6">
                                No data found. Please add your education details in the form bellow*
                            </td>
                        </tr> -->
                        <tr
                            v-for="(item, i) in datas"
                            :key="i"
                        >
                            <td>{{ item.institution }}</td>
                            <td>{{ item.designation }}</td>
                            <td>{{ item.start }}</td>
                            <td>{{ item.end }}</td>
                            <td>{{ item.salary }}</td>
                            <td>
                                <v-icon icon="mdi-pencil" color="success"  @click="edit(item.id, i)"></v-icon>
                                <v-icon icon="mdi-trash-can" color="warning" @click="destroy(item.id, i)"></v-icon>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
            </v-sheet>
            <!-- next button -->
            <v-btn
            class="mx-2 my-6"
            >
                <Link :href="route('kin')">Next</Link>
            </v-btn>
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
                        <span class="text-h5">Employment History Details</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
							<div class="">
                                <v-row>
                                    <v-col cols="12" sm="6" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Organization Name*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.institution"
                                            :rules="[rules.required]"
                                            :error="form.errors.institution"
                                            :error-messages="form.errors.institution"
                                            @click="form.clearErrors('institution')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Designation*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.designation"
                                            :rules="[rules.required]"
                                            :error="form.errors.designation"
                                            :error-messages="form.errors.designation"
                                            @click="form.clearErrors('designation')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Start Year*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.start"
                                            :rules="[rules.required]"
                                            :error="form.errors.start"
                                            :error-messages="form.errors.start"
                                            @click="form.clearErrors('start')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">End Year*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.end"
                                            :rules="[rules.required]"
                                            :error="form.errors.end"
                                            :error-messages="form.errors.end"
                                            @click="form.clearErrors('end')"
                                        >
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="4" >
                                        <div class="text-subtitle-4 text-medium-emphasis">Salary*</div>
                                        <v-text-field
                                            density="compact"
                                            variant="outlined"
                                            v-model="form.salary"
                                            :rules="[rules.required]"
                                            :error="form.errors.salary"
                                            :error-messages="form.errors.salary"
                                            @click="form.clearErrors('salary')"
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
                            @click="saveEdits"
                            :disabled="form.processing"
                        >
                            Save
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
    import { Inertia } from '@inertiajs/inertia'
    import { useForm } from '@inertiajs/inertia-vue3'
    import axios from 'axios';
    import { Link } from '@inertiajs/inertia-vue3'


    export default {
        components: {
            CrsLayout,
            Link
        },
          props: {
            datas: Object
        },
        data(){
            return {
                dialog: false,
                form: this.$inertia.form({
                    institution: '',
                    start: '',
                    end: '',
                    designation: '',
                    salary: '',
                    id: ''
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
            // saveData() {
            //     Inertia.post('/historysave', this.form)
			// 	//this.form.post(this.route('kinsave'))
            //     //console.log(this.form)
            // },
            saveData() {
                if(this.form.id === ''){
                    this.form.post(this.route('historysave'))
                }else{
                    this.form.patch(this.route('history.update', this.form))
                }
            },
             destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("history.delete", id));
                        //this.datas.splice(key, 1)
                    }
            },

            edit(id, key){
				this.dialog = true
				this.form.institution = this.datas[key].institution
				this.form.start = this.datas[key].start
				this.form.end = this.datas[key].end
				this.form.designation = this.datas[key].designation
				this.form.salary = this.datas[key].salary
				this.form.id = this.datas[key].id
            },
            saveEdits(){
                if(this.form.id === ''){
                    this.form.post(this.route('historysave'))
                }else{
                    this.form.patch(this.route('history.update', this.form))
                }
                //this.form.patch(this.route('history.update', this.form))
            },
            resetForm(){
				this.form.institution = '',
				this.form.start = '',
				this.form.salary ='',
				this.form.end = '',
				this.form.id = '',
				this.form.designation = ''
            },

        },

    }
</script>

<style lang="scss" scoped>

</style>
