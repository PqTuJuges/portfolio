<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({ projects: Array });
</script>

<template>
    <Head title="Projets" />

    <div class="p-6">
        <h1 class="text-2xl font-semibold">Projets</h1>
        <ul class="mt-4 space-y-2">
            <li v-for="project in projects" :key="project.id">
                {{ project.title }}
            </li>
        </ul>
    </div>
</template>
