<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $vehicles = array(
            array("Volvo", "Full option AC with Oxygen for life support", "2018", 20000, "img_1.jpg"),
            array("Mercedes-Benz", "Full option AC with Oxygen for life support", "2015",  30000, "img_2.jpg"),
            array("Toyota", "Full option AC with Oxygen for life support", "2019", 25000, "img_3.jpg"),
            array("Hyundai", "Full option AC with Oxygen for life support", "2016", 20000, "img_4.jpg")
        );
        for ($row = 0; $row < 4; $row++) {

            DB::table('vehicles')->insert([
                'brand' => $vehicles[$row][0],
                'description' => $vehicles[$row][1],
                'model' => $vehicles[$row][2],
                'cost' => $vehicles[$row][3],
                'img_url' => $vehicles[$row][4],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
