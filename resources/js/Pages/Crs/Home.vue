<template>
    <CrsLayout>
        <!-- Welcome -->
        <v-container class="bg-white">
            <v-row>
                <v-col
                    cols="12"
                    sm="8"
                    class="text-h6"
                >
                    <v-sheet
                    class="pa-1"
                    color="grey-lighten-3"
                    >
                    Welcome to Your Dashboard
                    </v-sheet>
                </v-col>
                <v-col
                    cols="12"
                    sm="4"
                    class="text-h6"
                >
                    <v-sheet
                    class="pa-1"
                    color="grey-lighten-3"
                    >
                    Date and time
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
        <!-- End welcome -->

        <!-- New job vacancies Table -->
        <v-container class="bg-white mt-2">
            <v-sheet color="gray-lighten-3" class="font-weight-bold">
                NEW JOB VACANCIES
            </v-sheet>
            <v-table class="">
                <thead>
                    <tr>
                        <th class="text-left">
                        #
                        </th>
                        <th class="text-left">
                        REFERENCE ID
                        </th>
                        <th class="text-left">
                        JOB NAME
                        </th>
                        <th class="text-left">
                        DEADLINE
                        </th>
                        <th class="text-left">
                        POSITION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="item in applications"
                        :key="item.ca"
                    >
                        <td>{{ item.ca }}</td>
                        <td>{{ item.applicant }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.doa }}</td>
                        <td>{{ item.status }}</td>
                    </tr>
                </tbody>
            </v-table>
        </v-container>
        <!-- End New job vacancies -->

        <!-- My pplications Table -->
        <v-container class="bg-white mt-2">
            <v-sheet color="gray-lighten-3" class="font-weight-bold">
                ALL MY APPLICATIONS
            </v-sheet>
            <v-table class="">
                <thead>
                    <tr>
                        <th class="text-left">
                        #
                        </th>
                        <th class="text-left">
                        REFERENCE ID
                        </th>
                        <th class="text-left">
                        JOB NAME
                        </th>
                        <th class="text-left">
                        DEADLINE
                        </th>
                        <th class="text-left">
                        POSITION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="item in applications"
                        :key="item.ca"
                    >
                        <td>{{ item.ca }}</td>
                        <td>{{ item.applicant }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.doa }}</td>
                        <td>{{ item.status }}</td>
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
        data () {
            return {
                elevations: [6, 12, 18],
                applications: [
                    {
                        ca: 22,
                        applicant: 'john doe',
                        phone: 254799119338,
                        doa: '14-11-2022',
                        status: 'collected'
                    },
                    {
                        ca: 23,
                        applicant: 'john doe',
                        phone: 254799119338,
                        doa: '14-11-2022',
                        status: 'collected'
                    },
                    {
                        ca: 24,
                        applicant: 'john doe',
                        phone: 254799119338,
                        doa: '14-11-2022',
                        status: 'collected'
                    },
                    {
                        ca: 25,
                        applicant: 'john doe',
                        phone: 254799119338,
                        doa: '14-11-2022',
                        status: 'collected'
                    },
                ],
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
