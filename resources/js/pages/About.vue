<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="À propos">
        <meta head-key="description" name="description"
            content="Mon parcours, ma formation à l'IFOSUP Wavre et les technologies que j'utilise." />
    </Head>

    <article class="prose max-w-none py-8 dark:prose-invert">
        <h1 class="font-display">À propos</h1>
        <p>
            Étudiant en BES Développeur web à l'IFOSUP Wavre, je cherche un stage
            en développement web.
        </p>
        <h2 class="font-display">Ce que j'utilise</h2>
        <ul>
            <li>PHP et Laravel</li>
            <li>Vue.js et Inertia</li>
            <li>HTML, CSS et Tailwind</li>
        </ul>
    </article>
</template>
