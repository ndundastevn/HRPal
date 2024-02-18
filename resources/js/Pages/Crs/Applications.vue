<template>
    <CrsLayout>
           <v-sheet color="purple-lighten-5" class="text-center pb-4 mb-4">
				All Applications
				<br/>
				<span class="text-caption pt-2">Click the link bellow to create new applications</span>
		   </v-sheet>

                 <!-- Table -->
            <v-sheet class="" rounded>

				<v-sheet
				class="bg-green pa-4 ml-6 mt-6"
				width="50"
				height="50"
				rounded
				>
					<v-icon>mdi-account-multiple-plus-outline</v-icon>
				</v-sheet>

			    <v-table class="pt-6">
                    <thead>
                    <tr>
                        <th class="text-left">
                        CA
                        </th>
                        <th class="text-left">
                        Applicant
                        </th>
                        <th class="text-left">
                        Phone
                        </th>
                        <th class="text-left">
                        D.O.A
                        </th>
                        <th class="text-left">
                        Status
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
			</v-sheet>
            <!-- end Table -->

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
