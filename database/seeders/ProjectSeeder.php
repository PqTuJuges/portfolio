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
            'content' => '<h2>Contexte</h2>'
                . '<p>Projet de cours : une application pour gérer les objets trouvés dans une gare et dans les trains.</p>'
                . '<h2>Mon rôle</h2>'
                . '<p>J’ai réalisé seul l’application, de la base de données jusqu’aux pages.</p>'
                . '<h2>Le problème</h2>'
                . '<p>Retrouver rapidement un objet parmi des centaines, selon le lieu et la couleur.</p>'
                . '<h2>Mes choix</h2>'
                . '<ul><li>Laravel et Blade pour les pages</li><li>Des filtres par lieu et par couleur</li><li>Un formulaire d’ajout d’objet</li></ul>'
                . '<h2>Le résultat</h2>'
                . '<p>Une liste filtrable et un ajout d’objet fonctionnels.</p>'
                . '<h2>Ce que je changerais</h2>'
                . '<p>Ajouter une recherche par mot-clé et des photos des objets.</p>',

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
            'content' => '<h2>Contexte</h2>'
                . '<p>Mon premier site en PHP, réalisé en cours.</p>'
                . '<h2>Mon rôle</h2>'
                . '<p>J’ai écrit tout le code : pages, formulaires et mise en page.</p>'
                . '<h2>Le problème</h2>'
                . '<p>Éviter de recopier l’en-tête et le pied de page dans chaque page.</p>'
                . '<h2>Mes choix</h2>'
                . '<ul><li>Un en-tête et un pied de page inclus avec <code>include</code></li><li>Une page de contact et une page de connexion</li></ul>'
                . '<h2>Le résultat</h2>'
                . '<p>Trois pages qui partagent la même structure.</p>'
                . '<h2>Ce que je changerais</h2>'
                . '<p>Utiliser un framework comme Laravel pour la validation et la sécurité.</p>',

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
            'content' => '<h2>Contexte</h2>'
                . '<p>Exercice de cours pour apprendre Vue.js.</p>'
                . '<h2>Mon rôle</h2>'
                . '<p>J’ai développé seul toute la logique et l’interface.</p>'
                . '<h2>Le problème</h2>'
                . '<p>Garder l’affichage synchronisé avec la liste quand on ajoute, coche ou déplace une tâche.</p>'
                . '<h2>Mes choix</h2>'
                . '<ul><li>La réactivité de Vue pour mettre la liste à jour</li><li>Un compteur de tâches terminées</li><li>Des flèches pour réorganiser</li></ul>'
                . '<h2>Le résultat</h2>'
                . '<p>Une liste de tâches complète : ajout, suppression, tri et réorganisation.</p>'
                . '<h2>Ce que je changerais</h2>'
                . '<p>Sauvegarder les tâches pour qu’elles restent après un rechargement.</p>',

            'cover_path' => 'images/todolist.jpg',
            'demo_url' => null,
            'repo_url' => null,
            'published_at' => now(),
            'position' => 3,
        ]);
        $todolist->tags()->attach([$vue->id, $javascript->id, $html->id]);
    }
}
