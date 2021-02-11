<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('houses')->insert([
            [
                'Name' => 'The Victoria',
                'Price' => 374662,
                'Bedrooms' => 4,
                'Bathrooms' => 2,
                'Storeys' => 2,
                'Garages' => 2,
            ],
            [
                'Name' => 'The Xavier',
                'Price' => 513268,
                'Bedrooms' => 4,
                'Bathrooms' => 2,
                'Storeys' => 1,
                'Garages' => 2,
            ],
            [
                'Name' => 'The Como',
                'Price' => 454990,
                'Bedrooms' => 4,
                'Bathrooms' => 3,
                'Storeys' => 2,
                'Garages' => 3,
            ],
            [
                'Name' => 'The Aspen',
                'Price' => 384356,
                'Bedrooms' => 4,
                'Bathrooms' => 2,
                'Storeys' => 2,
                'Garages' => 2,
            ],
            [
                'Name' => 'The Lucretia',
                'Price' => 572002,
                'Bedrooms' => 4,
                'Bathrooms' => 3,
                'Storeys' => 2,
                'Garages' => 2,
            ],
            [
                'Name' => 'The Toorak',
                'Price' => 521951,
                'Bedrooms' => 5,
                'Bathrooms' => 2,
                'Storeys' => 1,
                'Garages' => 2,
            ],
            [
                'Name' => 'The Skyscape',
                'Price' => 263604,
                'Bedrooms' => 3,
                'Bathrooms' => 2,
                'Storeys' => 2,
                'Garages' => 2,
            ],
            [
                'Name' => 'The Clifton',
                'Price' => 386103,
                'Bedrooms' => 3,
                'Bathrooms' => 2,
                'Storeys' => 1,
                'Garages' => 1,
            ],
            [
                'Name' => 'The Geneva',
                'Price' => 390600,
                'Bedrooms' => 4,
                'Bathrooms' => 3,
                'Storeys' => 2,
                'Garages' => 2,
            ],
        ]);
    }
}
