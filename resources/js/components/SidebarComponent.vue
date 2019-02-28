<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar" v-if="showSidebar()">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="package"></span>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="truck"></span>
                        Drivers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="users"></span>
                        Customers
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "SidebarComponent",
        data(){
            return {
                show : true,
            }
        },
        methods: {
            showSidebar: function () {
                return this.$store.getters['login/isLoggedIn'];
            }
        }
    }
</script>

<style scoped>

</style>