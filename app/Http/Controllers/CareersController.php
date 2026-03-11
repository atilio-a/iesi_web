<?php

namespace App\Http\Controllers;

class CareersController extends Controller
{
    public function index()
    {
        $careers = $this->careers();

        return view('careers.index', compact('careers'));
    }

    public function show(string $slug)
    {
        $careers = collect($this->careers());
        $career = $careers->firstWhere('slug', $slug);

        if (! $career) {
            abort(404);
        }

        return view('careers.show', compact('career'));
    }

    private function careers(): array
    {
        return [
            [
                'slug' => 'educacion-intercultural',
                'name' => 'Tecnicatura en Educación Intercultural',
                'summary' => 'Formación docente con enfoque comunitario.',
                'description' => 'Carrera orientada a fortalecer prácticas pedagógicas interculturales con participación comunitaria.',
                'duration' => '3 años',
                'modality' => 'Presencial con instancias territoriales',
            ],
            [
                'slug' => 'gestion-cultural',
                'name' => 'Tecnicatura en Gestión Cultural',
                'summary' => 'Promoción del patrimonio y la diversidad.',
                'description' => 'Formación en gestión de proyectos culturales, patrimonio material e inmaterial y producción comunitaria.',
                'duration' => '3 años',
                'modality' => 'Presencial',
            ],
            [
                'slug' => 'turismo-comunitario',
                'name' => 'Tecnicatura en Turismo Comunitario',
                'summary' => 'Turismo sostenible con identidad territorial.',
                'description' => 'Carrera enfocada en turismo comunitario, planificación territorial y hospitalidad intercultural.',
                'duration' => '3 años',
                'modality' => 'Presencial con prácticas en territorio',
            ],
        ];
    }
}
