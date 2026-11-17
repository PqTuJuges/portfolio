<script setup>
import { Form, Head, Link } from "@inertiajs/vue3";
import ProjectController from "@/actions/App/Http/Controllers/Admin/ProjectController";
import { Button } from "@/components/ui/button";
import {
  Dialog,
  DialogClose,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/components/ui/dialog";
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import { create, edit, index } from "@/routes/admin/projects";

defineOptions({
  layout: {
    breadcrumbs: [{ title: "Projets", href: index() }],
  },
});

defineProps({
  projects: Array,
});
</script>

<template>
  <Head title="Projets" />

  <div class="p-6">
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-2xl font-semibold">Projets</h1>
      <Button as-child>
        <Link :href="create()">Nouveau projet</Link>
      </Button>
    </div>

    <Table>
      <TableHeader>
        <TableRow>
          <TableHead>Titre</TableHead>
          <TableHead>Adresse</TableHead>
          <TableHead class="text-right">Actions</TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        <TableRow v-for="project in projects" :key="project.id">
          <TableCell class="font-medium">{{ project.title }}</TableCell>
          <TableCell>/projets/{{ project.slug }}</TableCell>
          <TableCell class="flex justify-end gap-2">
            <Button as-child variant="outline" size="sm">
              <Link :href="edit(project)">Modifier</Link>
            </Button>

            <Dialog>
              <DialogTrigger as-child>
                <Button variant="destructive" size="sm"> Supprimer </Button>
              </DialogTrigger>
              <DialogContent>
                <Form
                  v-bind="ProjectController.destroy.form(project)"
                  v-slot="{ processing }"
                  class="space-y-6"
                >
                  <DialogHeader>
                    <DialogTitle>
                      Supprimer « {{ project.title }} » ?
                    </DialogTitle>
                    <DialogDescription>
                      Cette action est définitive : le projet disparaîtra du
                      site.
                    </DialogDescription>
                  </DialogHeader>
                  <DialogFooter class="gap-2">
                    <DialogClose as-child>
                      <Button type="button" variant="secondary">
                        Annuler
                      </Button>
                    </DialogClose>
                    <Button
                      type="submit"
                      variant="destructive"
                      :disabled="processing"
                    >
                      Supprimer
                    </Button>
                  </DialogFooter>
                </Form>
              </DialogContent>
            </Dialog>
          </TableCell>
        </TableRow>
      </TableBody>
    </Table>
  </div>
</template>
