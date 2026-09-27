<?php

namespace Database\Seeders;

use App\Models\NewsEvent;
use Illuminate\Database\Seeder;

class NewsEventSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Annual Day Celebration',
                'slug' => 'annual-day-celebration',
                'category' => 'Event',
                'date' => '2026-08-15',
                'short_description' =>
                    'A memorable celebration of talent, creativity and achievement.',
                'content' =>
                    'Our school celebrated its Annual Day with performances, cultural activities and student achievements.',
            ],
            [
                'title' => 'Admissions Open for 2027-28',
                'slug' => 'admissions-open-2027-28',
                'category' => 'News',
                'date' => '2026-09-01',
                'short_description' =>
                    'Admission enquiries are now welcome for the upcoming academic session.',
                'content' =>
                    'Parents can submit an admission enquiry through our website. Our admissions team will get in touch with them.',
            ],
            [
                'title' => 'Inter-School Sports Meet',
                'slug' => 'inter-school-sports-meet',
                'category' => 'Event',
                'date' => '2026-08-20',
                'short_description' =>
                    'Students participated in a range of sporting activities.',
                'content' =>
                    'The Inter-School Sports Meet encouraged teamwork, discipline and a spirit of healthy competition.',
            ],
            [
                'title' => 'Student Science Exhibition',
                'slug' => 'student-science-exhibition',
                'category' => 'Achievement',
                'date' => '2026-07-25',
                'short_description' =>
                    'Young innovators presented their science projects and ideas.',
                'content' =>
                    'Students showcased creative models and experiments, demonstrating curiosity and practical learning.',
            ],
            [
                'title' => 'World Environment Day',
                'slug' => 'world-environment-day',
                'category' => 'Event',
                'date' => '2026-06-05',
                'short_description' =>
                    'Students took part in activities promoting environmental awareness.',
                'content' =>
                    'The school community participated in activities focused on protecting nature and keeping our surroundings clean.',
            ],
            [
                'title' => 'Academic Excellence Awards',
                'slug' => 'academic-excellence-awards',
                'category' => 'Achievement',
                'date' => '2026-05-15',
                'short_description' =>
                    'Celebrating students for their dedication and academic accomplishments.',
                'content' =>
                    'The school recognised students for their hard work, commitment to learning and academic accomplishments.',
            ],
        ];

        foreach ($items as $item) {
            NewsEvent::updateOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, [
                    'image' => null,
                    'is_published' => true,
                ])
            );
        }
    }
}