<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = [
            'Cho thuê màn hinh ánh sáng',
            'Cho thuê màn hình LED',
            'Dịch vụ thương mại',
            'Thi công PhotoBooth và Backdrop',
            'Tổ chức sự kiện',
            'Quay phim - Chụp hình sự kiện chuyên nghiệp tại IQ Media',
        ];

        foreach ($categories as $category) {
            for ($i = 0; $i < 10; $i++) {
                Post::create([
                    'title' => $faker->sentence,
                    'content' => $faker->paragraphs(3, true),
                    'image' => 'posts/conca.jpg', // hoặc fake ảnh nếu muốn
                    'category' => $category,
                    'status' => 'published',
                ]);
            }
        }
    }
}
