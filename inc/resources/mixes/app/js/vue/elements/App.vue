<template>
    <div class="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    Jasmine
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#topNavBar" aria-controls="topNavBar"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="topNavBar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fish</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="profileDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                { User Name }
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#" @click="logout">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link to="/" class="nav-link">
                                    <i class="fa fa-home"></i>
                                    Dashboard
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link to="/users" class="nav-link">
                                    <i class="fa fa-users"></i>
                                    Users
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link to="/settings" class="nav-link">
                                    <i class="fa fa-cog"></i>
                                    Settings
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link dropable" href="#">
                                    <i class="fa fa-cog"></i>
                                    tools
                                </a>

                                <div class="collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                One
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Two
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link dropable" href="#">
                                    <i class="fa fa-cog"></i>
                                    tools
                                </a>

                                <div class="collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                One
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link dropable" href="#">
                                                <i class="fa fa-cog"></i>
                                                tools
                                            </a>

                                            <div class="collapse">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link">
                                                            One
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link">
                                                            Two
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <router-view></router-view>
                </main>

                <footer class="footer py-3 col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="container-fluid">
                        <span class="text-muted">Place sticky footer content here.</span>
                    </div>
                </footer>

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'App',
        methods: {
            logout() {
                //axios.post();
            },


        },

        mounted() {
            $('.dropable').click(function () {
                $(this).toggleClass('dropped');
                $(this).siblings('.collapse').collapse('toggle');
            });
        },
    }
</script>

<style lang="scss" scoped>
    @import "../../../scss/variables";

</style>