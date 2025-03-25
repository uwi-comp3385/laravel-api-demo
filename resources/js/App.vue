<script setup>
import { ref, onMounted } from 'vue';
import Welcome from './components/Welcome.vue';
import Events from './components/Events.vue';

const fullname = ref('Luke');

onMounted(async () => {
    // get API token
    await fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: 'beer.elva@example.net',
            password: 'password'
        })
    }).then((response) => {
        return response.json();
    }).then((data) => {
        // console.log(data.authorisation.token);
        localStorage.setItem('token', data.authorisation.token);
    });
})
</script>

<template>
    <h1>My Demo Vue Page</h1>
    <Welcome :fullname="fullname" />
    <hr>
    <Events />
</template>

<style scoped>

</style>
