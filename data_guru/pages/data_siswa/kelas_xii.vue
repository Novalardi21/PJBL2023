<template>
  <div class="semua">
    <div class="dashboard" style="font-family: 'Poppins', sans-serif">
      <Sidebar />
    </div>
    <div class="container">
      <v-row>
        <v-col class="header">
          <div class="addBtn" style="color: #ffffff; margin-top: 21px">
            <!-- <v-btn style="background: #539165" rounded outlined dark>Tambah Data</v-btn> -->
            <v-dialog v-model="dialog" persistent max-width="600px">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  style="background: #539165; font-weight: 700"
                  rounded
                  outlined
                  dark
                  v-bind="attrs"
                  v-on="on"
                >
                  Tambah Data
                </v-btn>
              </template>
            </v-dialog>
          </div>
          <div class="h1">
            <h1>Data Siswa kelas XII</h1>
          </div>
        </v-col>
      </v-row>

      <div class="tabel">
        <v-simple-table fixed-header height="465px" data-app>
          <template v-slot:top>
            <v-dialog v-model="dialog" :key="dialog">
              <template v-slot:activator="{ on, attrs }"> </template>
              <v-card>
                <v-card-title>
                  <span class="text-h5">DMS</span>
                </v-card-title>

                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="NIS"
                          v-model="editkelas_xii.NIS"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Nama"
                          v-model="editkelas_xii.nama"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-select
                          v-model="editkelas_xii.jenis_kelamin"
                          :items="items"
                          :rules="[(v) => !!v || 'Item is required']"
                          label="Jenis Kelamin"
                          required
                        ></v-select>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-select
                          v-model="editkelas_xii.kelas"
                          :items="kelas"
                          :rules="[(v) => !!v || 'Item is required']"
                          label="kelas"
                          required
                        ></v-select>
                      </v-col>
                      <v-col>
                        <v-text-field
                          clearable
                          label="Alamat"
                          v-model="editkelas_xii.alamat"
                        >
                        </v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="closeAdd">
                    Cancel
                  </v-btn>
                  <v-btn color="blue darken-1" text @click="save"> Save </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
            <v-dialog v-model="dialogdetail" width="500">
              <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                  Detail Data
                </v-card-title>

                <v-card-text>
                  <v-row>
                    <v-col class="q"> NIS </v-col>
                    <v-col class="a" v-model="editkelas_xii.NIS">{{
                      editkelas_xii.NIS
                    }}</v-col>
                  </v-row>
                  <v-row>
                    <v-col class="q"> Nama </v-col>
                    <v-col class="a" v-model="editkelas_xii.nama">{{
                      editkelas_xii.nama
                    }}</v-col>
                  </v-row>
                  <v-row>
                    <v-col class="q"> Jenis Kelamin </v-col>
                    <v-col class="a" v-model="editkelas_xii.jenis_kelamin">{{
                      editkelas_xii.jenis_kelamin
                    }}</v-col>
                  </v-row>
                  <v-row>
                    <v-col class="q"> Kelas </v-col>
                    <v-col class="a" v-model="editkelas_xii.kelas">{{
                      editkelas_xii.kelas
                    }}</v-col>
                  </v-row>
                  <v-row>
                    <v-col class="q"> Alamat </v-col>
                    <v-col class="a" v-model="editkelas_xii.alamat">{{
                      editkelas_xii.alamat
                    }}</v-col>
                  </v-row>
                </v-card-text>

                <v-divider></v-divider>
              </v-card>
            </v-dialog>
          </template>

          <thead>
            <tr>
              <th class="text-right">No</th>
              <th class="text-right">NIS</th>
              <th class="text-right">Nama</th>
              <th class="text-right">Jenis Kelamin</th>
              <th class="text-right">Kelas</th>
              <th class="text-right">Alamat</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody class="isi_table">
            <tr v-for="(item, index) in kelas_xii" :key="item.id">
              <td style="text-center ">{{ index + 1 }}</td>
              <td style="text-center ">{{ item.NIS }}</td>
              <td style="text-center ">{{ item.nama }}</td>
              <td style="text-center ">
                {{ item.jenis_kelamin }}
              </td>
              <td style="text-center ">{{ item.kelas }}</td>
              <td style="text-center ">{{ item.alamat }}</td>
              <td style="text-center ">
                <div class="button-center">
                  <v-btn
                    @click.prevent="edit(item)"
                    color="primary"
                    fab
                    small
                    dark
                    ><v-icon>mdi-pencil</v-icon></v-btn
                  >
                  <v-btn
                    @click.prevent="detail(item)"
                    color="primary"
                    fab
                    small
                    dark
                  >
                    <v-icon>mdi-account</v-icon>
                  </v-btn>
                  <v-btn
                    @click.prevent="remove(item.id, index)"
                    color="danger"
                    fab
                    small
                    dark
                    ><v-icon>mdi-delete</v-icon></v-btn
                  >
                </div>
              </td>
            </tr>
          </tbody>
        </v-simple-table>
      </div>
    </div>
    <Footer />
  </div>
</template>
<script>
import Sidebar from "@/components/Sidebar.vue";
import Footer from "@/components/Footer.vue";
export default {
  components: {
    Sidebar,
    Footer,
  },
  middleware: "middleware_admin",
  created() {
    console.log("ok");
    const endpoint = "http://localhost/PJBL2023/api_pjbl2/public/kelas_xii";

    fetch(endpoint, {
      // mode: 'no-cors',
      // method: 'GET',
      headers: {
        // 'Content-Type': 'application/json',
        // 'Access-Control-Allow-Origin' : 'http://localhost:3000/',
        // "Access-Control-Allow-Credentials" : true ,
        // 'Access-Control-Allow-Headers' : '*',
        // 'Access-Control-Allow-Methods' : 'index,create,update,delete',
        // 'Content-Type': 'application/x-www-form-urlencoded',
      },
    })
      .then((result) => result.json())
      // .then((result) => console.log(result));

      .then((result) => {
        this.kelas_xii = result.data;
        console.log(result.data);
      });
  },
  data() {
    return {
      drawer: false,
    };
  },
  data: () => ({
    drawer: false,
    kelas_xii: [],

    cari: "",
    id_data_guru: "",
    dialog: false,
    dialogDelete: false,
    dialogdetail: false,
    editIndex: -1,
    editkelas_xii: {
      id: "",
      NIS: "",
      nama: "",
      jenis_kelamin: "",
      kelas: "",
      alamat: "",
    },
    defaultkelas_xii: {
      NIS: "",
      nama: "",
      jenis_kelamin: "",
      kelas: "",
      alamat: "",
    },
    select: null,
    items: ["Laki Laki", "Perempuan"],
    select: null,
    kelas: ["X", "XI", "XII"],
  }),
  methods: {
    closeAdd() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editkelas_xii = Object.assign({}, this.defaultkelas_xii);
        this.editIndex = -1;
      });
    },
    save() {
      if (this.editIndex > -1) {
        // Edit data guru yang ada
        Object.assign(this.kelas_xii[this.editIndex], this.editkelas_xii);
        var kelas_xii = {
          NIS: this.editkelas_xii.NIS,
          nama: this.editkelas_xii.nama,
          jenis_kelamin: this.editkelas_xii.jenis_kelamin,
          kelas: this.editkelas_xii.kelas,
          alamat: this.editkelas_xii.alamat,
          id: this.editkelas_xii.id,
        };
        this.$axios
          // .put("http://localhost/PJBL2023/api_pjbl2/public/Edit", data_guru)
          .put(
            `http://localhost/PJBL2023/api_pjbl2/public/Edit_kelas_xii/${this.editkelas_xii.id}`,
            kelas_xii
          )
          .then((response) => {
            // Data berhasil disimpan, tutup v-dialog dan refresh halaman
            alert("Data berhasil diubah");
            this.dialog = false;
            // this.$router.go(); // Refresh halaman
            // this.created();
            console.log(response);
          })
          .catch((error) => {
            console.error(error);
          });
        // this.dialog = false;
        // this.$router.go(); // Refresh halaman
      } else {
        // Tambah data guru baru
        var kelas_xii = {
          NIS: this.editkelas_xii.NIS,
          nama: this.editkelas_xii.nama,
          jenis_kelamin: this.editkelas_xii.jenis_kelamin,
          kelas: this.editkelas_xii.kelas,
          alamat: this.editkelas_xii.alamat,
        };
        this.$axios
          .post(
            "http://localhost/PJBL2023/api_pjbl2/public/kelas_xii",
            kelas_xii
          )
          .then((response) => {
            // Data berhasil disimpan, tutup v-dialog dan refresh halaman
            this.dialog = false;
            // Refresh halaman
            // this.created();
            console.log(response);
            alert("Data berhasil dikirim!");
            this.$router.go();
          })
          .catch((error) => {
            console.error(error);
            alert("Data gagal dikirim!");
          });
      }
    },
    edit(item) {
      console.log(item);
      this.editIndex = this.kelas_xii.indexOf(item);
      this.dialog = true;
      this.editkelas_xii.NIS = item.NIS;
      this.editkelas_xii.nama = item.nama;
      this.editkelas_xii.jenis_kelamin = item.jenis_kelamin;
      this.editkelas_xii.kelas = item.kelas;
      this.editkelas_xii.alamat = item.alamat;
      this.editkelas_xii.id = item.id;
    },
    detail(item) {
      this.editIndex = this.kelas_xii.indexOf(item);
      this.dialogdetail = true;
      this.editkelas_xii.NIS = item.NIS;
      this.editkelas_xii.nama = item.nama;
      this.editkelas_xii.jenis_kelamin = item.jenis_kelamin;
      this.editkelas_xii.kelas = item.kelas;
      this.editkelas_xii.alamat = item.alamat;
      this.editkelas_xii.id = item.id;
    },
    remove(id, index) {
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        this.$axios
          .delete(
            `http://localhost/PJBL2023/api_pjbl2/public/Hapus_kelas_xii/${id}`
          )
          .then((response) => {
            alert("Data berhasil dihapus");
            this.kelas_xii.splice(index, 1);
            console.log(response);
            // this.$router.go();
          })
          .catch((error) => {
            console.log(error.response);
          });
      }
    },
  },
};
</script>
<style>
.semua {
  font-family: "Poppins", sans-serif;
}
.isi_table {
  text-align: center;
}
.header {
  display: flex;
  justify-content: space-between;
  /* background-color: #342536; */
}
.h1 {
  margin-top: 15px;
}
.button-center {
  text-align: center;
}
</style>
