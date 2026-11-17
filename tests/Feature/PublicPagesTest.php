<?php

use App\Models\Project;
use Inertia\Testing\AssertableInertia as Assert;

test('a project page has Open Graph tags in the HTML', function () {
    Project::factory()->create([
        'title' => 'Perdu de vue',
        'slug' => 'perdu-de-vue',
        'summary' => 'Gestion des objets trouvés.',
        'cover_path' => 'images/perdudevue.jpg',
    ]);

    $this->get('/projets/perdu-de-vue')
        ->assertOk()
        ->assertSee('<meta property="og:title" content="Perdu de vue">', false)
        ->assertSee('<meta property="og:description" content="Gestion des objets trouvés.">', false)
        ->assertSee('/storage/images/perdudevue.jpg', false);
});

test('the legal notice page exists', function () {
    $this->get('/mentions-legales')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Legal'));
});
