<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({ project: Object });
</script>

<template>

    <Head :title="project.title">
        <meta head-key="description" name="description" :content="project.summary" />
    </Head>


    <article class="space-y-6 py-8">
        <h1 class="font-display text-3xl font-bold md:text-4xl">
            {{ project.title }}
        </h1>
        <p class="text-lg text-muted-foreground">{{ project.summary }}</p>

        <img v-if="project.cover_url" :src="project.cover_url" alt="" width="1200" height="675"
            class="aspect-video w-full rounded-lg object-cover" />

        <ul class="flex flex-wrap gap-2">
            <li v-for="tag in project.tags" :key="tag" class="rounded bg-secondary px-2 py-1 text-sm">
                {{ tag }}
            </li>
        </ul>

        <div class="prose max-w-none dark:prose-invert prose-a:text-brand" v-html="project.content"></div>

        <p class="flex gap-4">
            <a v-if="project.demo_url" :href="project.demo_url" class="text-brand underline">Démo</a>
            <a v-if="project.repo_url" :href="project.repo_url" class="text-brand underline">Code</a>
        </p>
    </article>
</template>
