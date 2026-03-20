<script setup>
import { ref } from 'vue';

defineProps(['fullname']);
</script>

<template>
    <div class="card border-primary">
        <div class="card-body row p-4">
            <div class="col-2 bg-light rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">LL</div>
            <div class="col-auto">
                <h2>Welcome back, {{ fullname }}</h2>
                <p>Here's what's happening with your events</p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
