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
            <div class="font-weight-bold">YOUR EMPLOYMENT HISTORY INFORMATION</div>
            <div class="font-weight-light text-primary pt-4 pb-20">PLEASE FILL N/A ON THE FIRST FILED IF YOU HAVE NEVER BEEN EMPLOYED.</div>
            <v-sheet>


                <!-- Row 2 phd -->
                <div class="pa-2 font-weight-light">From current going backwards</div>
                <v-form @submit.prevent="saveData">
                    <v-row v-for="(n, i) in form" :key="i">
                        <v-col cols="12" sm="2">
                            <div class="text-subtitle-1 text-medium-emphasis">Year From* {{n.id}} </div>
                            <v-text-field
                                v-model="form[i].start"
                                density="compact"
                                variant="outlined"
                                :rules="[rules.required]"
                                validate-on="submit"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="2">
                            <div class="text-subtitle-1 text-medium-emphasis">Year To*</div>
                            <v-text-field
                                density="compact"
                                variant="outlined"
                                v-model="form[i].end"
                                :rules="[rules.required]"
                                validate-on="submit"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="3">
                            <div class="text-subtitle-1 text-medium-emphasis">Name of Institution*</div>
                            <v-text-field
                                density="compact"
                                variant="outlined"
                                v-model="form[i].institution"
                                :rules="[rules.required]"
                                validate-on="submit"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="2">
                            <div class="text-subtitle-1 text-medium-emphasis">Designation*</div>
                            <v-text-field
                                density="compact"
                                variant="outlined"
                                v-model="form[i].designation"
                                :rules="[rules.required]"
                                validate-on="submit"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="2">
                            <div class="text-subtitle-1 text-medium-emphasis">Gross Salary*</div>
                            <v-text-field
                                density="compact"
                                variant="outlined"
                                v-model="form[i].salary"
                                :rules="[rules.required]"
                                validate-on="submit"
                            ></v-text-field>
                        </v-col>
                        <!-- delete button -->
                        <v-col cols="12" sm="1">
                            <v-btn icon="mdi-trash-can" color="red" size="small" class="mt-6" @click="deleteRow(i)">
                            </v-btn>
                        </v-col>
                    </v-row>
                    <!-- Add button -->
                    <div class="text-center">
                        <v-btn
                        color="red"
                        class="mx-2 mb-6"
                        @click="addRow"
                        >
                            Add
                            <v-icon
                            end
                            icon="mdi-plus-circle">
                            </v-icon>
                        </v-btn>
                    </div>
                    <!-- end -->

                    <!-- Row 4 button -->
                    <v-row>
                        <v-btn
                        color="primary"
                        class="mx-2 mb-6"
                        name="submitbtn"
                        id="submitbtnn"
                        type="submit"
                        >
                            save
                        </v-btn>
                    </v-row>
                </v-form>
            </v-sheet>
        </v-container>
    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
    import { Inertia } from '@inertiajs/inertia'
    import { useForm } from '@inertiajs/inertia-vue3'
    import axios from 'axios';


    export default {
        components: {
            CrsLayout
        },
          props: {
            datas: Object
        },
        data () {
            return {
                form: [
                    {start: '', end: '', institution: '', designation: '', salary: '', id:'', user_id:1},
                ],
                rules: {
                    required: value => !!value || 'Required.',
                },
            }
        },
        // mounted(){
        //     //remove empty array if data from DB is present
        //     if(this.datas.length>=1){
        //         this.form.shift();
        //         //this.form.splice(0, 1);
        //     };
        //     this.datas.forEach((element, index, array) => {
        //         this.form.push(element)
        //     });
        // },
        watch: {
            datas:  {
                handler(newValue){
                    if(newValue.length>=1){
                        //remove empty array if data from DB is present
                        this.form.shift();
                        newValue.forEach((element, index, array) => {
                            this.form.push(element)
                        });
                    };
                },
                immediate: true
            }
        },

        methods: {
            saveData() {
                Inertia.post('/historysave', this.form)
				//this.form.post(this.route('kinsave'))
                //console.log(this.form)
            },
            addRow(){
                this.form.push({start: '', end: '', institution: '', designation: '', salary: '', id:''});
            },
            deleteRow(key){

                // const isEmpty = Object.values(this.form[key]).every(x => x === '');
                //console.log(this.form[key].id);

				//first check if array is null and more than one array is available
				// if(Object.values(this.form[key]).every(x => x === '') && this.form.length>=1){
				// 		this.form.splice(key, 1);

				// // }
				// if(this.form.length>=1){
				// 	this.form.splice(key, 1);
				// };

                if(this.form[key].id === '' && this.form.length>=1){
                    this.form.splice(key, 1);
                    //console.log('splice array');
                }
                else{
                    //Inertia.get('/historydelete/{{this.form[key].id}}')
					//console.log('delete from db')
                    if(confirm("Are you sure you want to delete this record")){
                        axios.delete(`/historydelete/${this.form[key].id}`)
                          .then(response => console.log(response))
                          .catch(error => console.log)
                          this.form.splice(key, 1);
                    }
				}
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
