<template>
  <div>
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
              <h1>Data Guru</h1>
            </div>
          </v-col>
        </v-row>

        <div class="tabel" v-if="kondisi == 0">
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
                            label="NIP"
                            v-model="editGuru.NIP"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Nama"
                            v-model="editGuru.nama"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-select
                            v-model="editGuru.gender"
                            :items="items"
                            :rules="[(v) => !!v || 'Item is required']"
                            label="Jenis Kelamin"
                            required
                          ></v-select>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Pendidikan"
                            v-model="editGuru.pendidikan"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Jabatan"
                            v-model="editGuru.jabatan"
                          ></v-text-field>
                        </v-col>
                        <v-col>
                          <v-text-field
                            clearable
                            label="Alamat"
                            v-model="editGuru.alamat"
                          >
                          </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="No. Telepon"
                            v-model="editGuru.nomer"
                          ></v-text-field>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card-text>

                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="closeAdd">
                      Cancel
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="save">
                      Save
                    </v-btn>
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
                      <v-col class="q"> NIP </v-col>
                      <v-col class="a" v-model="editGuru.NIP">{{
                        editGuru.NIP
                      }}</v-col>
                    </v-row>
                    <v-row>
                      <v-col class="q"> Nama </v-col>
                      <v-col class="a" v-model="editGuru.nama">{{
                        editGuru.nama
                      }}</v-col>
                    </v-row>
                    <v-row>
                      <v-col class="q"> Jenis Kelamin </v-col>
                      <v-col class="a" v-model="editGuru.gender">{{
                        editGuru.gender
                      }}</v-col>
                    </v-row>
                    <v-row>
                      <v-col class="q"> Pendidikan </v-col>
                      <v-col class="a" v-model="editGuru.pendidikan">{{
                        editGuru.pendidikan
                      }}</v-col>
                    </v-row>
                    <v-row>
                      <v-col class="q"> Jabatan </v-col>
                      <v-col class="a" v-model="editGuru.jabatan">{{
                        editGuru.jabatan
                      }}</v-col>
                    </v-row>
                    <v-row>
                      <v-col class="q"> Alamat </v-col>
                      <v-col class="a" v-model="editGuru.alamat">{{
                        editGuru.alamat
                      }}</v-col>
                    </v-row>
                    <v-row>
                      <v-col class="q"> No.Telepon </v-col>
                      <v-col class="a" v-model="editGuru.nomer">{{
                        editGuru.nomer
                      }}</v-col>
                    </v-row>
                  </v-card-text>

                  <v-divider></v-divider>
                </v-card>
              </v-dialog>
              <!-- <v-dialog v-model="dialogDelete" max-width="500px">
                <v-card>
                  <v-card-title class="text-h5"
                    >Are you sure you want to delete this item?</v-card-title
                  >
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="closeAdd"
                      >Cancel</v-btn
                    >
                    <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                      >OK</v-btn
                    >
                    <v-spacer></v-spacer>
                  </v-card-actions>
                </v-card>
              </v-dialog> -->
            </template>

            <thead>
              <tr>
                <th class="text-right border-bottom">No</th>
                <th class="text-right border-bottom">NIP</th>
                <th class="text-right border-bottom">Nama</th>
                <th class="text-right border-bottom">Jenis Kelamin</th>
                <th class="text-right border-bottom">Pendidikan</th>
                <th class="text-right border-bottom">Jabatan</th>
                <th class="text-right border-bottom">Alamat</th>
                <th class="text-right border-bottom">No. Telepon</th>
                <th class="text-right border-bottom">Action</th>
              </tr>
            </thead>
            <tbody class="isi_table">
              <tr v-for="(item, index) in data_guru" :key="item.id">
                <td>{{ index + 1 }}</td>
                <td>{{ item.NIP }}</td>
                <td>{{ item.nama }}</td>
                <td>{{ item.jenis_kelamin }}</td>
                <td>{{ item.pendidikan }}</td>
                <td>{{ item.jabatan }}</td>
                <td>{{ item.alamat }}</td>
                <td>{{ item.telepon }}</td>
                <td>
                  <div class="button-center">
                    <v-btn
                      @click.prevent="edit(item)"
                      color="primary"
                      fab
                      small
                      dark
                    >
                      <v-icon>mdi-pencil</v-icon>
                    </v-btn>

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
                      fab
                      small
                      class="btn-delete color--red"
                      dark
                    >
                      <v-icon>mdi-delete</v-icon>
                    </v-btn>
                  </div>
                </td>
              </tr>
            </tbody>
          </v-simple-table>
          <!-- <div v-if="kondisi == 1">
            <v-simple-table> </v-simple-table>
            <td>{{ datacari }}</td>
          </div> -->
        </div>
      </div>
      <Footer />
    </div>
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
    const endpoint = "http://localhost/PJBL2023/api_pjbl/public/data_guru";

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
      // .then(result => console.log(result))

      .then((result) => {
        this.data_guru = result.data;
        console.log(result.data);
      });
  },

  data: () => ({
    drawer: false,
    data_guru: [],
    datacari: [],
    menu: "",
    kondisi: 0,
    cari: "",
    id_data_guru: "",
    dialog: false,
    dialogDelete: false,
    dialogProfil: false,
    dialogdetail: false,
    editIndex: -1,
    editGuru: {
      id: "",
      NIP: "",
      nama: "",
      gender: "",
      jabatan: "",
      alamat: "",
      nomer: "",
      pendidikan: "",
    },
    defaultGuru: {
      nama: "",
      gender: "",
      jabatan: "",
      alamat: "",
      nomer: "",
      pendidikan: "",
    },
    select: null,
    items: ["Laki Laki", "Perempuan"],
  }),

  methods: {
    closeAdd() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editGuru = Object.assign({}, this.defaultGuru);
        this.editIndex = -1;
      });
    },
    save() {
      if (this.editIndex > -1) {
        // Edit data guru yang ada
        Object.assign(this.data_guru[this.editIndex], this.editGuru);
        var data_guru = {
          NIP: this.editGuru.NIP,
          nama: this.editGuru.nama,
          jenis_kelamin: this.editGuru.gender,
          pendidikan: this.editGuru.pendidikan,
          jabatan: this.editGuru.jabatan,
          alamat: this.editGuru.alamat,
          telepon: this.editGuru.nomer,
          id: this.editGuru.id,
        };
        this.$axios
          // .put("http://localhost/PJBL2023/api_pjbl2/public/Edit", data_guru)
          .put(
            `http://localhost/PJBL2023/api_pjbl2/public/Edit/${this.editGuru.id}`,
            data_guru
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
        var data_guru = {
          NIP: this.editGuru.NIP,
          nama: this.editGuru.nama,
          jenis_kelamin: this.editGuru.gender,
          pendidikan: this.editGuru.pendidikan,
          jabatan: this.editGuru.jabatan,
          alamat: this.editGuru.alamat,
          telepon: this.editGuru.nomer,
        };
        this.$axios
          .post(
            "http://localhost/PJBL2023/api_pjbl2/public/data_guru2",
            data_guru
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
      this.editIndex = this.data_guru.indexOf(item);
      this.dialog = true;
      this.editGuru.NIP = item.NIP;
      this.editGuru.nama = item.nama;
      this.editGuru.gender = item.jenis_kelamin;
      this.editGuru.pendidikan = item.pendidikan;
      this.editGuru.alamat = item.alamat;
      this.editGuru.nomer = item.telepon;
      this.editGuru.jabatan = item.jabatan;
      this.editGuru.id = item.id;
    },
    detail(item) {
      this.dialogdetail = true;
      this.editIndex = this.data_guru.indexOf(item);
      this.editGuru.NIP = item.NIP;
      this.editGuru.nama = item.nama;
      this.editGuru.gender = item.jenis_kelamin;
      this.editGuru.pendidikan = item.pendidikan;
      this.editGuru.alamat = item.alamat;
      this.editGuru.nomer = item.telepon;
      this.editGuru.jabatan = item.jabatan;
      this.editGuru.id = item.id;
    },
    remove(id, index) {
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        this.$axios
          .delete(`http://localhost/PJBL2023/api_pjbl2/public/Hapus/${id}`)
          .then((response) => {
            alert("Data berhasil dihapus");
            this.data_guru.splice(index, 1);
            console.log(response);
            this.$router.go();
          })
          .catch((error) => {
            console.log(error.response);
          });
      }
    },
    deleteItemConfirm() {
      this.data_guru.splice(this.editedIndex, 1);
      this.closeAdd();
    },
    logout() {
      this.$cookies.remove("AdminToken");
      window.location.replace("/");
      alert("Berhasil Logout");
    },

    searchData() {
      this.kondisi == 1;
      this.$axios
        .post("http://localhost/PJBL2023/api_pjbl2/public/cari", {
          nama: this.cari,
        })
        // .then((response) => {
        //   this.data_guru.splice(
        //     0,
        //     this.data_guru.length,
        //     ...response.data_guru
        //   );
        //   console.log(response.data);
        // })
        .then((response) => {
          // Memperbarui data hasil pencarian dengan respons dari API
          console.log(response.data);
          // this.data_guru = response.data.data_guru;
          this.datacari = response.data;
          console.log("tes" + this.datacari);
          alert(" berhasil menemukan data");
        })
        .catch((error) => {
          console.error(error);
        });
      // .finally(() => {
      //   this.cari = ""; // Mengosongkan input pencarian setelah mendapatkan hasil pencarian
      // });
    },
  },
};
</script>
<style>
.semua {
  font-family: "Poppins", sans-serif;
}
.profile-btn {
  text-align: center;
}
.q {
  font-weight: 700;
}
.border-bottom {
  border-bottom: 1px solid #000000;
}

.border-right {
  border-right: 1px solid #000000;
}
.header {
  display: flex;
  justify-content: space-between;
  /* background-color: #342536; */
}
.h1 {
  margin-top: 15px;
}
.isi_table {
  text-align: center;
}
.button-center {
  text-align: center;
  justify-content: space-between;
}
.btn-delete {
  background-color: red;
}
</style>
