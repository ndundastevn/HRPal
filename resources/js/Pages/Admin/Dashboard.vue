<template>
    <AdminLayout>
        <!-- Welcome -->
       <div class="text-h4 pa-2">Welcome to Admin's Dashboard</div>
        <!-- End welcome -->

        <v-row class="bg-white mt-2">
            <!-- ro 1 -->
            <v-col cols="12" md="4">
                <v-card
                    color="#1F7087"
                    theme="dark"
                >
                    <div class="d-flex flex-no-wrap justify-space-between">
                    <div>
                        <v-card-title class="text-h5">
                        Registerd Users
                        </v-card-title>

                        <v-card-subtitle>
							<v-chip color="green" variant="flat">
								<v-icon icon="mdi-account" start></v-icon>
							1000
							</v-chip>
						</v-card-subtitle>

                        <v-card-actions>
                        <v-btn
                            class="ms-2"
                            variant="outlined"
                            size="small"
                        >
                            View Users
                        </v-btn>
                        </v-card-actions>
                    </div>

                    <v-avatar
                        class="ma-3"
                        size="125"
                        rounded="0"
                    >
                        <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg"></v-img>
                    </v-avatar>
                    </div>
                </v-card>
            </v-col>
            <!-- colm 2 -->
            <v-col cols="12" md="4">
                <v-card
                    color="#1F7087"
                    theme="dark"
                >
                    <div class="d-flex flex-no-wrap justify-space-between">
                    <div>
                        <v-card-title class="text-h5">
                        Advertised Jobs
                        </v-card-title>
                        <v-card-subtitle>
							<v-chip color="green" variant="flat">
							<v-icon icon="mdi-account-hard-hat-outline" start></v-icon>
							2
							</v-chip>
						</v-card-subtitle>

                        <v-card-actions>
                        <v-btn
                            class="ms-2"
                            variant="outlined"
                            size="small"
                        >
                            View Jobs
                        </v-btn>
                        </v-card-actions>
                    </div>

                    <v-avatar
                        class="ma-3"
                        size="125"
                        rounded="0"
                    >
                        <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg"></v-img>
                    </v-avatar>
                    </div>
                </v-card>
            </v-col>
            <!-- colm 3 -->
            <v-col cols="12" md="4">
                <v-card
                    color="#1F7087"
                    theme="dark"
                >
                    <div class="d-flex flex-no-wrap justify-space-between">
                    <div>
                        <v-card-title class="text-h5">
                        Applications
                        </v-card-title>

                        <v-card-subtitle>
							<v-card-subtitle>
							<v-chip color="green" variant="flat">
							<v-icon icon="mdi-account" start></v-icon>
							47
							</v-chip>
						</v-card-subtitle>
						</v-card-subtitle>

                        <v-card-actions>
                        <v-btn
                            class="ms-2"
                            variant="outlined"
                            size="small"
                        >
                            View Applications
                        </v-btn>
                        </v-card-actions>
                    </div>

                    <v-avatar
                        class="ma-3"
                        size="125"
                        rounded="0"
                    >
                        <v-img src="https://cdn.vuetifyjs.com/images/cards/foster.jpg"></v-img>
                    </v-avatar>
                    </div>
                </v-card>
            </v-col>


        </v-row>

        </AdminLayout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout.vue';

    export default {
        components: {
            AdminLayout
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
