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
/* 
        $vehicle = [];

        $vehicles = array(
            array("Volvo", 200000, "assets/img/volvo.jpg"),
            array("Mercedes-Benz", 500000, "assets/img/Mercedes-Benz.jpg"),
            array("Toyota", 400000, "assets/img/toyota.jpg"),
            array("Hyundai", 400000, "assets/img/hyundai.jpg")
        );

        for ($row = 0; $row < 4; $row++) {

            for ($col = 0; $col < 3; $col++) {

                array_push($vehicle, $vehicles[$row][$col]);
            }
            return [
                'brand' => $vehicle[$row],
                'cost' => $vehicle[$row],
                'img_url' => $vehicle[$row]
            ];
        }  */
        /*
        DB::table('vehicles')->insert([
            'brand' => 'Mercedes-Benz',
            'cost' => 500000,
            'img_url' => "assets/img/Mercedes-Benz.jpg"
        ]);
        DB::table('vehicles')->insert([
            'brand' => 'Volvo',
            'cost' => 200000,
            'img_url' => "assets/img/volvo.jpg"
        ]);
        DB::table('vehicles')->insert([
            'brand' => 'Hyundai',
            'cost' => 400000,
            'img_url' => "assets/img/hyundai.jpg"
        ]);
        DB::table('vehicles')->insert([
            'brand' => 'Toyota',
            'cost' => 400000,
            'img_url' => "assets/img/toyota.jpg"
        ]);
        */
 
      /*  $vehicles = [
            ["Volvo", 200000, "assets/img/volvo.jpg"],
            ["Mercedes-Benz", 500000, "assets/img/Mercedes-Benz.jpg"],
            ["Toyota", 400000, "assets/img/toyota.jpg"],
            ["Hyundai", 400000, "assets/img/hyundai.jpg"],
       ]; */



   /*      $vehicles = array(
            array("Volvo", 200000, "assets/img/volvo.jpg"),
            array("Mercedes-Benz", 500000, "assets/img/Mercedes-Benz.jpg"),
            array("Toyota", 400000, "assets/img/toyota.jpg"),
            array("Hyundai", 400000, "assets/img/hyundai.jpg")
        ); */


       /*  foreach ($vehicles as $vehicle) {

            DB::table('vehicles')->insert([
                'brand' => $vehicle[0],
                'cost' => $vehicle[1],
                'img_url' => $vehicle[2],
            ]);
        };  */
    }
}
