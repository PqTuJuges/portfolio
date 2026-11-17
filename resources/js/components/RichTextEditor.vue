<script setup>
import StarterKit from '@tiptap/starter-kit';
import { EditorContent, useEditor } from '@tiptap/vue-3';
import { onBeforeUnmount, ref } from 'vue';

const props = defineProps({
    name: String,
    defaultValue: { type: String, default: '' },
    label: String,
});

// Le HTML envoyé au serveur via le champ caché
const html = ref(props.defaultValue ?? '');

const editor = useEditor({
    content: props.defaultValue ?? '',
    extensions: [
        StarterKit.configure({
            heading: { levels: [2, 3] },
            strike: false,
            underline: false,
            horizontalRule: false,
            link: { openOnClick: false, defaultProtocol: 'https' },
        }),
    ],
    editorProps: {
        attributes: {
            role: 'textbox',
            'aria-multiline': 'true',
            'aria-label': props.label,
            class: 'prose prose-sm dark:prose-invert min-h-40 max-w-none p-3 focus:outline-none',
        },
    },
    onUpdate: ({ editor }) => {
        html.value = editor.isEmpty ? '' : editor.getHTML();
    },
});

onBeforeUnmount(() => {
    editor.value?.destroy();
});

function setLink() {
    const previous = editor.value.getAttributes('link').href ?? '';
    const url = window.prompt('Adresse du lien', previous);

    if (url === null) {
        return;
    }

    if (url === '') {
        editor.value.chain().focus().extendMarkRange('link').unsetLink().run();
        return;
    }

    editor.value.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
}

const buttons = [
    {
        label: 'Titre 2',
        text: 'H2',
        run: (e) => e.chain().focus().toggleHeading({ level: 2 }).run(),
        active: (e) => e.isActive('heading', { level: 2 }),
    },
    {
        label: 'Titre 3',
        text: 'H3',
        run: (e) => e.chain().focus().toggleHeading({ level: 3 }).run(),
        active: (e) => e.isActive('heading', { level: 3 }),
    },
    {
        label: 'Gras',
        text: 'G',
        run: (e) => e.chain().focus().toggleBold().run(),
        active: (e) => e.isActive('bold'),
    },
    {
        label: 'Italique',
        text: 'I',
        run: (e) => e.chain().focus().toggleItalic().run(),
        active: (e) => e.isActive('italic'),
    },
    {
        label: 'Liste à puces',
        text: '• Liste',
        run: (e) => e.chain().focus().toggleBulletList().run(),
        active: (e) => e.isActive('bulletList'),
    },
    {
        label: 'Liste numérotée',
        text: '1. Liste',
        run: (e) => e.chain().focus().toggleOrderedList().run(),
        active: (e) => e.isActive('orderedList'),
    },
    {
        label: 'Lien',
        text: 'Lien',
        run: () => setLink(),
        active: (e) => e.isActive('link'),
    },
    {
        label: 'Bloc de code',
        text: '</>',
        run: (e) => e.chain().focus().toggleCodeBlock().run(),
        active: (e) => e.isActive('codeBlock'),
    },
];
</script>

<template>
    <div class="rounded-md border border-input">
        <div v-if="editor" class="flex flex-wrap gap-1 border-b border-input p-2">
            <button
                v-for="button in buttons"
                :key="button.label"
                type="button"
                :aria-label="button.label"
                :aria-pressed="button.active(editor)"
                :class="[
                    'rounded px-2 py-1 text-sm font-medium hover:bg-accent',
                    button.active(editor) ? 'bg-accent' : '',
                ]"
                @click="button.run(editor)"
            >
                {{ button.text }}
            </button>
        </div>

        <EditorContent :editor="editor" />

        <input type="hidden" :name="name" :value="html" />
    </div>
</template>
