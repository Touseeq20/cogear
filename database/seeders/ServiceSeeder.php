<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'AI Development',
                'description' => 'Custom machine learning models and predictive analytics tailored to your unique data structures and business goals.',
                'icon' => 'brain',
            ],
            [
                'name' => 'AI Agents & Automation',
                'description' => 'Autonomous intelligent agents that automate complex multi-step workflows, saving thousands of manual hours.',
                'icon' => 'robot',
            ],
            [
                'name' => 'LLM & RAG Systems',
                'description' => 'Advanced Large Language Model implementations with Retrieval Augmented Generation for proprietary knowledge access.',
                'icon' => 'chat',
            ],
            [
                'name' => 'Full-Stack Web Apps',
                'description' => 'Scalable, high-performance web applications built with Next.js, React, and robust Laravel backends.',
                'icon' => 'code',
            ],
            [
                'name' => 'Computer Vision',
                'description' => 'High-end image and video recognition systems for security, healthcare diagnostics, and retail analytics.',
                'icon' => 'eye',
            ],
            [
                'name' => 'Mobile Experiences',
                'description' => 'Seamless, native-feeling mobile applications developed with React Native for iOS and Android reaching global audiences.',
                'icon' => 'device-mobile',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['name' => $service['name']], [
                'slug' => Str::slug($service['name']),
                'description' => $service['description'],
                'icon' => $service['icon'],
            ]);
        }
    }
}
