<template>
    <CrsLayout>
        <div class="text-body-2 mb-4">
            <span class="text-blue">STEP FOUR</span> / Employment Details
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
            <div class="font-weight-bold">EMPLOYMENT DETAILS</div>
            <div class="font-weight-light pt-4 pb-20">Please fill in the required fields.</div>
            <div class="text-primary">
                <v-checkbox
                label="CHECK HERE IF YOU ARE NOT CURRENTLY EMPLOYED, THEN CLICK SAVE"
                v-model="form.not_employed"
                >
                </v-checkbox>
            </div>
            <v-sheet>
                <!-- row 1 -->
                <v-row>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Current Employer</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.employer"
                            name="employer"
                            :rules="[rules.required]"
                            :error="form.errors.employer"
                            :error-messages="form.errors.employer"
                            @click="form.clearErrors('employer')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Position Held</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.position"
                            name="position"
                            :rules="[rules.required]"
                            :error="form.errors.position"
                            :error-messages="form.errors.position"
                            @click="form.clearErrors('position')"
                        ></v-text-field>
                    </v-col>
                </v-row>

                <!-- row 2 -->
                <v-row>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Date of Appointment(yyyy-mm-dd)</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                            placeholder="yyyy-mm-dd"
                            v-model="form.doa"
                            name="doa"
                            :rules="[rules.required]"
                            :error="form.errors.doa"
                            :error-messages="form.errors.doa"
                            @click="form.clearErrors('doa')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Gross Salary</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.salary"
                            name="salary"
                            :rules="[rules.required]"
                            :error="form.errors.salary"
                            :error-messages="form.errors.salary"
                            @click="form.clearErrors('salary')"
                        ></v-text-field>
                    </v-col>
                </v-row>

                <v-row>
                    <!-- save button -->
                    <v-btn
                    color="primary"
                    class="mx-2 mb-6"
                    @click="saveData"
                    :disabled="form.processing"
                    >
                        Submit
                    </v-btn>
                    <!-- next button -->
                    <v-btn
                    class="mx-2 mb-6"
                    >
                        <Link :href="route('history')">Next</Link>
                    </v-btn>
                </v-row>
            </v-sheet>
        </v-container>


    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            CrsLayout,
            Link
        },
        props: {
            data: Object
        },
        data () {
            return {
                form: this.$inertia.form({
                    not_employed: false,
                    employer: '',
                    position: '',
                    doa: '',
                    salary: '',
                }),
                rules: {
                    required: value => !!value || 'Required.',
                }
            }
        },
        watch: {
            data: {
                handler(newValue){
                    if(newValue != null){
                        this.form.not_employed = newValue.not_employed
                        this.form.employer = newValue.employer
                        this.form.position = newValue.position
                        this.form.doa = newValue.doa
                        this.form.salary = newValue.salary
                    }
                },
                immediate: true
            },
        },

        methods: {
            saveData() {
                console.log(this.form)
				this.form.post(this.route('empsave'))
            },

        },

    }
</script>

<style lang="scss" scoped>

</style>
