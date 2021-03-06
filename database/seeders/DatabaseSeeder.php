<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Furniture;
use App\Models\ImageFurniture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    
        Categories::create([
            'name' => 'Kursi',
            'slug' => 'kursi'
        ]);
        Categories::create([
            'name' => 'Meja',
            'slug' => 'meja'
        ]);
        Categories::create([
            'name' => 'Lampu',
            'slug' => 'lampu'
        ]);
        Furniture::create([
            'name' => 'Kursi Kayu',
            'slug' => 'kursi-kayu',
            'categories_id' => 1,
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus veritatis praesentium vel quo, suscipit officia maiores consequatur at? Nisi deleniti expedita at, distinctio libero, provident quam ab debitis, omnis quis placeat. Animi, accusantium error. Quam eum deleniti ex id maiores. Quis minima dolorem fugit nostrum ducimus earum! Accusantium, voluptatibus mollitia?',
            'price' => $faker->numberBetween($min = 1000, $max = 90000) / 100,
            'sold' => $faker->numberBetween($min = 10, $max = 900),
            'stock' =>  $faker->numberBetween($min = 100, $max = 9000),
        ]);
        Furniture::create([
            'name' => 'Kursi Gaming',
            'slug' => 'kursi-gaming',
            'categories_id' => 1,
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus veritatis praesentium vel quo, suscipit officia maiores consequatur at? Nisi deleniti expedita at, distinctio libero, provident quam ab debitis, omnis quis placeat. Animi, accusantium error. Quam eum deleniti ex id maiores. Quis minima dolorem fugit nostrum ducimus earum! Accusantium, voluptatibus mollitia?',
            'price' => $faker->numberBetween($min = 1000, $max = 90000) / 100,
            'sold' => $faker->numberBetween($min = 10, $max = 900),
            'stock' =>  $faker->numberBetween($min = 100, $max = 9000),
        ]);
        Furniture::create([
            'name' => 'Meja Kayu',
            'slug' => 'meja-kayu',
            'categories_id' => 2,
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus veritatis praesentium vel quo, suscipit officia maiores consequatur at? Nisi deleniti expedita at, distinctio libero, provident quam ab debitis, omnis quis placeat. Animi, accusantium error. Quam eum deleniti ex id maiores. Quis minima dolorem fugit nostrum ducimus earum! Accusantium, voluptatibus mollitia?',
            'price' => $faker->numberBetween($min = 1000, $max = 90000) / 100,
            'sold' => $faker->numberBetween($min = 10, $max = 900),
            'stock' =>  $faker->numberBetween($min = 100, $max = 9000),
        ]);
        Furniture::create([
            'name' => 'Meja Gaming',
            'slug' => 'meja-gaming',
            'categories_id' => 2,
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus veritatis praesentium vel quo, suscipit officia maiores consequatur at? Nisi deleniti expedita at, distinctio libero, provident quam ab debitis, omnis quis placeat. Animi, accusantium error. Quam eum deleniti ex id maiores. Quis minima dolorem fugit nostrum ducimus earum! Accusantium, voluptatibus mollitia?',
            'price' => $faker->numberBetween($min = 1000, $max = 90000) / 100,
            'sold' => $faker->numberBetween($min = 10, $max = 900),
            'stock' =>  $faker->numberBetween($min = 100, $max = 9000),
        ]);
        Furniture::create([
            'name' => 'Lampu Kuning',
            'slug' => 'lampu-kuning',
            'categories_id' => 3,
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus veritatis praesentium vel quo, suscipit officia maiores consequatur at? Nisi deleniti expedita at, distinctio libero, provident quam ab debitis, omnis quis placeat. Animi, accusantium error. Quam eum deleniti ex id maiores. Quis minima dolorem fugit nostrum ducimus earum! Accusantium, voluptatibus mollitia?',
            'price' => $faker->numberBetween($min = 1000, $max = 90000) / 100,
            'sold' => $faker->numberBetween($min = 10, $max = 900),
            'stock' =>  $faker->numberBetween($min = 100, $max = 9000),
        ]);
        Furniture::create([
            'name' => 'Lampu Putih',
            'slug' => 'lampu-putih',
            'categories_id' => 3,
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus veritatis praesentium vel quo, suscipit officia maiores consequatur at? Nisi deleniti expedita at, distinctio libero, provident quam ab debitis, omnis quis placeat. Animi, accusantium error. Quam eum deleniti ex id maiores. Quis minima dolorem fugit nostrum ducimus earum! Accusantium, voluptatibus mollitia?',
            'price' => $faker->numberBetween($min = 1000, $max = 90000) / 100,
            'sold' => $faker->numberBetween($min = 10, $max = 900),
            'stock' =>  $faker->numberBetween($min = 100, $max = 9000),
        ]);
        ImageFurniture::create([
            'furniture_id' => 1,
            'link' => '1.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 1,
            'link' => '2.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 1,
            'link' => '3.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 1,
            'link' => '4.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 2,
            'link' => '1.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 2,
            'link' => '2.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 2,
            'link' => '3.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 2,
            'link' => '4.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 2,
            'link' => '5.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 2,
            'link' => '6.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 3,
            'link' => '1.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 3,
            'link' => '2.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 3,
            'link' => '3.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 3,
            'link' => '4.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 3,
            'link' => '5.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 3,
            'link' => '6.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 4,
            'link' => '1.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 4,
            'link' => '2.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 4,
            'link' => '3.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 4,
            'link' => '4.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 4,
            'link' => '5.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 4,
            'link' => '6.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '1.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '2.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '3.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '4.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '5.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '6.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 5,
            'link' => '7.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '1.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '2.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '3.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '4.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '5.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '6.jpg'
        ]);
        ImageFurniture::create([
            'furniture_id' => 6,
            'link' => '7.jpg'
        ]);
    }
}
