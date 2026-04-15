<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Nexus AI Agent Framework',
                'description' => 'A comprehensive multi-agent system built for a Fortune 500 logistics company to automate their entire supply chain decision-making process. Integrating custom LLMs with real-time API feedback loops.',
                'tech_stack' => ['Python', 'LangChain', 'Laravel', 'Next.js'],
                'image_path' => 'projects/nexus.png',
            ],
            [
                'title' => 'Healthcare Vision Pro',
                'description' => 'Computer vision application for diagnostic assistance, helping radiologists detect early-stage anomalies in MRI scans with 98% accuracy. HIPAA-compliant architecture.',
                'tech_stack' => ['PyTorch', 'FastAPI', 'React', 'PostgreSQL'],
                'image_path' => 'projects/healthcare.png',
            ],
            [
                'title' => 'E-comm Infinity Platform',
                'description' => 'A global headless e-commerce solution for a luxury fashion brand. Features include AI-driven personalized shopping assistants and ultra-fast page loads.',
                'tech_stack' => ['Next.js', 'Sanity.io', 'Node.js', 'Stripe'],
                'image_path' => 'projects/ecommerce.png',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['title' => $project['title']], [
                'slug' => Str::slug($project['title']),
                'description' => $project['description'],
                'tech_stack' => $project['tech_stack'],
                'image_path' => $project['image_path'],
                'gallery' => [],
            ]);
        }
    }
}
