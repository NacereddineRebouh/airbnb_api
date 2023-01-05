<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rooms;
use Faker\Core\File;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Rooms::factory()->count(10)->state(new Sequence(
        //     ['By' => 'admin'],
        //     ['By' => 'admin2'],
        // ))->state(new Sequence(
        //     ['product_image' => 'storage/uploads/image1.jpg'],
        //     ['product_image' => 'storage/uploads/image2.jpg'],
        //     ['product_image' => 'storage/uploads/image3.jpg'],
        //     ['product_image' => 'storage/uploads/image4.jpg'],
        // ))->state(new Sequence(
        //     ['category' => 'roots'],
        //     ['category' => 'flowers'],
        //     ['category' => 'nuts&seeds'],
        //     ['category' => 'leaves'],
        // ))->create();

        $json = file_get_contents("database/data/EU_record.json");
        $json_a = json_decode($json, true);

        foreach ($json_a as $key => $value) {
            Rooms::create([
                "property_name"=>$value['name']??"None",
                "type"=>$value['type']??"None",
                "guests"=>$value['persons']??0,
                "bedrooms"=>$value['bedrooms']??0,
                "bathrooms"=>$value['bathrooms']??0,
                "beds"=>$value['beds']??0,
                "location" => $value['address']??"Nowhere",
                "long" => $value['lng']??0,
                "lat" => $value['lat']??0,
                "images" => implode(',', $value['images'])??"none",
                "price" => $value['price']["rate"]??0,
                "distance" => rand(50,2000),
            ]);
            echo nl2br("added \n");
        }
    }
}
