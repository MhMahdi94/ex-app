<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Banner::create([
            'banner_title'=>['en'=>'Title En', 'ar'=>'Title Ar'],
        
        'banner_desc'=>['en'=>'Desc En', 'ar'=>'Desc Ar'],
        
        'banner_bg'=>'default.jpg',
        ]);
    }
}
