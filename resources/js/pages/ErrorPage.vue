<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { home } from '@/routes';

const props = defineProps({ status: Number });

const title = computed(() =>
    props.status === 404 ? 'Page introuvable' : 'Accès refusé',
);

const message = computed(() =>
    props.status === 404
        ? "La page que vous cherchez n'existe pas ou a été déplacée."
        : "Vous n'avez pas le droit d'accéder à cette page.",
);
</script>

<template>
    <Head :title="title" />
    <h1>{{ status }}</h1>
    <h2>{{ title }}</h2>
    <p>{{ message }}</p>
    <Link :href="home()">Retour à l'accueil</Link>
</template>
