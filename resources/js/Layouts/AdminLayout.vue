<template>
  <v-app id="inspire">
    <!-- Side bar -->
    <v-navigation-drawer
    v-model="drawer"
    color="black"
    >
      <template v-slot:prepend>
          <v-list-item
            lines="two"
            prepend-avatar="https://cdn5.vectorstock.com/i/1000x1000/51/99/icon-of-user-avatar-for-web-site-or-mobile-app-vector-3125199.jpg"
            title="Admin"
            subtitle="Logged in"
          ></v-list-item>
        </template>

        <v-divider color="white"></v-divider>

        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi-home-city" value="dashboard" :active="route().current('admin/dashboard')">
            <Link :href="route('admin/dashboard')">Dashboard</Link>
          </v-list-item>

          <v-list-item prepend-icon="mdi-home-city" value="user" :active="route().current('admin/user')">
            <Link :href="route('admin/user')">Users</Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-home-city" value="jobs" :active="route().current('jobs.index')">
            <Link :href="route('jobs.index')">Jobs</Link>
          </v-list-item>

          <!-- applications -->
          <v-list-item prepend-icon="mdi-home-city" value="jobs" :active="route().current('jobs.index')">
            <div>
                <v-menu location="end">
                <template v-slot:activator="{ props }">
                   <div
                   v-bind="props"
                   >
                   Applications
                    </div>
                </template>

                <v-list>
                    <v-list-item
                    v-for="(job, index) in jobs"
                    :key="index"
                    >
                    <v-list-item-title @click="viewApplications(job.id)">{{ job.name }}</v-list-item-title>
                    </v-list-item>
                </v-list>
                </v-menu>
            </div>
          </v-list-item>

          <!-- end -->





          <v-list-item prepend-icon="mdi-logout" value="Notification" :active="route().current('home')">
            <Link :href="route('logout')" method="post" as="button">Logout </Link>
          </v-list-item>
        </v-list>
    </v-navigation-drawer>
    <!-- End of side bar -->

    <!-- App bar -->
    <v-app-bar>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Apex Center</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>

    <v-main class="bg-purple-lighten-5">
        <!-- Page Content -->
        <v-container class="">
            <slot />
        </v-container>
    </v-main>

     <!-- <v-footer
      border
      color="grey-lighten-1"
      >
        <v-col class="text-center mt-2" cols="12">
        {{ new Date().getFullYear() }} — <strong>Appex Center</strong>
        </v-col>
      </v-footer> -->
  </v-app>
</template>

<script>
  import { Link } from '@inertiajs/inertia-vue3'
  import { Inertia } from '@inertiajs/inertia'


  export default {
    components: {
        Link
    },
    data () {
      return {
        jobs: [],
        items: [
          { title: 'Home', icon: 'mdi-home-city' },
          { title: 'My Account', icon: 'mdi-account' },
          { title: 'Users', icon: 'mdi-account-group-outline' },
        ],
        items: [
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me 2' },
      ],
      locations: [
        'top',
        'bottom',
        'start',
        'end',
        'center',
      ],
      location: 'end',
        drawer: null,

      }
    },
    methods:{
        viewApplications(id){
            Inertia.get(this.route("jobs.show", id));
        },
        getJobs(){
            // Use the route() helper to get the URL for the named route
            const apiUrl = route('get.jobs');

            // Make a GET request using Axios
            axios.get(apiUrl)
            .then(response => {
                // Handle the successful response here
                this.jobs = response.data;
            })
            .catch(error => {
                // Handle errors here
                console.error('Error:', error);
            });
        }
    },
    mounted() {
        this.getJobs();
    }
  }
</script>
