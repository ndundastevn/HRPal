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
            :title="$page.props.auth.user.email"
            subtitle="Logged in"
          ></v-list-item>
        </template>

        <v-divider color="white"></v-divider>

        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi-home-city" value="hdashboard" :active="route().current('dashboard')">
            <Link :href="route('dashboard')">Dashboard</Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-shape-circle-plus" value="Collected" :active="route().current('apply')">
            <Link :href="route('apply')"><span class="text-red">Apply Now</span> </Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-account-plus" value="Personal" :active="route().current('personal')" >
            <Link :href="route('personal')">Personal Information </Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-phone-plus" value="Contact" :active="route().current('contact')">
            <Link :href="route('contact')">Contact Info </Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-school" value="Education" :active="route().current('education')">
            <Link :href="route('education')">Education Info </Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-cash-fast" value="Empolyment" :active="route().current('employment')">
            <Link :href="route('employment')">Employment Info </Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-air-filter" value="History" :active="route().current('history')">
            <Link :href="route('history')">Employment History</Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-account-heart" value="Kin" :active="route().current('kin')">
            <Link :href="route('kin')">Next of Kin</Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-account-tie" value="Referee" :active="route().current('referee')">
            <Link :href="route('referee')">Referee</Link>
          </v-list-item>
          <v-list-item prepend-icon="mdi-account-group-outline" value="Notification" :active="route().current('summary')">
            <Link :href="route('summary')">Summary </Link>
          </v-list-item>
          <!-- <v-list-item prepend-icon="mdi-account-cog" value="Notification" :active="route().current('home')">
            <Link :href="route('profile.edit')">Settings </Link>
          </v-list-item> -->
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

  export default {
    components: {
        Link
    },
    data () {
      return {
        items: [
          { title: 'Home', icon: 'mdi-home-city' },
          { title: 'My Account', icon: 'mdi-account' },
          { title: 'Users', icon: 'mdi-account-group-outline' },
        ],
        drawer: null,

      }
    },
  }
</script>
