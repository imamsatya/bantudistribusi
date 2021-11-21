<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>

<body>
    <div id="app">
        <v-app>
            <v-main>
                <v-container>
                    <v-card>
                        <v-tabs v-model="tab" background-color="deep-purple accent-4" centered dark icons-and-text>
                            <v-tabs-slider></v-tabs-slider>

                            <v-tab href="#tab-1">
                                Form
                                <v-icon>mdi-pencil</v-icon>
                            </v-tab>

                            <v-tab href="#tab-2">
                                Submitted
                                <v-icon>mdi-content-save</v-icon>
                            </v-tab>
                        </v-tabs>

                        <v-tabs-items v-model="tab">
                            <v-tab-item :value="'tab-' + 1">
                                <v-card flat>
                                    <br>
                                    <v-card class="d-flex justify-space-between mb-6"
                                        :color="$vuetify.theme.dark ? 'grey darken-3' : 'grey lighten-4'" flat tile>
                                        <input id="fileId" name="attachment[]" type="file" accept=".xlsx"
                                            @change="previewFiles($event)" multiple>

                                        <v-card>
                                        <v-btn depressed color="success" href="/download">
                                                contoh file
                                            </v-btn>
                                            <v-btn depressed color="error" @click="clear()">
                                                Clear
                                            </v-btn>
                                            <v-btn depressed color="primary" @click="simpan()">
                                                Simpan
                                            </v-btn>
                                        </v-card>
                                    </v-card>


                                    <br>

                                    <v-data-table :headers="headers" :items="tempData" :items-per-page="32"
                                        class="elevation-1">
                                    </v-data-table>
                                </v-card>
                            </v-tab-item>
                        </v-tabs-items>

                        <v-tabs-items v-model="tab">
                            <v-tab-item :value="'tab-' + 2">
                                <br>
                                <v-expansion-panels>
                                    <v-expansion-panel v-for="value in submittedData" :key="i">
                                        <v-expansion-panel-header>
                                            Data Submit
                                        </v-expansion-panel-header>
                                        <v-expansion-panel-content>
                                            <v-data-table :headers="headers" :items="value" :items-per-page="5"
                                                class="elevation-1">
                                            </v-data-table>
                                        </v-expansion-panel-content>
                                    </v-expansion-panel>
                                </v-expansion-panels>
                            </v-tab-item>
                        </v-tabs-items>
                    </v-card>
                    <br>

                </v-container>
            </v-main>
        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data() {
                return {
                    // files: [], tab: null
                    submittedData: [],
                    tab: null,
                    headers: [{
                            text: 'Kolom1',
                            align: 'start',
                            sortable: false,
                            value: 'kolom1',
                        },
                        {
                            text: 'Kolom2',
                            value: 'kolom2'
                        },
                        {
                            text: 'Kolom3',
                            value: 'kolom3'
                        },
                        {
                            text: 'Kolom4',
                            value: 'kolom4'
                        },
                        {
                            text: 'Kolom5',
                            value: 'kolom5'
                        },
                        {
                            text: 'Kolom6',
                            value: 'kolom6'
                        },
                        {
                            text: 'Kolom7',
                            value: 'kolom7'
                        },
                        {
                            text: 'Kolom8',
                            value: 'kolom8'
                        },
                        {
                            text: 'Kolom9',
                            value: 'kolom9'
                        },
                        {
                            text: 'Kolom10',
                            value: 'kolom10'
                        },
                        {
                            text: 'Kolom11',
                            value: 'kolom11'
                        },
                        {
                            text: 'Kolom12',
                            value: 'kolom12'
                        },

                    ],
                    filex: null,
                    tempData: [],
                }
            },
            methods: {
                async download(){
                    await axios.get('/download').then(response => {
                        console.log(response.data, 'temp')
                        this.tempData = response.data

                    })
                },
                async previewFiles(event) {

                    if (!event.target.files.length) return

                    const data = new FormData();
                    data.append('file', event.target.files[0]);

                    await axios.post('x', data, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            console.log(response.data)

                        })


                        .catch(error => {
                            console.log(error)
                        });

                    await axios.get('/temp').then(response => {
                        console.log(response.data, 'temp')
                        this.tempData = response.data

                    })
                },
                clear() {
                    this.tempData = []
                },
                simpan() {
                    console.log(this.tempData,
                        'xz')
                    if (this.tempData.length != 0) {
                        this.submittedData.push(this.tempData)
                        console.log(this.submittedData, 'submitted')
                        this.tempData = []
                    }
                    console.log(this.submittedData, 'currentData')
                }

            }
        })

    </script>
</body>

</html>
