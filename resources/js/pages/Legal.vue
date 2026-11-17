<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Mentions légales">
        <meta
            head-key="description"
            name="description"
            content="Éditeur, hébergeur et données personnelles du portfolio de Mathias."
        />
    </Head>

    <article class="prose max-w-none py-8 dark:prose-invert">
        <h1 class="font-display">Mentions légales</h1>

        <h2>Éditeur du site</h2>
        <p>
            Mathias Malo, étudiant à l'IFOSUP Wavre. Contact : par le formulaire de
            la page Contact.
        </p>

        <h2>Hébergeur</h2>
        <p>OVH SAS, 2 rue Kellermann, 59100 Roubaix, France.</p>

        <h2>Données personnelles</h2>
        <p>
            Le formulaire de contact enregistre votre nom, votre adresse e-mail
            et votre message, pour vous répondre et pour rien d'autre. Ils ne
            sont ni vendus ni transmis. Écrivez-moi pour les faire effacer.
        </p>

        <h2>Cookies</h2>
        <p>
            Ce site ne dépose aucun cookie de mesure d'audience ni de publicité.
            Il utilise seulement les cookies techniques nécessaires à son
            fonctionnement (session et protection des formulaires).
        </p>
    </article>
</template>
