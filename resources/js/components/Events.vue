<script setup>
import { ref, onMounted } from 'vue';

const events = ref([]);

onMounted(() => {
    console.log('Get Events');
    fetch('/api/v1/events', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'),
            'Content-Type': 'application/json'
        }
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            events.value = data;
        });
});
</script>

<template>
<h2 class="mb-5">Events</h2>
<div class="container">
    <div class="events row gx-4 gy-5">
        <div class="card col-md-4" v-for="event in events">
            <div class="card-body">
                <h3>{{ event.name }}</h3>
                <p>{{ event.starts_at }} to {{ event.ends_at }}</p>
                <p>{{ event.description }}</p>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
