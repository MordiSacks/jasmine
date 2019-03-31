<template>
    <div>
        <v-container>
            <v-layout>
                <v-flex>
                    <v-card>
                        <v-card-title>
                            <v-layout justify-space-between>
                                <h1>Users</h1>
                                <v-btn fab color="pink" dark @click.stop="userDialog = true">
                                    <v-icon>add</v-icon>
                                </v-btn>
                            </v-layout>
                        </v-card-title>
                        <v-card-text>
                            <!--<v-text-field label="search" v-model="dt.search"></v-text-field>-->
                            <v-data-table :headers="dt.headers" :items="dt.rows">
                                <template v-slot:items="props">
                                    <td>{{ props.item.name }}</td>
                                    <td>{{ props.item.email }}</td>
                                    <td>
                                        <v-btn color="warning" @click="editUser(props.item)">
                                            <v-icon>edit</v-icon>
                                        </v-btn>
                                        <v-btn color="error" @click="deleteUser(props.item)"
                                               :disabled="props.item.id === $root.user.id">
                                            <v-icon>delete</v-icon>
                                        </v-btn>
                                    </td>
                                </template>
                            </v-data-table>
                        </v-card-text>
                        <v-card-actions>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>


        <v-dialog v-model="userDialog" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Create User</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field label="*Full name" v-model="user.name"
                                              data-vv-name="name" :error-messages="errors.first('name')"
                                              required v-validate="'required|max:255'"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="Email*" v-model="user.email"
                                              data-vv-name="email" :error-messages="errors.first('email')"
                                              required v-validate="'required|email|max:255'"></v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click="userDialog = false">Close</v-btn>
                    <v-btn color="blue darken-1" flat @click="saveUser">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {
        name: "Users",
        data() {
            return {
                dt: {
                    headers: [
                        {text: 'Name', value: 'name'},
                        {text: 'Email Address', value: 'email'},
                        {text: 'Actions', sortable: false,},
                    ],
                    rows: [],
                    search: '',
                },
                userDialog: false,
                user: {},
            };
        },
        methods: {
            loadUsers() {
                axios.get('/jasmineUsers').then(response => this.dt.rows = response.data);
            },

            saveUser() {
                let vm = this;
                let method = vm.user.id ? 'put' : 'post';

                axios[method]('/jasmineUsers/' + (vm.user.id || ''), vm.user).then(response => {
                    vm.loadUsers();
                    vm.userDialog = false;
                }).catch(err => {
                    this.$setLaravelValidationErrorsFromResponse(err.response.data);
                });
            },

            editUser(user) {
                this.user = user;
                this.userDialog = true;
            },

            deleteUser(user) {
                axios.delete('/jasmineUsers/' + user.id).then(response => {
                    this.loadUsers();
                });
            },
        },

        watch: {
            userDialog(val) {
                if (!val) {
                    this.user = {};
                    this.errors.clear();
                }
            }
        },

        mounted() {
            this.loadUsers();
        }
    }
</script>

<style lang="scss" scoped>

</style>