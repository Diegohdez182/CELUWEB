<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events=[
            [
                'event'=>'prueba laboral',
                'start_date'=>'2024-07-12 8:00',
                'end_date'=>'2024-07-12 10:00',
            ],
            [
                'event'=>'vacaciones',
                'start_date'=>'2024-07-20 8:00',
                'end_date'=>'2024-07-25 22:00',
            ],
            [
                'event'=>'dia laboral presencial',
                'start_date'=>'2024-07-20 8:00',
                'end_date'=>'2024-07-25 22:00',
            ],
        ];
        foreach($events as $event)
        {
            Event::create($event);
        }
    }
}
