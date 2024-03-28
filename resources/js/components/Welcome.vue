<script setup>
import { ref } from 'vue';

defineProps(['fullname']);
</script>

<template>
<p>Welcome {{ fullname }}</p>
</template>

<style scoped>

</style>
