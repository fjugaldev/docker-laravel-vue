<template>
    <div class="login__container col-sm-4 offset-sm-3">
        <h2>Log In</h2>
        <p>Log in to the app account to get access to the full application options.</p>
        <!--<div class="alert alert-danger" v-if="error">-->
            <!--<p>{{ error }}</p>-->
        <!--</div>-->
        <div class="form-group">
            <input
                    type="text"
                    class="form-control"
                    placeholder="Enter your username"
                    v-model="email"
            >
        </div>
        <div class="form-group">
            <input
                    type="password"
                    class="form-control"
                    placeholder="Enter your password"
                    v-model="password"
            >
        </div>
        <button class="btn btn-primary" @click="login()">Login</button>
    </div>
</template>

<!--<template>-->
    <!--<div>-->
        <!--<form class="login" @submit.prevent="login">-->
            <!--<h1>Sign in</h1>-->
            <!--<label>Email</label>-->
            <!--<input required v-model="email" type="email" placeholder="Name"/>-->
            <!--<label>Password</label>-->
            <!--<input required v-model="password" type="password" placeholder="Password"/>-->
            <!--<hr/>-->
            <!--<button type="submit">Login</button>-->
        <!--</form>-->
    <!--</div>-->
<!--</template>-->

<script>
    import {userService} from '../services';

    export default {
        name: "LoginComponent",
        data(){
            return {
                email : "",
                password : ""
            }
        },
        mounted(){
        },
        methods: {
            login: function () {
                let email = this.email;
                let password = this.password;
                let promise = userService.login(email, password);

                promise
                    .then(response => {
                        this.$store.dispatch('login/login', response.data);
                        //this.$router.go('dashboard');
                        this.$router.push('dashboard');
                    })
                    .catch(e => {
                        console.log(e);
                    });

                //     .then(() => this.$router.push('/'))
                //     .catch(err => console.log(err))
            }
        },
    }
</script>

<style scoped>
.login__container {
    margin-top: 20px;
}
</style>