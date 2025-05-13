<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3'

// Optional: Du kannst hier noch Props oder Zustand auslesen
const page = usePage()
const user = page.props.auth.user
</script>

<template>
    <!-- Meta-Titel für die Seite -->
    <Head>
        <title>Dashboard</title>
    </Head>

    <!-- Hauptinhalt -->
    <div class="flex flex-1 flex-col gap-4 p-4 pt-0">
        <!-- Beispiel-Kartenzeile -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="bg-sidebar aspect-video rounded-xl"></div>
            <div class="bg-sidebar aspect-video rounded-xl"></div>
            <div class="bg-sidebar aspect-video rounded-xl"></div>
        </div>

        <!-- Langer Inhaltsbereich -->
        <div class="bg-sidebar min-h-[100vh] flex-1 rounded-xl md:min-h-min">
            <!-- Hier z. B. personalisierte Begrüßung -->
            <h2 class="text-lg font-semibold mb-4">
                Willkommen zurück, {{ user.name }}!
            </h2>
            <!-- Weitere Dashboard-Widgets… -->
        </div>
    </div>
</template>
