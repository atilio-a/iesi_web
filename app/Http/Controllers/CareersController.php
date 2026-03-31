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
                'slug' => 'emprendedurismo-intercultural',
                'name' => 'Tecnicatura Superior en Emprendedurismo',
                'summary' => 'Liderar la innovación comercial promoviendo el desarrollo sustentable.',
                'description' => 'CFormar profesionales capaces de desarrollar, gestionar y liderar proyectos emprendedores innovadores. Los egresados estarán preparados para identificar oportunidades de negocio, elaborar planes de acción, gestionar recursos y promover la sostenibilidad económica y social de sus iniciativas. Se busca también fomentar habilidades de liderazgo, creatividad y pensamiento estratégico, integrando conocimientos teóricos y prácticos en entornos reales de emprendimiento.',
                'duration' => '3 años',
                'modality' => 'Presencial con instancias territoriales',
            ],
            [
                'slug' => 'comunitario-turismo',
                'name' => 'Tecnicatura Superior en Guía de Turismo Comunitario',
                'summary' => 'Informar, orientar, guiar a visitantes, protegiendo el patrimonio cultural y natural.',
                'description' => 'Formar profesionales con sólida conexión cultural y capacidad de gestión del patrimonio comunitario, preparados para desempeñarse como facilitadores, promotores y protectores del patrimonio cultural, y compartirlo con visitantes, fomentando identidad, conocimiento y preservación.',
                'duration' => '3 años',
                'modality' => 'Presencial',
            ],
            [
                'slug' => 'derechos-comunitario',
                'name' => 'Tecnicatura Superior en Derechos Humanos',
                'summary' => 'Formar profesionales capaces de promover, proteger y difundir los derechos humanos.',
                'description' => 'Formar profesionales capaces de promover, proteger y difundir los derechos humanos en diversos ámbitos sociales y laborales, desarrollando competencias para la investigación, asesoría y gestión de proyectos vinculados a la promoción de la igualdad, la justicia y la inclusión.',
                'duration' => '3 años',
                'modality' => 'Presencial con prácticas',
            ],
            [
                'slug' => 'emergencias-y-salud-comunitario',
                'name' => 'Tecnicatura Superior en Gestión y Prevención de Emergencias',
                'summary' => 'Gestiona, previene, responde: ¡Lidera la protección de vidas y la comunidad!',
                'description' => 'El objetivo general es formar técnicos profesionales multidisciplinarios capacitados para la planificación, prevención, gestión y respuesta efectiva ante situaciones de emergencia. Esto incluye proteger vidas humanas, reducir daños materiales y ambientales, y promover la seguridad y bienestar de la comunidad.',
                'duration' => '3 años',
                'modality' => 'Presencial con prácticas',
            ],
        ];
    }
}
