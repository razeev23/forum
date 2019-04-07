<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $r1 = [
                'user_id'=>1,
                'discussion_id'=>1,
                'content'=>'replies to loreumpipsim'
             ];
             $r2 = [
                'user_id'=>1,
                'discussion_id'=>2,
                'content'=>'replies to loreumpipsim'
             ];
             $r3 = [
                'user_id'=>2,
                'discussion_id'=>3,
                'content'=>'replies to loreumpipsim'
             ];
             $r4 = [
                'user_id'=>4,
                'discussion_id'=>4,
                'content'=>'replies to loreumpipsim'
             ];

             App\Reply::create($r1);
             App\Reply::create($r2);
             App\Reply::create($r3);
             App\Reply::create($r4);
    }
}
