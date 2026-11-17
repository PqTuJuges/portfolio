<script setup>
import { Form, Head } from '@inertiajs/vue3';
import ProjectController from '@/actions/App/Http/Controllers/Admin/ProjectController';
import InputError from '@/components/InputError.vue';
import RichTextEditor from '@/components/RichTextEditor.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { Textarea } from '@/components/ui/textarea';
import { create, index } from '@/routes/admin/projects';

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Projets', href: index() },
            { title: 'Nouveau projet', href: create() },
        ],
    },
});

defineProps({
    tags: Array,
});
</script>

<template>
    <Head title="Nouveau projet" />

    <div class="max-w-2xl p-6">
        <h1 class="mb-6 text-2xl font-semibold">Nouveau projet</h1>

        <Form
            v-bind="ProjectController.store.form()"
            v-slot="{ errors, processing, progress }"
            novalidate
            class="flex flex-col gap-6"
        >
            <div class="grid gap-2">
                <Label for="title">Titre</Label>
                <Input id="title" name="title" type="text" required />
                <InputError :message="errors.title || errors.slug" />
            </div>

            <div class="grid gap-2">
                <Label for="summary">Résumé</Label>
                <Textarea id="summary" name="summary" rows="3" required />
                <InputError :message="errors.summary" />
            </div>

            <div class="grid gap-2">
                <Label>Contenu</Label>
                <RichTextEditor name="content" label="Contenu du projet" />
                <InputError :message="errors.content" />
            </div>

            <div class="grid gap-2">
                <Label for="demo_url">Lien de la démo</Label>
                <Input id="demo_url" name="demo_url" type="url" />
                <InputError :message="errors.demo_url" />
            </div>

            <div class="grid gap-2">
                <Label for="repo_url">Lien du code</Label>
                <Input id="repo_url" name="repo_url" type="url" />
                <InputError :message="errors.repo_url" />
            </div>

            <div class="grid gap-2">
                <Label for="cover">Image de couverture</Label>
                <Input id="cover" name="cover" type="file" accept="image/*" />
                <progress
                    v-if="progress"
                    :value="progress.percentage"
                    max="100"
                    class="w-full"
                >
                    {{ progress.percentage }} %
                </progress>
                <InputError :message="errors.cover" />
            </div>

            <fieldset class="grid gap-2">
                <legend class="mb-2 text-sm font-medium">Technologies</legend>
                <div
                    v-for="tag in tags"
                    :key="tag.id"
                    class="flex items-center gap-2"
                >
                    <Checkbox
                        :id="`tag-${tag.id}`"
                        name="tags[]"
                        :value="String(tag.id)"
                    />
                    <Label :for="`tag-${tag.id}`">{{ tag.name }}</Label>
                </div>
                <InputError :message="errors.tags" />
            </fieldset>

            <div>
                <Button type="submit" :disabled="processing">
                    <Spinner v-if="processing" />
                    Créer le projet
                </Button>
            </div>
        </Form>
    </div>
</template>
