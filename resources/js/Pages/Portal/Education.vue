<template>
    <CrsLayout>
        <div class="text-body-2 mb-4">
            <span class="text-blue">STEP THREE</span> / Education Details
        </div>
         <!-- Alart -->
        <v-alert
        type="success"
        class="mb-4"
        density="comfortable"
        v-model="form.recentlySuccessful"
        closable
        close-label="Close Alert"
        v-if="form.wasSuccessful"
        >
            Data Saved Successful.
        </v-alert>


        <v-container class="bg-white">
            <div class="font-weight-bold">EDUCATION DETAILS</div>
            <div class="font-weight-light pt-4 pb-4">Please fill in the required fields.</div>
            <!-- Add button -->
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
                            Education Level
                            </th>
                            <th class="text-left">
                            Year Ended
                            </th>
                            <th class="text-left">
                            Institution
                            </th>
                            <th class="text-left">
                            Certificate
                            </th>
                            <th class="text-left">
                            Highest
                            </th>
                            <th class="text-left">
                            Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr v-if="educations.length() === 0" class="text-error">
                            <td colspan="6">
                                No data found. Please add your education details in the form bellow*
                            </td>
                        </tr> -->
                        <tr
                            v-for="(item, i) in educations"
                            :key="i"
                        >
                            <td>{{ item.level }}</td>
                            <td>{{ item.y_ended }}</td>
                            <td>{{ item.institution }}</td>
                            <td>{{ item.certificate }}</td>
                            <td>
                                <v-badge
                                v-if="item.highest"
                                color="primary"
                                inline
                                icon="mdi-check"
                                ></v-badge>
                                <v-badge
                                v-if="!item.highest"
                                color="error"
                                inline
                                icon="mdi-alpha-x"
                                ></v-badge>
                            </td>
                            <td>
                                <v-icon icon="mdi-pencil" color="success"  @click="edit(item.id, i)"></v-icon>
                                <v-icon icon="mdi-trash-can" color="warning" @click="destroy(item.id, i)"></v-icon>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
                <!-- Next page button -->
                <v-btn
                class="mx-2 my-6"
                >
                    <Link :href="route('employment')">Next</Link>
                </v-btn>
            </v-sheet>

             <!-- model -->
            <v-sheet justify="center">
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
                            <span class="text-h5">Education Details</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container>
                                <div class="">
                                    <v-row>
                                        <v-col cols="12" sm="6" >
                                            <div class="text-subtitle-4 text-medium-emphasis">Name of Institution*</div>
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
                                            <div class="text-subtitle-4 text-medium-emphasis">Certificate Obtained*</div>
                                            <v-text-field
                                                density="compact"
                                                variant="outlined"
                                                v-model="form.certificate"
                                                :rules="[rules.required]"
                                                :error="form.errors.certificate"
                                                :error-messages="form.errors.certificate"
                                                @click="form.clearErrors('certificate')"
                                            >
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col cols="12" sm="4" >
                                            <div class="text-subtitle-4 text-medium-emphasis">Year Ended*</div>
                                            <v-text-field
                                                density="compact"
                                                variant="outlined"
                                                v-model="form.y_ended"
                                                :rules="[rules.required]"
                                                :error="form.errors.y_ended"
                                                :error-messages="form.errors.y_ended"
                                                @click="form.clearErrors('y_ended')"
                                            >
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="4" >
                                            <div class="text-subtitle-4 text-medium-emphasis">Level of education*</div>
                                            <v-text-field
                                                density="compact"
                                                variant="outlined"
                                                v-model="form.level"
                                                :rules="[rules.required]"
                                                :error="form.errors.level"
                                                :error-messages="form.errors.level"
                                                @click="form.clearErrors('level')"
                                            >
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="4" >
                                            <v-checkbox
                                                v-model="form.highest"
                                                color="success"
                                                label="Highest Education Level"
                                            ></v-checkbox>
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
            </v-sheet>

            <!-- form -->
<!--
            <v-sheet class="mt-4" color="grey-lighten-4">
                <div class="pa-2 bg-grey-lighten-2 text-center mb-2">Add New Leve Of Education</div>
                <div class="">
                    <v-row justify="center">
                        <v-col cols="12" sm="5">
                            <div class="text-red" v-if="form.errors.level">Please select the level of education</div>
                            <v-radio-group label="Select Level of Education" v-model="form.level">
                                <v-radio label="PHD" value="PHD" id="PHD" ></v-radio>
                                <v-radio label="Masters" value="Masters" id="Masters" ></v-radio>
                                <v-radio label="Degree" value="Degree" id="Degree" ></v-radio>
                                <v-radio label="Higher Diploma" value="Higher Diploma" id="Higher Diploma" ></v-radio>
                                <v-radio label="Diploma" value="Diploma" id="Diploma" ></v-radio>
                                <v-radio label="Certificate" value="Certificate" id="Certificate" ></v-radio>
                                <v-radio label="Proffesional Courses" value="Professionsal Course" id="Preffesional" ></v-radio>
                                <v-radio label="Others" value="Others" id="coure" ></v-radio>
                            </v-radio-group>
                        </v-col>
                        <v-col cols="12" sm="5" >
                            <div class="text-center bg-grey-lighten-2 text-button py-2">{{form.level}}</div>
                            <v-form class="mt-2">
                                <div class="text-subtitle-4 text-medium-emphasis">Year Ended*</div>
                                <v-text-field
                                    density="compact"
                                    variant="outlined"
                                    v-model="form.y_ended"
                                    :rules="[rules.required]"
                                    :error="form.errors.y_ended"
                                    :error-messages="form.errors.y_ended"
                                    @click="form.clearErrors('y_ended')"
                                >
                                </v-text-field>

                                <div class="text-subtitle-1 text-medium-emphasis">Name Of Institution*</div>
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

                                <div class="text-subtitle-1 text-medium-emphasis">Certificate Optained*</div>
                                <v-text-field
                                    density="compact"
                                    variant="outlined"
                                    v-model="form.certificate"
                                    :rules="[rules.required]"
                                    :error="form.errors.certificate"
                                    :error-messages="form.errors.certificate"
                                    @click="form.clearErrors('certificate')"
                                >
                                </v-text-field>

                                <v-checkbox
                                    v-model="form.highest"
                                    color="success"
                                    label="Check Here If This is Your Highest Education Level"
                                ></v-checkbox>

                                <v-btn
                                color="primary"
                                class="mx-2 mb-6"
                                @click="saveData"
                                :disabled="form.processing"
                                >
                                    save
                                </v-btn>

                            </v-form>
                        </v-col>
                    </v-row>
                </div>
            </v-sheet> -->
        </v-container>
    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
    import { router } from '@inertiajs/vue3';
    import { Inertia } from "@inertiajs/inertia";
    import { Link } from '@inertiajs/inertia-vue3'


    export default {
        components: {
            CrsLayout,
            Link
        },
        props: {
            educations: Object,
        },
        data () {
            return {
                dialog: false,
                items: ['phd', 'masters', 'degree', 'higher diploma', 'diploma', 'certificate', 'others'],
                form: this.$inertia.form({
                    id: '',
                    level: '',
                    y_ended: '',
                    institution:'',
                    certificate:'',
                    highest: false
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
        // mounted(){
        //     if(this.educations != ''){
        //         this.educations.forEach((element, index, array) => {
        //             this.educations.push(element)
        //         });
        //     }else{
        //         //console.log('do not update data')
        //     }
        // },
        methods: {
            //deleting
            destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("education.destroy", id));
                        //this.educations.splice(key, 1)
                    }
            },

            saveData() {
				this.form.post(this.route('edusave'))
                if(this.form.id === ''){
                    this.form.post(this.route('edusave'))
                }else{
                    this.form.patch(this.route('education.edit', this.form))
                }
            },
            edit(id, key){
                //console.log(this.educations[key])
                //Inertia.post(this.route('edusave', this.educations[key]))
				this.dialog = true
				this.form.level = this.educations[key].level
				this.form.y_ended = this.educations[key].y_ended
				this.form.institution = this.educations[key].institution
				this.form.certificate = this.educations[key].certificate
				this.form.highest = this.educations[key].highest
				this.form.id = this.educations[key].id
            },
            saveEdits(){
                this.form.patch(this.route('education.edit', this.form))
            },
            resetForm(){
				this.form.level = '',
				this.form.y_ended = '',
				this.form.institution ='',
				this.form.certificate = '',
				this.form.id = '',
				this.form.highest = false
            },


        },
        // watch: {
        //     educations(newValue){
        //         if(newValue != ''){
        //             this.educations = []
        //             newValue.forEach((element, index, array) => {
        //                 this.educations.push(element)
        //             });
        //         }else{
        //             this.educations = []
        //         }
        //     }
        // }

    }
</script>

<style lang="scss" scoped>

</style>
