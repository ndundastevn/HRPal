<template>
    <CrsLayout>
    <v-container class="">


        <v-card class="px-4 py-4 text-bold">
            <v-img
            :width="200"

            src="img/Apex.png"
            ></v-img>
            <ul style="font-weight: bold">
                <li>{{user.name}}</li>
                <li>{{user.email}}</li>
                <li>{{contact.phone1}}</li>
                <li>{{contact.address}}</li>
                <li>{{contact.town}}</li>
            </ul>
        </v-card>

        <!-- Personal details -->
        <v-card class="my-2">
            <v-table density="compact">
                <thead>
                    <tr>
                        <th class="text-left text-blue">
                        Personal Data
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full Name</td>
                        <td>{{profile.f_name}} {{profile.s_name}} {{profile.sername}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{profile.gender}}</td>
                    </tr>
                    <tr>
                        <td>Year of Birth</td>
                        <td>{{profile.yob}}</td>
                    </tr>
                    <tr>
                        <td>Civil Status</td>
                        <td>{{profile.civil_status}}</td>
                    </tr>
                    <tr>
                        <td>County</td>
                        <td>{{profile.county}}</td>
                    </tr>
                    <tr>
                        <td>Ethinicity</td>
                        <td>{{profile.ethinicity}}</td>
                    </tr>
                    <tr>
                        <td>Disability</td>
                        <td>{{profile.disability}}</td>
                    </tr>
                    <tr>
                        <td>Nature of Disability</td>
                        <td>{{profile.d_nature}}</td>
                    </tr>
                </tbody>
            </v-table>
        </v-card>

        <!-- Education -->
        <v-card class="my-2">
            <p class="my-4 mx-4 text-blue text-h6">Education Details</p>
            <v-table density="compact">
                <thead>
                    <tr>
                        <th class="text-left">
                            Name of Institution
                        </th>
                        <th>
                            Certificate Obtained
                        </th>
                        <th>
                            Level
                        </th>
                        <th>
                            Year Ended
                        </th>
                        <th>
                            Highest
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                    v-for="education in educations"
                    :key="education.id"
                    >
                        <td>{{education.institution}}</td>
                        <td>{{education.certificate}}</td>
                        <td>{{education.level}}</td>
                        <td>{{education.y_ended}}</td>
                        <td>{{education.Highest}}</td>
                    </tr>

                </tbody>
            </v-table>
        </v-card>

         <!-- Employment details -->
        <v-card class="my-2">
            <v-table density="compact">
                <thead>
                    <tr>
                        <th class="text-left text-blue">
                        Current Employment
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Employer</td>
                        <td>{{works.employer}}</td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>{{works.position}}</td>
                    </tr>
                    <tr>
                        <td>Date of Apointment</td>
                        <td>{{works.doa}}</td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>{{works.position}}</td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td>{{works.salary}}</td>
                    </tr>

                </tbody>
            </v-table>
        </v-card>

        <!-- Work Experince -->
        <v-card class="my-2">
            <p class="my-4 mx-4 text-blue text-h6">Work Experience</p>
            <v-table density="compact">
                <thead>
                    <tr>
                        <th class="text-left">
                            Name of Institution
                        </th>
                        <th>
                            Designation
                        </th>
                        <th>
                            Year Started
                        </th>
                        <th>
                            Year Ended
                        </th>
                        <th>
                            Salary
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                    v-for="experience in experiences"
                    :key="experience.id"
                    >
                        <td>{{experience.institution}}</td>
                        <td>{{experience.designation}}</td>
                        <td>{{experience.start}}</td>
                        <td>{{experience.end}}</td>
                        <td>{{experience.salary}}</td>
                    </tr>

                </tbody>
            </v-table>
        </v-card>

         <!-- Next of kin details -->
        <v-card class="my-2">
            <v-table density="compact">
                <thead>
                    <tr>
                        <th class="text-left text-blue">
                        Next of Kin
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full Name</td>
                        <td>{{kin.name}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{kin.gender}}</td>
                    </tr>
                    <tr>
                        <td>Relationship</td>
                        <td>{{kin.relationship}}</td>
                    </tr>
                    <tr>
                        <td>Place of Residence</td>
                        <td>{{kin.residence}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{kin.phone}}</td>
                    </tr>

                </tbody>
            </v-table>
        </v-card>

         <!-- Referees -->
        <v-card class="my-2">
            <p class="my-4 mx-4 text-blue text-h6">Referees Details</p>
            <v-table density="compact">
                <thead>
                    <tr>
                        <th class="text-left">
                            Full Name
                        </th>
                        <th>
                            Occupation
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Phone Number
                        </th>
                        <th>
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                    v-for="referee in referees"
                    :key="referee.id"
                    >
                        <td>{{referee.name}}</td>
                        <td>{{referee.occupation}}</td>
                        <td>{{referee.company}}</td>
                        <td>{{referee.address}}</td>
                        <td>{{referee.email}}</td>
                        <td>{{referee.phone}}</td>
                    </tr>
                </tbody>
            </v-table>
        </v-card>

        <!-- Apply button -->
        <v-card class="my-2 text-center">
            <v-btn
                    append-icon="mdi-arrow-right-circle"
                    class="my-6"
                    color="green"
                    >
                        <Link :href="route('apply')">Apply For A Job</Link>
            </v-btn>
        </v-card>
    </v-container>
    </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3';


    export default {
        props: {
            user: Object,
            profile: Object,
            educations: Object,
            contact: Object,
            works: Object,
            experiences: Object,
            kin: Object,
            referees: Object
        },

        components: {
            CrsLayout,
            Link
        },
    }
</script>


<style scoped>

</style>
