<template>
    <CrsLayout>
         <div class="text-body-2 mb-4">
            <span class="text-blue">STEP SEVEN</span> / Reference Details
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
        <!-- Referee 1 -->
        <v-container class="bg-white mt-4">
            <v-sheet>
                <div class="font-weight-bold">YOUR REFEREE INFORMATION {{form.id}} </div>
                <div class="font-weight-light text-primary pt-4 pb-20">PLEASE FILL THE BELLOW FORMS WITH YOUR CORRECT REFEREE INFORMATION.</div>
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
                <!-- Table -->
                <v-sheet>
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left">
                                Name
                                </th>
                                <th class="text-left">
                                Address
                                </th>
                                <th class="text-left">
                                Phone
                                </th>
                                <th class="text-left">
                                Email
                                </th>
                                <th class="text-left">
                                Occupation
                                </th>
                                <th class="text-left">
                                Company
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
                                v-for="(item, i) in referees"
                                :key="i"
                            >
                                <td>{{ item.name }}</td>
                                <td>{{ item.address }}</td>
                                <td>{{ item.phone }}</td>
                                <td>{{ item.email }}</td>
                                <td>{{ item.occupation }}</td>
                                <td>{{ item.company }}</td>
                                <td>
                                    <v-icon icon="mdi-pencil" color="success"  @click="edit(item.id, i)"></v-icon>
                                    <v-icon icon="mdi-trash-can" color="warning" @click="destroy(item.id, i)"></v-icon>
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </v-sheet>
                <!-- Buttons -->
                <v-btn
                color="primary"
                class="mx-2 my-6"
                @click="saveData();"
                :disabled="form.processing"
                name="submitbtn"
                type="submit"
                id="submitbtnn"
                >
                    save
                </v-btn>
                <!-- next button -->
                <v-btn
                class="mx-2 my-6"
                >
                 <Link :href="route('summary')">Next</Link>
                </v-btn>

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
                                <span class="text-h5">Referee Details</span>
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
                                                <div class="text-subtitle-4 text-medium-emphasis">company*</div>
                                                <v-text-field
                                                    density="compact"
                                                    variant="outlined"
                                                    v-model="form.company"
                                                    :rules="[rules.required]"
                                                    :error="form.errors.company"
                                                    :error-messages="form.errors.company"
                                                    @click="form.clearErrors('compzny')"
                                                >
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="4" >
                                                <div class="text-subtitle-4 text-medium-emphasis">Address*</div>
                                                <v-text-field
                                                    density="compact"
                                                    variant="outlined"
                                                    v-model="form.address"
                                                    :rules="[rules.required]"
                                                    :error="form.errors.address"
                                                    :error-messages="form.errors.address"
                                                    @click="form.clearErrors('address')"
                                                >
                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                        <!-- 2nd model row -->
                                        <v-row>
                                            <v-col cols="12" sm="4" >
                                                <div class="text-subtitle-4 text-medium-emphasis">Phone*</div>
                                                <v-text-field
                                                    density="compact"
                                                    variant="outlined"
                                                    v-model="form.email"
                                                    :rules="[rules.required]"
                                                    :error="form.errors.email"
                                                    :error-messages="form.errors.email"
                                                    @click="form.clearErrors('email')"
                                                >
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="4" >
                                                <div class="text-subtitle-4 text-medium-emphasis">Email*</div>
                                                <v-text-field
                                                    density="compact"
                                                    variant="outlined"
                                                    v-model="form.phone"
                                                    :rules="[rules.required]"
                                                    :error="form.errors.phone"
                                                    :error-messages="form.errors.phone"
                                                    @click="form.clearErrors('phone')"
                                                >
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="4" >
                                                <div class="text-subtitle-4 text-medium-emphasis">Occupation*</div>
                                                <v-text-field
                                                    density="compact"
                                                    variant="outlined"
                                                    v-model="form.occupation"
                                                    :rules="[rules.required]"
                                                    :error="form.errors.occupation"
                                                    :error-messages="form.errors.occupation"
                                                    @click="form.clearErrors('occupation')"
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
            </v-sheet>
        </v-container>



    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
    import { Inertia } from '@inertiajs/inertia'
    import { useForm } from '@inertiajs/inertia';
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            CrsLayout,
            Link
        },
        props: {
            referees: Array,
        },
        data () {
            return {
                isVisible: false,
                dialog: false,
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    occupation: '',
                    company: '',
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
                    this.form.post(this.route('refereesave'))
                }else{
                    this.form.patch(this.route('referee.update', this.form))
                }
            },
             destroy(id, key){
                  if (confirm("Are you sure you want to Delete")) {
                        Inertia.delete(this.route("referee.delete", id));
                        //this.referees.splice(key, 1)
                    }
            },

            edit(id, key){
				this.dialog = true
				this.form.name = this.referees[key].name
				this.form.email = this.referees[key].email
				this.form.phone = this.referees[key].phone
				this.form.address = this.referees[key].address
				this.form.occupation = this.referees[key].occupation
				this.form.company = this.referees[key].company
				this.form.id = this.referees[key].id
            },
            // saveEdits(){
            //     if(this.form.id === ''){
            //         this.form.post(this.route('historysave'))
            //     }else{
            //         this.form.patch(this.route('history.update', this.form))
            //     }
            //     //this.form.patch(this.route('history.update', this.form))
            // },
            resetForm(){
				this.form.name = '',
				this.form.email = '',
				this.form.occupation ='',
				this.form.company ='',
				this.form.phone = '',
				this.form.id = '',
				this.form.address = ''
            },

        },


    }
</script>

<style lang="scss" scoped>

</style>
