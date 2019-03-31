<!--suppress HtmlUnknownAnchorTarget -->
<template>
    <v-app id="inspire">
        <v-toolbar color="primary" dark fixed app clipped-left>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>Jasmine</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu offset-y>
                <v-btn flat="flat" slot="activator" small="small">
                    {{ $root.user.name }}
                    <v-icon>keyboard_arrow_down</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="">
                        <v-icon class="mr-2">settings</v-icon>
                        <v-list-tile-title>Settings</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile @click="logout">
                        <v-icon class="mr-2">exit_to_app</v-icon>
                        <v-list-tile-title>Logout</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-navigation-drawer dark fixed app clipped v-model="drawer">
            <v-list dense>
                <template v-for="item in menu">
                    <v-layout row align-center
                              v-if="item.heading"
                              :key="item.heading">
                        <v-flex xs6>
                            <v-subheader v-if="item.heading">
                                {{ item.heading }}
                            </v-subheader>
                        </v-flex>
                        <v-flex xs6 class="text-xs-center">
                            <a href="#!" class="body-2 black--text">EDIT</a>
                        </v-flex>
                    </v-layout>

                    <v-list-group v-else-if="item.children" no-action
                                  :append-icon="item.model ? 'keyboard_arrow_up' : 'keyboard_arrow_down'"
                                  v-model="item.model" :key="item.text" :prepend-icon="item.icon">
                        <v-list-tile slot="activator">
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    {{ item.text }}
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile v-for="(child, i) in item.children"
                                     :key="i" :to="child.to" active-class="primary">
                            <v-list-tile-action v-if="child.icon">
                                <v-icon>{{ child.icon }}</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    {{ child.text }}
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list-group>

                    <v-list-tile v-else :key="item.text" :to="item.to"
                                 active-class="primary">
                        <v-list-tile-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-content>
            <v-container fluid fill-height pa-0>
                <v-layout align-start>
                    <v-flex lg12>
                        <router-view></router-view>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>

        <v-footer dark class="white--text" inset app absolute>
            <span>Jasmine</span>
            <v-spacer></v-spacer>
            <span>&copy; 2019</span>
        </v-footer>
    </v-app>
</template>

<script>
    export default {
        name: 'App',
        data() {
            return {
                drawer: true,

                menu: [
                    {icon: 'dashboard', text: 'Dashboard', to: '/'},
                    {icon: 'people', text: 'Users', to: '/users'},
                    {
                        icon: 'tune',
                        text: 'Database & BREAD',
                        model: false,
                        children: [
                            {icon: 'history', text: 'Import', to: '/fish'},
                        ]
                    },
                ],
            };
        },
        methods: {
            logout() {
                axios.post('/logout').then(response => {
                    window.location.reload();
                });
            },

            loadUser() {
                axios.get('/user').then(response => this.$root.user = response.data);
            },

        },

        mounted() {
            this.loadUser();
        },
    }
</script>

<style lang="scss" scoped>
    @import "../../../scss/variables";

</style>