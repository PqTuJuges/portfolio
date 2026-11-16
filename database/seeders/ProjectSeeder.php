<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $php = Tag::create(['name' => 'PHP', 'slug' => 'php']);
        $blade = Tag::create(['name' => 'Blade', 'slug' => 'blade']);
        $css = Tag::create(['name' => 'CSS', 'slug' => 'css']);
        $vue = Tag::create(['name' => 'Vue', 'slug' => 'vue']);
        $javascript = Tag::create(['name' => 'JavaScript', 'slug' => 'javascript']);
        $html = Tag::create(['name' => 'HTML', 'slug' => 'html']);

        $perdu = Project::create([
            'title' => 'Perdu de vue',
            'slug' => 'perdu-de-vue',
            'summary' => 'Application web de gestion des objets trouvés (gare, train) : liste, filtres par lieu et par couleur, ajout d\'un objet.',
            'content' => '<p>Contexte : Site de gestion objets trouvés</p>',
            'cover_path' => 'images/perdudevue.jpg',
            'demo_url' => null,
            'repo_url' => null,
            'published_at' => now(),
            'position' => 1,
        ]);
        $perdu->tags()->attach([$php->id, $blade->id]);

        $sitephp = Project::create([
            'title' => 'Site PHP',
            'slug' => 'site-php',
            'summary' => 'Site en PHP avec une page d\'accueil, une page de contact et une connexion, partagés par un en-tête et un pied de page communs.',
            'content' => '<p>Contexte : Site avec page connexion , contact et accueil</p>',
            'cover_path' => 'images/sitephpcontact.jpg',
            'demo_url' => null,
            'repo_url' => null,
            'published_at' => now(),
            'position' => 2,
        ]);
        $sitephp->tags()->attach([$php->id, $css->id]);

        $todolist = Project::create([
            'title' => 'Todolist',
            'slug' => 'todolist',
            'summary' => 'Liste de tâches en Vue.js : ajout, suppression, cases à cocher, compteur de tâches terminées, tri et réorganisation par flèches.',
            'content' => '<p>Contexte : une page avec une todolist </p>',
            'cover_path' => 'images/todolist.jpg',
            'demo_url' => null,
            'repo_url' => null,
            'published_at' => now(),
            'position' => 3,
        ]);
        $todolist->tags()->attach([$vue->id, $javascript->id, $html->id]);
    }
}
