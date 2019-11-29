<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuDatabaseSeeder::class);
        $this->call(ColorDatabaseSeeder::class);
        $this->call(ProfileDatabaseSeeder::class);
        $this->call(FrontDatabaseSeeder::class);
    }
}
class MenuDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insert(
            [
                [
                    'profile_id' => '1',
                    'name'=>'Readable Text'
                ],[
                'profile_id' => '1',
                'name'=>'Change Font'
            ],[
                'profile_id' => '1',
                'name'=>'Color More'
            ],[
                'profile_id' => '1',
                'name'=>'Highlight'
            ],[
                'profile_id' => '1',
                'name'=>'Ship Link'
            ],[
                'profile_id' => '1',
                'name'=>'Screen Settings'
            ],[
                'profile_id' => '1',
                'name'=>'Zoom'
            ],[
                'profile_id' => '1',
                'name'=>'Contrast'
            ],[
                'profile_id' => '1',
                'name'=>'Tool Tip'
            ],[
                'profile_id' => '1',
                'name'=>'Other'
            ]

            ]
        );
    }
}
class ColorDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('contrasts')->insert(
            [
                [
                    'color' => 'NULL',
                    'background'=>'NULL'
                ],[
                    'color' => '#000000',
                    'background'=>'#fff'
                ],[
                    'color' => '#b33016',
                    'background'=>'#fff'
                ],[
                    'color' => '#0a5e82',
                    'background'=>'#fff'
                ],[
                    'color' => '#1e6c13',
                    'background'=>'#fff'
                ],[
                    'color' => '#fff',
                    'background'=>'#1e6c13'
                ],[
                    'color' => '#fff',
                    'background'=>'#0a5e82'
                ],[
                    'color' => '#fff',
                    'background'=>'#b33016'
                ],[
                    'color' => '#000000',
                    'background'=>'#c3bfb8'
                ],[
                    'color' => '#aba7a1',
                    'background'=>'#000000'
                ],[
                    'color' => '#fff',
                    'background'=>'#000000'
                ],[
                    'color' => '#000000',
                    'background'=>'#3fe32a'
                ],[
                    'color' => '#000000',
                    'background'=>'#18a9eb'
                ],[
                    'color' => '#000000',
                    'background'=>'#f2421e'
                ],[
                    'color' => '#ffffff',
                    'background'=>'#4a54f3'
                ],[
                    'color' => '#f2421e',
                    'background'=>'#000000'
                ],[
                    'color' => '#18a9eb',
                    'background'=>'#000000'
                ],[
                    'color' => '#3fe32a',
                    'background'=>'#000000'
                ],[
                    'color' => '#000000',
                    'background'=>'#f22aa9'
                ],[
                    'color' => '#fff630',
                    'background'=>'#000000'
                ],[
                    'color' => '#000000',
                    'background'=>'#fff630'
                ]

            ]
        );
    }
}
class ProfileDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile')->insert(
            [
                [
                    'name' => 'Elderly',
                    'image'=>'ederly.png',
                    'url'=>'elderly'
                ],[
                    'name' => 'Situational',
                    'image'=>'situational.png',
                    'url'=>'elderly'
                ],[
                    'name' => 'Dyslexia',
                    'image'=>'dyslexia.png',
                    'url'=>'elderly'
                ],[
                    'name' => 'Mobility Impaired',
                    'image'=>'mobility_impaired.png',
                    'url'=>'elderly'
                ],[
                    'name' => 'Visually Impaired',
                    'image'=>'visually_impaired.png',
                    'url'=>'elderly'
                ],
            ]
        );
    }
}
class FrontDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('fonts')->insert(
            [
                [
                    'name' => 'Default',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-default'
                ],[
                    'name' => 'VerDana',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-verdana'
                ],[
                    'name' => 'Arial',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-arial'
                ],[
                    'name' => 'Tohoma',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-tohoma'
                ],[
                    'name' => 'Comic Sans MS',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-comic-sans-ms'
                ],[
                    'name' => 'Open Sans',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-open-sans'
                ],[
                    'name' => 'Roboto',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-roboto'
                ],[
                    'name' => 'Helvetica',
                    'url'=>'null',
                    'font_face'=>'readable-fonts-helvetica'
                ]
            ]
        );
    }
}