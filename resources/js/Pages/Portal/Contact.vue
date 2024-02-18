<template>
    <CrsLayout>
        <div class="text-body-2 mb-4">
            <span class="text-blue">STEP THREE</span> / Contact Details
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
            <div class="font-weight-bold">CONTACT DETAILS</div>
            <div class="font-weight-light pt-4 pb-4">Please fill in the required fields.</div>
            <v-sheet>
                <!-- Row 1 -->
                <v-row>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Email Address*</div>
                         <v-text-field
                            density="compact"
                            prepend-inner-icon="mdi-email-outline"
                            variant="outlined"
                            disabled
                            v-model="form.email"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Postal Address&Code*</div>
                         <v-text-field
                            density="compact"
                            prepend-inner-icon="mdi-book-outline"
                            variant="outlined"
                            v-model="form.address"
                            name="address"
                            :rules="[rules.required]"
                            :error="form.errors.address"
                            :error-messages="form.errors.address"
                            @click="form.clearErrors('address')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Town*</div>
                         <v-text-field
                            density="compact"
                            prepend-inner-icon="mdi-map-marker"
                            variant="outlined"
                            v-model="form.town"
                            name="town"
                            :rules="[rules.required]"
                            :error="form.errors.town"
                            :error-messages="form.errors.town"
                            @click="form.clearErrors('town')"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <!-- Row 2 -->
                <v-row>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Phone Number*</div>
                         <v-text-field
                            density="compact"
                            prepend-inner-icon="mdi-phone"
                            variant="outlined"
                            v-model="form.phone1"
                            name="phone1"
                            :rules="[rules.required]"
                            :error="form.errors.phone1"
                            :error-messages="form.errors.phone1"
                            @click="form.clearErrors('phone1')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Alternative Phone Number*</div>
                         <v-text-field
                            density="compact"
                            prepend-inner-icon="mdi-phone-plus"
                            variant="outlined"
                            v-model="form.phone2"
                            name="phone2"
                            :rules="[rules.required]"
                            :error="form.errors.phone2"
                            :error-messages="form.errors.phone2"
                            @click="form.clearErrors('phone2')"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <!-- Row 3 -->
                <v-row>
                    <v-col cols="12" sm="6">
                        <div class="text-subtitle-1 text-medium-emphasis">Place of Residence*</div>
                         <v-text-field
                            density="compact"
                            prepend-inner-icon="mdi-map-marker"
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
                    <v-btn
                    class="mx-2 mb-6"
                    >
                        <Link :href="route('education')">Next</Link>
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
            contact: Object,
            email: String
        },
        data () {
            return {
                form: this.$inertia.form({
                    email: '',
                    address: '',
                    town: '',
                    phone1: '',
                    phone2: '',
                    residence: '',
                }),
                rules: {
                    required: value => !!value || 'Required.',
                }
            }
        },
        mounted() {
            this.form.email = this.email
            if(this.contact != null){
                this.form.address = this.contact.address
                this.form.town = this.contact.town
                this.form.phone1 = this.contact.phone1
                this.form.phone2 = this.contact.phone2
                this.form.residence = this.contact.residence
            }
        },
        methods: {
            saveData() {
				this.form.post(this.route('contactsave'))
            },

        },

    }
</script>

<style lang="scss" scoped>

</style>
