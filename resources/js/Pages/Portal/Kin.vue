<template>
    <CrsLayout>
        <div class="text-body-2 mb-4">
            <span class="text-blue">STEP SIX</span> / Family Details
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
            <div class="font-weight-bold">NEXT OF KIN DATA</div>
            <div class="font-weight-light pt-4 pb-20">Please fill in the required fields with next of kin or family member.</div>
            <v-sheet>
                <!-- Row 1 -->
                <v-row>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Full Name*</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.name"
                            name="name"
                            :rules="[rules.required]"
                            :error="form.errors.name"
                            :error-messages="form.errors.name"
                            @click="form.clearErrors('name')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Gender*</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                             v-model="form.gender"
                            name="gender"
                            :rules="[rules.required]"
                            :error="form.errors.gender"
                            :error-messages="form.errors.gender"
                            @click="form.clearErrors('gender')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Place of Residence*</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                             v-model="form.residence"
                            name="residence"
                            :rules="[rules.required]"
                            :error="form.errors.residence"
                            :error-messages="form.errors.residence"
                            @click="form.clearErrors('residence')"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <!-- Row 2 -->
                <v-row>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Relationship*</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                             v-model="form.relationship"
                            name="relationship"
                            :rules="[rules.required]"
                            :error="form.errors.relationship"
                            :error-messages="form.errors.relationship"
                            @click="form.clearErrors('relationship')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Phone Number*</div>
                         <v-text-field
                            density="compact"
                            variant="outlined"
                             v-model="form.phone"
                            name="phone"
                            :rules="[rules.required]"
                            :error="form.errors.phone"
                            :error-messages="form.errors.phone"
                            @click="form.clearErrors('phone')"
                        ></v-text-field>
                    </v-col>
                </v-row>

                <!-- Row 4 -->
                <v-row>
                    <v-btn
                    color="primary"
                    class="mx-2 mb-6"
                     @click="saveData"
                    :disabled="form.processing"
                    >
                        Save
                    </v-btn>
                    <!-- next button -->
                    <v-btn
                    class="mx-2 mb-6"
                    >
                        <Link :href="route('referee')">Next</Link>
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
            kin: Object
        },
        data () {
            return {
                form: this.$inertia.form({
                    name: '',
                    gender: '',
                    relationship: '',
                    phone: '',
                    residence: ''
                }),
                rules: {
                    required: value => !!value || 'Required.',
                }
            }
        },

        methods: {
            saveData() {
				this.form.post(this.route('kin.save'))
                console.log(this.form)
            },

        },

         watch: {
            kin: {
                handler(newValue){
                    if(newValue != null){
                        this.form.name= newValue.name
                        this.form.residence= newValue.residence
                        this.form.phone= newValue.phone
                        this.form.gender= newValue.gender
                        this.form.relationship= newValue.relationship
                    }
                },
                immediate: true
            },
        },

    }
</script>

<style lang="scss" scoped>

</style>
