<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Sarah Jenkins',
                'company' => 'Logistics Global UK',
                'message' => 'Cogear completely transformed our supply chain with their AI Agent framework. We saw a 30% increase in efficiency within the first quarter.',
                'rating' => 5,
            ],
            [
                'client_name' => 'Dr. Michael Chen',
                'company' => 'MedVision Research',
                'message' => 'The computer vision solution developed by Cogear is world-class. Their team understands the complexity of healthcare data like no other.',
                'rating' => 5,
            ],
            [
                'client_name' => 'Emma Watson',
                'company' => 'Vogue Digital',
                'message' => 'Stunning UI and rock-solid performance. Cogear delivered a headless e-commerce experience that redefined our brand presence.',
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(['client_name' => $testimonial['client_name']], $testimonial);
        }
    }
}
