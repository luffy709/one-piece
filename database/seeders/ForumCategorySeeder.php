<?php

namespace Database\Seeders;

use App\Models\ForumAnswer;
use App\Models\ForumCategory;
use App\Models\ForumSubCategory;
use App\Models\ForumTopic;
use App\Models\User;
use Illuminate\Database\Seeder;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $categories = ForumCategory::factory(3)->create();

        $categories->map(function (ForumCategory $category) {
            ForumSubCategory::factory(2)->for($category)->create();
        });

        $subCategories = ForumSubCategory::all();

        $subCategories->map(function (ForumSubCategory $subcategory) use ($user) {
            ForumTopic::factory(3)->for($subcategory)->for($user)->create();
        });

        $topics = ForumTopic::all();

        $topics->map(function (ForumTopic $topic) use ($user) {
            ForumAnswer::factory(5)->for($topic)->for($user)->create();
        });
    }
}
