<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Appex" />
  <v-app id="inspire">
    <v-app-bar
    color="primary"
    density="compact"
    >
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-app-bar-title>Appex Center</v-app-bar-title>

      <v-spacer></v-spacer>

        <!-- <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>

        <v-btn icon>
          <v-icon>mdi-account-arrow-right-outline</v-icon>
        </v-btn> -->


        <!-- Login btn -->
        <div v-if="canLogin" class="mr-4 text-white text-h6">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                >Dashboard</Link
            >
            <template v-else>
                <div v-if="canLogin">
                    <Link
                    :href="route('login')"
                    >
                        Login
                    </Link>

                    <!-- <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="tw-ml-4 tw-text-sm tw-text-gray-700 dark:tw-text-gray-500 tw-underline"
                        >Register</Link
                    > -->
                </div>
            </template>
        </div>
    </v-app-bar>

    <v-main>
      <v-container>
        <v-img
        height="200"
        aspect-ratio="1/1"
        cover
        src="https://t4.ftcdn.net/jpg/03/95/54/17/360_F_395541762_ApCQdlQnknsyD6czpIhkLSCs6chc6Ye7.jpg"
        ></v-img>

        <v-card class="my-4">
            <div class="text-center text-h4 pt-4 pl-4 text-capitalize text-purple-darken-4 font-weight-bold">
                Job Advert For 12 Months Graduate Training Program, January – December 2024
            </div>
            <div class="mx-2 my-4 text-grey-darken-2">
                Apex is a institution of higher learning that provides technology training to accelerate the career
                trajectory of young Africans.
                By equipping them with practical and technical skills, we help them thrive in today's digital economy.
                In support of the Government’s Youth Initiative to develop a pool of young talent for the Kenyan Labour
                Market, Apex Center is seeking applications from fresh Bachelor’s Degree and Diploma graduates for its
                January to December 2024 Internship Program. Applicants must demonstrate diligence, commitment and a positive attitude.
            </div>
            <!-- Part 1 -->
            <div class="text-h4 pt-4 pl-4 text-capitalize text-purple-darken-4 font-weight-bold">
                1. Bachelor’s Degree Graduates Positions (January 2024)
            </div>
            <div class="mx-2 my-4 text-grey-darken-2">
                We seek to engage qualified Bachelor’s degree graduates for a 12 months internship program, performance-based renewable contract for the positions listed below.
            </div>
            <v-table class="px-4">
                <thead>
                <tr class="font-weight-bold">
                    <th class="text-left">
                    No. #
                    </th>
                    <th class="text-left">
                    Job Cadre
                    </th>
                    <th class="text-left">
                    Job Gade
                    </th>
                    <th class="text-left">
                    Referees Code
                    </th>
                    <th class="text-left">
                    No. of Positions
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                >
                    <td>1</td>
                    <td>Finance</td>
                    <td>Intern</td>
                    <td>RH2444/24</td>
                    <td>5</td>

                </tr>
                <tr
                >
                    <td>2</td>
                    <td>Economics</td>
                    <td>Intern</td>
                    <td>RH2445/24</td>
                    <td>5</td>

                </tr>
                <tr
                >
                    <td>3</td>
                    <td>Supply Chain Management</td>
                    <td>Intern</td>
                    <td>RH2446/24</td>
                    <td>5</td>
                </tr>
                <tr
                >
                    <td>4</td>
                    <td>Human Resource Management</td>
                    <td>Intern</td>
                    <td>RH2447/24</td>
                    <td>6</td>
                </tr>
                <tr
                >
                    <td>5</td>
                    <td>ICT</td>
                    <td>Intern</td>
                    <td>RH2448/24</td>
                    <td>6</td>
                </tr>
                <tr
                >
                    <td>6</td>
                    <td>Marketing & Communication</td>
                    <td>Intern</td>
                    <td>RH2449/24</td>
                    <td>5</td>
                </tr>

                </tbody>
            </v-table>

            <!-- Part 2 -->
            <div class="text-h4 pt-4 pl-4 text-capitalize text-purple-darken-4 font-weight-bold">
                2. Diploma graduates Positions (January 2024)
            </div>
            <div class="mx-2 my-4 text-grey-darken-2">
                We seek to engage qualified Diploma graduates for a 12 months internship program, performance-based renewable contract for the positions listed below.
            </div>
            <v-table class="px-4">
                <thead>
                <tr class="font-weight-bold">
                    <th class="text-left">
                    No. s
                    </th>
                    <th class="text-left">
                    Job Cadre
                    </th>
                    <th class="text-left">
                    Job Gade
                    </th>
                    <th class="text-left">
                    Referees Code
                    </th>
                    <th class="text-left">
                    No. of Positions
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                >
                    <td>1</td>
                    <td>Finance</td>
                    <td>Intern</td>
                    <td>RHY444/24</td>
                    <td>5</td>

                </tr>
                <tr
                >
                    <td>2</td>
                    <td>Economics</td>
                    <td>Intern</td>
                    <td>RHY445/24</td>
                    <td>5</td>

                </tr>
                <tr
                >
                    <td>3</td>
                    <td>Supply Chain Management</td>
                    <td>Intern</td>
                    <td>RHY446/24</td>
                    <td>5</td>
                </tr>
                <tr
                >
                    <td>4</td>
                    <td>Human Resource Management</td>
                    <td>Intern</td>
                    <td>RHY447/24</td>
                    <td>6</td>
                </tr>
                <tr
                >
                    <td>5</td>
                    <td>ICT</td>
                    <td>Intern</td>
                    <td>RHY448/24</td>
                    <td>6</td>
                </tr>
                <tr
                >
                    <td>6</td>
                    <td>Marketing & Communication</td>
                    <td>Intern</td>
                    <td>RHY449/24</td>
                    <td>5</td>
                </tr>

                </tbody>
            </v-table>

            <!-- Oline Applicaion  -->
            <div class="text-h4 pt-4 pl-4 text-capitalize text-purple-darken-4 font-weight-bold">
                Online Application
            </div>
            <div class="mx-2 my-4 text-grey-darken-2">
               If your background and competencies match the specifications of the above-described positions, please apply online via <a href="careers.ndundastevn.tech"> Apex online career portal</a>
               by regestering and submiting your application.
               Clearly indicate the Job Reference No. i.e. JOB APPLICATION – [JOB/ CADRE REFERENCE NUMBER] as the subject of your application.
            </div>
            <!-- Pysical Applicaion  -->
            <div class="text-h4 pt-4 pl-4 text-capitalize text-purple-darken-4 font-weight-bold">
                Physical Application
            </div>
            <div class="mx-2 my-4 text-grey-darken-2">
               Unfortunatily, we will not be accepting any physical application. Kindly login the online portal <a href="careers.ndundastevn.tech">here</a> to submit your application
            </div>

            <!-- disclaimer -->
            <div class="mx-2 my-4 text-grey-darken-2">
                <p>
                    The <strong>deadline</strong> for the receipt of all applications is <strong> 31st December 2023. </strong>
                </p>
                <p>
                <strong> Apex Center </strong> is an Equal Opportunity Employer <strong> YOUTH, WOMEN, AND PEOPLE LIVING WITH DISABILITY
                 ENCOURAGED TO APPLY. </strong>
                </p>
            </div>

            <div class="mx-2 my-4 text-grey-darken-2">
                <p>Requirements for engagement as an Intern:</p>
                <ol class="pt-4 pl-4">
                    <li>1. Must be a Kenyan Citizen aged between 20 and 35 years.</li>
                    <li>2. Must have graduated with a first Degree (undergraduate) or Diploma from a recognized institution</li>
                    <li>3. Must be available full time for the twelve months duration of the program.</li>

                </ol>
            </div>
            <div class="mx-2 my-4 text-grey-darken-2">
                <p>Please note:</p>
                <ol class="pt-4 pl-4">
                    <li>1. The deadline for application is Sunday, 31st December 2023.</li>
                    <li>2. All applications must be submitted online</li>
                    <li>3. Apex Center does not charge any fees for application.</li>
                    <li>4. Only shortlisted candidates will be contacted.</li>
                    <li>5. Incomplete applications will not be considered.</li>
                    <li>6. Monthly Stipend payable is 25,000 (Degree holder) and Kshs.18,000 (Diploma holder) and is subject to statutory deductions.</li>

                </ol>
            </div>
            <div class="mx-2 my-4 text-grey-darken-2 text-center font-weight-bold">
                Any form of canvassing will lead to immediate disqualification.<br/>
                Apex Center is an Equal Opportunity Employer.<br/>
                <v-btn
                color="success"
                class="my-4"
                :href="route('login')"
                append-icon="mdi-arrow-right-circle"
                >
                    Apply Now
                </v-btn>

            </div>
        </v-card>


      </v-container>
      <v-footer
      border
      color="grey-lighten-1"
      >
        <v-col class="text-center mt-2" cols="12">
        {{ new Date().getFullYear() }} — <strong>Appex Center</strong>
        </v-col>
      </v-footer>
    </v-main>
  </v-app>
</template>

<style scoped>

</style>
