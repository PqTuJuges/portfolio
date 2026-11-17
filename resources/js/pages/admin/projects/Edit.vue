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
import { edit, index } from '@/routes/admin/projects';

defineOptions({
    layout: (props) => ({
        breadcrumbs: [
            { title: 'Projets', href: index() },
            { title: props.project.title, href: edit(props.project) },
        ],
    }),
});

defineProps({
    project: Object,
    tags: Array,
});
</script>

<template>
    <Head :title="`Modifier ${project.title}`" />

    <div class="max-w-2xl p-6">
        <h1 class="mb-6 text-2xl font-semibold">Modifier le projet</h1>

        <Form
            v-bind="ProjectController.update.form(project)"
            v-slot="{ errors, processing, progress }"
            novalidate
            class="flex flex-col gap-6"
        >
            <div class="grid gap-2">
                <Label for="title">Titre</Label>
                <Input
                    id="title"
                    name="title"
                    type="text"
                    :default-value="project.title"
                    required
                />
                <InputError :message="errors.title" />
            </div>

            <div class="grid gap-2">
                <Label for="summary">Résumé</Label>
                <Textarea
                    id="summary"
                    name="summary"
                    rows="3"
                    :default-value="project.summary"
                    required
                />
                <InputError :message="errors.summary" />
            </div>

            <div class="grid gap-2">
                <Label>Contenu</Label>
                <RichTextEditor name="content" label="Contenu du projet" :default-value="project.content" />
                <InputError :message="errors.content" />
            </div>

            <div class="grid gap-2">
                <Label for="demo_url">Lien de la démo</Label>
                <Input
                    id="demo_url"
                    name="demo_url"
                    type="url"
                    :default-value="project.demo_url ?? ''"
                />
                <InputError :message="errors.demo_url" />
            </div>

            <div class="grid gap-2">
                <Label for="repo_url">Lien du code</Label>
                <Input
                    id="repo_url"
                    name="repo_url"
                    type="url"
                    :default-value="project.repo_url ?? ''"
                />
                <InputError :message="errors.repo_url" />
            </div>

            <div class="grid gap-2">
                <Label for="cover">Image de couverture</Label>
                <img
                    v-if="project.cover_url"
                    :src="project.cover_url"
                    alt=""
                    class="w-48 rounded"
                />
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
                        :default-value="project.tags.includes(tag.id)"
                    />
                    <Label :for="`tag-${tag.id}`">{{ tag.name }}</Label>
                </div>
                <InputError :message="errors.tags" />
            </fieldset>

            <div>
                <Button type="submit" :disabled="processing">
                    <Spinner v-if="processing" />
                    Enregistrer
                </Button>
            </div>
        </Form>
    </div>
</template>
