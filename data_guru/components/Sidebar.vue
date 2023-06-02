<template>
  <div class="div">
    <div class="appbar">
      <v-app-bar color="#539165" dense dark>
        <v-app-bar-nav-icon @click="drawer = !drawer" />
        <!-- <v-btn @click="drawer = !drawer">Toggle Sidebar</v-btn> -->
        <img src="~assets/image 2.png" style="width: 50px" alt="" />
        <div class="judul" style="font-weight: 700">
          <v-toolbar-title
            >DATA MANAGEMENT SYSTEM (DMS) REKAYASA PERANGKAT
            LUNAK</v-toolbar-title
          >
        </div>

        <v-spacer></v-spacer>
        <!-- <v-btn @click="drawer = !drawer">Toggle Sidebar</v-btn> -->
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
                    class="list_admin"
                    style="margin-center: 20px"
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

              <!-- <v-list>
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
              </v-list> -->

              <v-card-actions>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-menu>
          <div class="info-logout"></div>
        </div>
      </v-app-bar>
    </div>
    <!-- <v-btn @click="drawer = !drawer">Toggle Sidebar</v-btn> -->
    <v-navigation-drawer
      v-model="drawer"
      app
      class="sidebar"
      style="background-color: lightgreen"
    >
      <div class="sidebar_head">
        <v-app-bar-nav-icon @click="drawer = !drawer" />
        <h2 class="h1_title">Dashboard</h2>
      </div>

      <v-list class="list">
        <v-list-item class="sidebar_tombol">
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <nuxt-link to="/dashboard" class="pindah_halaman">
            <v-list-item-title>Data guru</v-list-item-title>
          </nuxt-link>
        </v-list-item>
        <hr />
        <v-list-item class="sidebar_tombol">
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <nuxt-link to="/data_siswa/kelas_x" class="pindah_halaman">
            <v-list-item-title>Kelas X</v-list-item-title>
          </nuxt-link>
        </v-list-item>
        <hr />
        <v-list-item class="sidebar_tombol">
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <nuxt-link to="/data_siswa/kelas_xi" class="pindah_halaman">
            <v-list-item-title>Kelas XI </v-list-item-title>
          </nuxt-link>
        </v-list-item>
        <hr />
        <v-list-item class="sidebar_tombol">
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <nuxt-link to="/data_siswa/kelas_xii" class="pindah_halaman">
            <v-list-item-title>Kelas XII </v-list-item-title>
          </nuxt-link>
        </v-list-item>
        <hr />
        <!-- <v-list-item class="sidebar_tombol">
          <v-list-item-icon>
            <v-icon>mdi-croos</v-icon>
          </v-list-item-icon>
          <v-list-item-title @click="drawer = !drawer">tutup</v-list-item-title>
        </v-list-item> -->
        <!-- Tambahkan tautan menu lainnya -->
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
    };
  },
  data: () => ({
    drawer: false,
    menu: "",
    dialogProfil: false,
  }),
  methods: {
    logout() {
      this.$cookies.remove("AdminToken");
      window.location.replace("/");
      alert("Berhasil Logout");
    },
  },
};
</script>
<style>
.sidebar_tombol {
  transition: 0.3s;
  padding-right: 30px;
}
.sidebar_tombol:hover {
  cursor: pointer;
  background-color: #75a081;
}
.pindah_halaman {
  text-decoration: none;
  color: black;
  padding-left: 10px;
  padding-top: 5px;
  padding-bottom: 3px;
}
.list_admin {
  padding-top: 13px;
  padding-left: 15px;
}
.sidebar_head {
  padding-top: 14px;
  padding-bottom: 5px;
  padding-left: 10px;
  color: white;
  background-color: #539165;
  cursor: auto;
  display: flex;
}
.sidebar_head h2 {
  padding-left: 30px;
}
.sidebar {
  background-color: blanchedalmond;
}
.h1_title {
  padding-left: 0;
  padding-bottom: 14px;
}
.profile-btn {
  text-align: center;
}
.q {
  font-weight: 700;
}
</style>
