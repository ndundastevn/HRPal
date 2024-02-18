<template>
    <CrsLayout>
        <div class="text-body-2">
            <Link :href="route('hdashboard')" class="text-blue">Home</Link><span class="font-weight-light text-gray-2"> / SELECT JOB</span>
        </div>

         <!-- Alart -->
        <v-alert
        type="success"
        class="mb-4"
        density="comfortable"
        closable
        close-label="Close Alert"
        v-if="form.wasSuccessful"
        >
            Congratulations! You have successfuly applied for this position.
        </v-alert>

         <v-container class="bg-white mt-4 mb-12">
            <div class="font-weight-bold">KINDLY ENSURE YOU COMPLETE YOUR PROFILE BEFORE PROCESSEDING WITH APPLICATION</div>

            <v-row>
                <v-col cols="12" sm="4">
                    <v-table class="">
                        <thead>
                            <tr>
                                <th class="text-left">
                                Profile
                                </th>
                                <th class="text-left">
                                    <v-progress-circular
                                    :model-value="percentage"
                                    color="success"
                                    size="40"
                                    >
                                    {{percentage}}
                                    </v-progress-circular>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                            v-for="(result, i) in results"
                            :key="i"
                            >
                                <td>{{result.name}}</td>
                                <td>
                                     <v-badge
                                    :color="result.value ? 'blue' : 'red'"
                                    :icon="result.value ? 'mdi-check' : 'mdi-alpha-x'"
                                    ></v-badge>
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </v-col>
                <v-col cols="12" sm="8" class="pt-6">
                    <div class="text-subtitle-1 text-medium-emphasis">Select Job*</div>
                    <v-select
                    v-model="form.job_id"
                    variant="outlined"
                    density="compact"
                    :rules="[rules.required]"
                    :items="['12 Months Graduate Training Program, January – December 2024']"
                    item-title="name"
                    item-value="id"
                    :error="form.errors.job_id"
                    :error-messages="form.errors.job_id"
                    @click="form.clearErrors('job_id')"
                    name="job_id"
                    >
                    </v-select>

                    <div class="text-subtitle-1 text-medium-emphasis">Cover Letter*</div>
                    <v-textarea
                    variant="outlined"
                    density="compact"
                    :rules="[rules.required]"
                    v-model="form.cover_letter"
                    :error="form.errors.cover_letter"
                    :error-messages="form.errors.cover_letter"
                    @click="form.clearErrors('cover_letter')"
                    name="cover_letter"
                    ></v-textarea>

                    <div class="">
                        <v-btn
                        color="primary"
                        class="mb-6"
                        :disabled="status"
                        @click="submitData"
                        >
                            Submit
                        </v-btn>
                    </div>
                </v-col>
            </v-row>

        </v-container>
    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
   	import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            CrsLayout,
            Link
        },
        props: {
            results: Object,
            percentage: Number,
            status: Boolean,
            jobs: Object

        },
        data () {
            return {
                complete: true,
                select: '',
                form: this.$inertia.form({
                    job_id: '',
                    cover_letter: ''
                }),
                rules: {
                    required: value => !!value || 'Required.',
                }
            }
        },
        methods: {
            submitData(){
                if(confirm("Please ensure you have added a cover leter before proceding. Are you sure you want to apply for this job?")){
                    this.form.post(this.route('apply.save'))
                }
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
