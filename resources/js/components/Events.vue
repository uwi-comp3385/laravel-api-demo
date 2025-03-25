<script setup>
import { ref, onMounted } from 'vue';
import { format } from 'date-fns';

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
        <div class="col-md-4" v-for="event in events" :key="event.id">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ event.name }}</h3>
                    <p class="text-secondary">{{ format(event.starts_at, 'MMM d, yyyy hh:mm a') }} to {{ format(event.ends_at, 'MMM d, yyyy hh:mm a') }}</p>
                    <p class="card-text">{{ event.description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
