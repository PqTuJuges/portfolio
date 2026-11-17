<?php

use App\Models\Project;

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
