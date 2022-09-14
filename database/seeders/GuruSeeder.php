<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // insert data ke table siswa menggunakan Faker
            $teacher = [
                [
                'namaguru' => 'Atin Supriatin',
                'mapel' => 'Sindo',
                ],
                
                [
                'namaguru' => 'Agus Diana',
                'mapel' => 'Progdas',
                ],

                [
                'namaguru' => 'Suho',
                'mapel' => 'DDG',
                ]
                ];
                foreach ($teacher as $key => $value) {
                    Teacher::create($value);
                }
        }
    }