<?php

namespace Database\Seeders;

use App\Models\FirebaseConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirebaseConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FirebaseConfig::create(
            [
                'url'=>'',
                'server_key'=>''
            ]
        );
    }
}
