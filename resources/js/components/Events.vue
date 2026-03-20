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
            events.value = data.data;
        });
});
</script>

<template>
<h2 class="my-5">Events</h2>
<div class="container">
    <div class="events row gx-4 gy-5">
        <div class="col-md-4" v-for="event in events" :key="event.id">
            <div class="card border-primary">
                <div class="card-body">
                    <h3 class="card-title">{{ event.name }}</h3>
                    <span class="badge text-bg-primary mb-3"><i class="bi bi-calendar" style="margin-right: 0.5rem;"></i> {{ format(event.starts_at, 'MMM d') }} - {{ format(event.ends_at, 'MMM d, yyyy') }}</span>
                    <p class="card-text text-truncate">{{ event.description }}</p>
                    <p><i class="bi bi-pin-map"></i> {{ event.location }}</p>
                    <hr>
                    <p>
                        <a href="#" class="d-flex justify-content-between"><span>More Info</span> <i class="bi bi-arrow-right-square" style="font-size: 1.2rem; "></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
