<template>
    <CrsLayout>
        <!-- Welcome -->
       <div class="text-h4 pa-2">Welcome to Your Dashboard</div>
        <!-- End welcome -->

        <!-- My Applicatons -->
        <v-card
        width=""
        v-if="applied_job"
        >
            <v-row>
                <v-col cols="8" offset="2" sm="3" offset-sm="0" class="text-center order-last order-sm-first">
                    <v-img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEtBt85yQokwcXzHiRoe8XYgLboamPRgbyvA&usqp=CAU"
                    >
                    </v-img>
                </v-col>
                <v-col cols="12" sm="9">
                    <v-card-item>
                        <v-card-title>12 Months Graduate Training Program, January – December 2024 </v-card-title>
                        <v-card-subtitle>
                            <v-chip append-icon="mdi-check-all" color="green">
                                Submited
                            </v-chip>
                        </v-card-subtitle>
                    </v-card-item>

                    <v-card-text>
                        <v-timeline
                        side="end"
                        align="start"
                        direction="horizontal"
                        line-thickness="5"
                        truncate-line="end"
                        line-inset="5"
                        >
                            <v-timeline-item
                            dot-color="success"
                            size="small"
                            icon="mdi-check"
                            fill-dot
                            >
                                <strong class="me-4">Application</strong>
                            </v-timeline-item>

                            <v-timeline-item
                            dot-color="grey"
                            size="small"
                            >
                                <strong class="me-4">Review</strong>
                            </v-timeline-item>

                            <v-timeline-item
                            dot-color="grey"
                            size="small"
                            >
                                <strong class="me-4">Interview</strong>
                            </v-timeline-item>

                            <v-timeline-item
                            dot-color="grey"
                            size="small"
                            >
                                <strong class="me-4">Offer</strong>
                            </v-timeline-item>
                        </v-timeline>
                    </v-card-text>
                </v-col>
            </v-row>
        </v-card>

        <!-- New job vacancies Table -->
        <v-container class="bg-white mt-2">
            <v-sheet color="gray-lighten-3" class="font-weight-bold">
                INTERNSHIP JOB VACANCIES, DEGREE / DIPLOMA
            </v-sheet>
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
        </v-container>
        <!-- End New job vacancies -->

        </CrsLayout>
</template>

<script>
    import CrsLayout from '@/Layouts/CrsLayout.vue';

    export default {
        components: {
            CrsLayout
        },
        props: {
            jobs: Array,
            applied_job: Object
        },
        data () {
            return {
                elevations: [6, 12, 18],
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
