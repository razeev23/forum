<?php

use Illuminate\Database\Seeder;

class ChannelSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title'=>'Science','slug'=>str_slug('Science')];
        $channel2 = ['title'=>'OptMath','slug'=>str_slug('OptMath')];
        $channel3 = ['title'=>'CompMath','slug'=>str_slug('CompMath')];
        $channel4 = ['title'=>'Nepali','slug'=>str_slug('Nepali')];
        App\Channel ::create($channel1);
        App\Channel ::create($channel2);
        App\Channel ::create($channel3);
        App\Channel ::create($channel4);
    }
}
