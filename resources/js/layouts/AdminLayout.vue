<!-- resources/js/layouts/AdminLayout.vue -->
<template>
    <!-- Vollbreite Container -->
    <CContainer fluid>
        <CRow>
            <!-- Sidebar-Spalte -->
            <CCol xs="auto" class="p-0">
                <CSidebar>
                    <!-- hier z. B. dein Navigationsbaum (.sidebar-nav) -->
                </CSidebar>
            </CCol>

            <!-- Hauptbereich -->
            <CCol class="p-0">
                <!-- Header oben -->
                <CHeader class="px-3 py-2">
                    <!-- z. B. Branding, Breadcrumb, User-Menu -->
                </CHeader>

                <!-- Content-Container -->
                <CContainer fluid class="p-4">
                    <slot />
                </CContainer>
            </CCol>
        </CRow>
    </CContainer>
</template>

<script setup lang="ts">
import {
    CContainer, // grundlegender Bootstrap-Container :contentReference[oaicite:0]{index=0}
    CRow,       // Bootstrap-Reihe :contentReference[oaicite:1]{index=1}
    CCol,       // Bootstrap-Spalte :contentReference[oaicite:2]{index=2}
    CSidebar,   // CoreUI Sidebar-Komponente :contentReference[oaicite:3]{index=3}
    CHeader     // CoreUI Header-Komponente :contentReference[oaicite:4]{index=4}
} from '@coreui/vue'
</script>
