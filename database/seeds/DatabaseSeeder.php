<?php

use Illuminate\Database\Seeder;
use App\Channel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserstableSeeder::class);
         $this->call(ChannelSeederTable::class);
         $this->call(DiscussionsTableSeeder::class);
         $this->call(RepliesTableSeeder::class);
         $this->call(LikesTableSeeder::class);
    }
}
