<?php
//
//use Illuminate\Database\Seeder;
//
//class DatabaseSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     *
//     * @return void
//     */
//    public function run()
//    {
////         $this->call(SuperAdminsTableSeeder::class);
//        $comments = factory(\App\Models\Entities\Comment::class, 30)->create();
//        factory(\App\Models\Entities\Event::class, 15)->create()->each(function ($event) use ($comments) {
//            $event->comments()->attach($comments->pluck('id')->random(rand(2, 5)));
//        });
//    }
//}
