<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer">
      <template v-slot:prepend>
          <v-list-item
            lines="two"
            prepend-avatar="https://randomuser.me/api/portraits/women/81.jpg"
            title="Jane Smith"
            subtitle="Logged in"
          ></v-list-item>
        </template>

        <v-divider></v-divider>

        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi-home-city" title="Home" value="home"></v-list-item>
          <v-list-item prepend-icon="mdi-account" title="Applications" value="Applications"></v-list-item>
          <v-list-item prepend-icon="mdi-account" title="Collected" value="Collected"></v-list-item>
          <v-list-item prepend-icon="mdi-account" title="Pending" value="Pending"></v-list-item>
          <v-list-item prepend-icon="mdi-account-group-outline" title="Notification" value="Notification"></v-list-item>
        </v-list>
    </v-navigation-drawer>

    <v-app-bar>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <!-- Banner -->
        <v-container>
            <v-row justify="space-around">
            <v-col
                v-for="color in colors"
                :key="color"
                cols="12"
                md="4"
            >
                <v-sheet
                class="pa-12"
                :color="color"
                >
                Hello
                </v-sheet>
            </v-col>
            </v-row>
        </v-container>
        <!-- End banner -->

        <!-- Table -->
        <v-container>
            <h3 class="text-h3">Applications</h3>
            <v-table>
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
        </v-container>
        <!-- end Table -->

    </v-main>
  </v-app>
</template>

<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Home', icon: 'mdi-home-city' },
          { title: 'My Account', icon: 'mdi-account' },
          { title: 'Users', icon: 'mdi-account-group-outline' },
        ],
        drawer: null,
        colors: ['green-lighten-3', 'red-lighten-3', 'yellow-lighten-3'],
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
    },
  }
</script>
