<script setup>
import { Link } from '@inertiajs/vue3';
import { about, contact, home } from '@/routes';
import { index as projectsIndex } from '@/routes/projects';
</script>

<template>
    <header>
        <Link :href="home()">Mathias</Link>
        <nav>
            <Link :href="projectsIndex()">Projets</Link>
            <Link :href="about()">À propos</Link>
            <Link :href="contact()">Contact</Link>
        </nav>
    </header>

    <main>
        <slot />
    </main>

    <footer>
        <p>© Mathias</p>
    </footer>
</template>
