<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app>
      <!-- Konten sidebar di sini -->
      <v-list>
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Home</v-list-item-title>
        </v-list-item>
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Profile</v-list-item-title>
        </v-list-item>
        <!-- Tambahkan tautan menu lainnya -->
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app>
      <!-- Konten app bar di sini -->
      <div class="dashboard" style="font-family: 'Poppins', sans-serif">
        <div class="appbar">
          <v-app-bar color="#539165" dense dark>
            <v-app-bar-nav-icon @click="drawer = !drawer" />
            <!-- <v-btn @click="drawer = !drawer">Toggle Sidebar</v-btn> -->
            <img src="~assets/image 2.png" style="width: 50px" alt="" />
            <div class="judul" style="font-weight: 700">
              <v-toolbar-title
                >DATA GURU REKAYASA PERANGKAT LUNAK</v-toolbar-title
              >
            </div>

            <v-spacer></v-spacer>

            <div class="info-user">
              <v-menu v-model="menu" offset-x>
                <template v-slot:activator="{ on, attrs }">
                  <v-btn color="indigo" icon dark v-bind="attrs" v-on="on">
                    <v-icon>mdi-dots-vertical</v-icon>
                  </v-btn>
                </template>

                <v-card>
                  <v-list>
                    <v-list-item>
                      <v-list-item-avatar>
                        <img
                          src="https://cdn.vuetifyjs.com/images/john.jpg"
                          alt="John"
                        />
                      </v-list-item-avatar>

                      <v-list-item-content
                        class="list"
                        style="margin-center: 10px"
                      >
                        <v-list-item-title>Admin</v-list-item-title>
                        <v-list-item-subtitle>Guru</v-list-item-subtitle>
                      </v-list-item-content>

                      <v-list-item-action>
                        <v-btn text @click="logout">
                          <v-icon>mdi-logout</v-icon>
                        </v-btn>
                      </v-list-item-action>
                    </v-list-item>
                  </v-list>

                  <v-divider></v-divider>

                  <v-list>
                    <v-list-item>
                      <div class="text-center">
                        <v-dialog v-model="dialogProfil" width="500">
                          <template v-slot:activator="{ on, attrs }">
                            <v-btn
                              class="profile-btn"
                              color="white"
                              text
                              width="200"
                              v-bind="attrs"
                              v-on="on"
                            >
                              Profil
                            </v-btn>
                          </template>

                          <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                              Detail Profil
                            </v-card-title>

                            <v-card-text>
                              <v-row>
                                <v-col class="q"> Nama </v-col>
                                <v-col class="a"> Admin </v-col>
                              </v-row>
                              <v-row>
                                <v-col class="q"> Jenis Kelamin </v-col>
                                <v-col class="a"> Tidak Disebutkan </v-col>
                              </v-row>
                              <v-row>
                                <v-col class="q"> Jabatan </v-col>
                                <v-col class="a"> guru </v-col>
                              </v-row>
                              <v-row>
                                <v-col class="q"> Alamat </v-col>
                                <v-col class="a"> dmn aja </v-col>
                              </v-row>
                              <v-row>
                                <v-col class="q"> No. Telp </v-col>
                                <v-col class="a"> 084571 </v-col>
                              </v-row>
                            </v-card-text>

                            <v-divider></v-divider>
                          </v-card>
                        </v-dialog>
                      </div>
                    </v-list-item>
                  </v-list>

                  <v-card-actions>
                    <v-spacer></v-spacer>
                  </v-card-actions>
                </v-card>
              </v-menu>
              <div class="info-logout"></div>
            </div>
          </v-app-bar>
        </div>
      </div>
    </v-app-bar>

    <v-main>
      <nuxt />
    </v-main>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      dialogProfil: false,
      menu: "",
    };
  },
};
</script>
