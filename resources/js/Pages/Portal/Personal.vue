<template>
    <CrsLayout>
        <div class="text-body-2 mb-4">
            <span class="text-blue">STEP TWO</span> / Personal Details
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
            <div class="font-weight-bold">PERSONAL DETAILS</div>
            <div class="font-weight-light pt-4 pb-4">Please fill in the required fields.</div>
            <v-sheet>
                <v-row>
                    <v-col cols="12" sm="3">
                        <div class="text-subtitle-1 text-medium-emphasis">Title</div>
                         <v-text-field
                            density="compact"
                            placeholder="Mr."
                            prepend-inner-icon="mdi-account"
                            variant="outlined"
                            v-model="form.title"
                            name="title"
                            :rules="[rules.required]"
                            :error="form.errors.title"
                            :error-messages="form.errors.title"
                            @click="form.clearErrors('title')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <div class="text-subtitle-1 text-medium-emphasis">First Name*</div>
                         <v-text-field
                            v-model="form.f_name"
                            density="compact"
                            prepend-inner-icon="mdi-account"
                            variant="outlined"
                            :rules="[rules.required]"
                            :error="form.errors.f_name"
                            :error-messages="form.errors.f_name"
                            @click="form.clearErrors('f_name')"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <div class="text-subtitle-1 text-medium-emphasis">Second Name*</div>
                         <v-text-field
                            v-model="form.s_name"
                            density="compact"
                            prepend-inner-icon="mdi-account"
                            variant="outlined"
                            :rules="[rules.required]"
                            :error="form.errors.s_name"
                            :error-messages="form.errors.s_name"
                            @click="form.clearErrors('s_name')"
                            name="s_name"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <div class="text-subtitle-1 text-medium-emphasis">Sername*</div>
                         <v-text-field
                            v-model="form.sername"
                            density="compact"
                            prepend-inner-icon="mdi-account"
                            variant="outlined"
                            :rules="[rules.required]"
                            :error="form.errors.sername"
                            :error-messages="form.errors.sername"
                            @click="form.clearErrors('sername')"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-sheet>
        </v-container>

        <v-container class="bg-white mt-2">
            <v-sheet>
                <!-- row 1 -->
                <v-row>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Gender*</div>
                        <v-select
                        v-model="form.gender"
                        density="compact"
                        prepend-inner-icon="mdi-account-child"
                        variant="outlined"
                        :items="['Male', 'Female']"
                        :rules="[rules.required]"
                        :error="form.errors.gender"
                        :error-messages="form.errors.gender"
                        @click="form.clearErrors()"
                        name="gender"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Civil Status*</div>
                        <v-select
                        v-model="form.civil_status"
                        density="compact"
                        prepend-inner-icon="mdi-account-multiple-outline"
                        variant="outlined"
                        :items="['Single', 'Married', 'Devorced', 'Widowed', 'Separated']"
                        :rules="[rules.required]"
                        :error="form.errors.civil_status"
                        :error-messages="form.errors.civil_status"
                        @click="form.clearErrors()"
                        name="status"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Year of Birth(yyyy-mm-dd)*</div>
                        <v-text-field
                        v-model="form.yob"
                        density="compact"
                        prepend-inner-icon="mdi-calendar-range"
                        variant="outlined"
                        placeholder="1995-12-31"
                        type="text"
                        :rules="[rules.required]"
                        :error="form.errors.yob"
                        :error-messages="form.errors.yob"
                        @click="form.clearErrors()"
                        name="yob"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <!-- row 2 kenyan nationality -->
                <v-row v-if="form.nationality">
                    <v-col cols="12" sm="4">
                        <v-checkbox
                        v-model="form.nationality"
                        color="success"
                        label="Are You A Kenyan Citizen"
                        ></v-checkbox>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">County*</div>
                        <v-select
                        v-model="form.county"
                        density="compact"
                        variant="outlined"
                        :items="counties"
                        type="text"
                        :rules="[rules.required]"
                         :error="form.errors.county"
                            :error-messages="form.errors.county"
                        @click="form.clearErrors('county')"
                        name="county"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" sm="4">
                       <div class="text-subtitle-1 text-medium-emphasis">Ethinicity*</div>
                        <v-text-field
                        v-model="form.ethinicity"
                        density="compact"
                        variant="outlined"
                        type="text"
                        :rules="[rules.required]"
                         :error="form.errors.ethinicity"
                            :error-messages="form.errors.ethinicity"
                            @click="form.clearErrors('ethinicity')"
                        name="ethinicity"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <!-- row 2 non kenyan nationality -->
                <v-row v-if="!form.nationality">
                    <v-col cols="12" sm="4">
                        <v-checkbox
                        v-model="form.nationality"
                        color="success"
                        label="Are You A Kenyan Citizen"
                        ></v-checkbox>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">Country*</div>
                        <v-select
                        v-model="form.country"
                        density="compact"
                        variant="outlined"
                        type="text"
                        :items="countries"
                        :rules="[rules.required]"
                         :error="form.errors.country"
                        :error-messages="form.errors.country"
                        @click="form.clearErrors('country')"
                        name="country"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" sm="4">
                       <div class="text-subtitle-1 text-medium-emphasis">Nationality*</div>
                        <v-text-field
                        v-model="form.nationality2"
                        density="compact"
                        variant="outlined"
                        type="text"
                        :rules="[rules.required]"
                         :error="form.errors.nationality2"
                        :error-messages="form.errors.nationality2"
                        @click="form.clearErrors('nation')"
                        name="nation"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <!-- row 3 Disability -->
                <v-row>
                    <v-col cols="12" sm="4">
                       <v-checkbox
                        v-model="form.disability"
                        color="success"
                        label="Check Here If You Have a Disability"
                        ></v-checkbox>
                    </v-col>
                    <v-col cols="12" sm="4">
                        <div class="text-subtitle-1 text-medium-emphasis">If Yes, Nature of Disability</div>
                        <v-text-field
                        v-model="form.d_nature"
                        density="compact"
                        variant="outlined"
                        type="text"
                        :error="form.errors.d_nature"
                        :error-messages="form.errors.d_nature"
                        @click="form.clearErrors('dis')"
                        name="dis"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="4">
                         <div class="text-subtitle-1 text-medium-emphasis">IF Yes, Disability Registration Details</div>
                        <v-text-field
                        v-model="form.d_registration"
                        density="compact"
                        variant="outlined"
                        type="text"
                        :error="form.errors.d_registration"
                        :error-messages="form.errors.d_registration"
                        @click="form.clearErrors('disno')"
                        name="disno"
                        ></v-text-field>
                    </v-col>
                </v-row>
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
                        <Link :href="route('contact')">Next</Link>
                    </v-btn>

                </v-row>
            </v-sheet>
        </v-container>
    </CrsLayout>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import CrsLayout from '@/Layouts/CrsLayout.vue';

    export default {
        components: {
            CrsLayout,
            Link
        },
        props: {
            info : Object
        },
        data () {
            return {
                enabled: true,

                form: this.$inertia.form({
                    user_id: '',
                    title: '',
                    f_name: '',
                    s_name: '',
                    sername: '',
                    gender: '',
                    civil_status: '',
                    yob: '',
                    nationality: true,
                    country: '',
                    nationality2: '',
                    county: '',
                    ethinicity: '',
                    disability: true,
                    d_nature: '',
                    d_registration: '',
                }),
                rules: {
                    required: value => !!value || 'Required.',
                    email: value => {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return pattern.test(value) || 'Invalid e-mail.'
                    },
                },
                countries: [],
                counties: ["Mombasa", "Kwale", "Kilifi", "Tana-River",
                    "Lamu",
                    "Taita-Taveta",
                    "Garissa",
                    "Wajir",
                    "Mandera",
                    "Marsabit",
                    "Isiolo",
                    "Meru",
                    "Tharaka-Nithi",
                    "Embu",
                    "Kitui",
                    "Machakos",
                    "Makueni",
                    "Nyandarua",
                    "Nyeri",
                    "Kirinyaga",
                    "Muranga",
                    "Kiambu",
                    "Turkana",
                    "West-Pokot",
                    "Samburu",
                    "Trans-Nzoia",
                    "Uasin-Gishu",
                    "Elgeyo-Marakwet",
                    "Nandi",
                    "Baringo",
                    "Laikipia",
                    "Nakuru",
                    "Narok",
                    "Kajiado",
                    "Kericho",
                    "Bomet",
                    "Kakamega",
                    "Vihiga",
                    "Bungoma",
                    "Busia",
                    "Siaya",
                    "Kisumu",
                    "Homa-Bay",
                    "Migori",
                    "Kisii",
                    "Nyamira",
                    "Nairobi",
                ]
            }
        },
        methods: {
            saveData() {
				this.form.post(this.route('personalinfosave'))
            },
            async getCounties(){
                const response = await fetch('https://restcountries.com/v3.1/all?fields=name');
                const data = await response.json();
                this.countries = data.map(item => item.name.common).sort()
            }

        },
        mounted() {
            if(this.info != null){
                this.form.title = this.info.title
                this.form.f_name = this.info.f_name
                this.form.s_name = this.info.s_name
                this.form.sername = this.info.sername
                this.form.gender = this.info.gender
                this.form.civil_status = this.info.civil_status
                this.form.country = this.info.country
                this.form.county = this.info.county
                this.form.ethinicity = this.info.ethinicity
                this.form.nationality = this.info.nationality
                this.form.nationality2 = this.info.nationality2
                this.form.disability = this.info.disability
                this.form.d_nature = this.info.d_nature
                this.form.d_registration = this.info.d_registration
                this.form.yob = this.info.yob
            }else{
                console.log("no data")
            };

            this.getCounties();

        }
    }
</script>

<style lang="scss" scoped>

</style>
