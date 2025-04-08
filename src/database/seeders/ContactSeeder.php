<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Faker\Factory as Faker;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        $genders = ['male' => '男性', 'female' => '女性', 'other' => 'その他'];
        $categories = ['商品のお届けについて', '商品の交換について', '商品トラブル', 'ショップへのお問い合わせ', 'その他'];

        foreach (range(1,35) as $i){
            $genderKey = array_rand($genders);

            Contact::create([
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'gender' => $genders[$genderKey],
                'email' => $faker->unique()->safeEmail,
                'tel' => $faker->phoneNumber,
                'address' => $faker->address,
                'building' => $faker->secondaryAddress,
                'category' => $faker->randomElement($categories),
                'detail' => $faker->realText(100),
                'created_at' => $faker->dateTimeBetween('-2 months', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
