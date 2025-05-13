<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3'

// Optional: Du kannst hier noch Props oder Zustand auslesen
const user = usePage().props.auth.user
</script>

<template>
    <!-- Meta-Titel für die Seite -->
    <Head>
        <title>Dashboard</title>
    </Head>

    <!-- Hauptinhalt -->
    <div class="p-4">
        <h1>Willkommen, {{ user.name }}!</h1>
        <!-- CoreUI-Widgets hier… -->
    </div>
</template>
