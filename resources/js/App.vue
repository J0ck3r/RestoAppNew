<template>
    <component :is="layoutComponent">
        <Head />
        <slot />
    </component>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { usePage, Head } from '@inertiajs/vue3'

// Layout-Imports
import AdminLayout         from '@/layouts/AdminLayout.vue'
import OwnerLayout         from '@/layouts/OwnerLayout.vue'
import RestaurantLayout    from '@/layouts/RestaurantLayout.vue'
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'

const page = usePage()

// Mappt die Rolle (aus page.props.auth.user.roles[0]) auf das Layout
const layoutComponent = computed(() => {
    const role = page.props.auth?.user?.roles?.[0] ?? null

    switch (role) {
        case 'Admin':
            return AdminLayout
        case 'Owner':
            return OwnerLayout
        case 'Restaurant':
            return RestaurantLayout
        default:
            return AuthenticatedLayout
    }
})
</script>
