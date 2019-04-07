<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 ='Impleminting oauth wiht  passport';
        $t2 = 'implemint vujeus';
        $t3 = 'Vujes event listners for child components';
        $t4 ='Laravel homestead error -undected database';

        $d1 = [
                'title'=>$t1,
                'content'=>'lorempsum is the ipsum creatd by loreum ',
                'channel_id'=>1,
                'user_id'=>2,
                'slug'=>str_slug($t1)
              
        ];

        $d2 = [
            'title'=>$t2,
            'content'=>'lorempsum is the ipsum creatd by loreum ',
            'channel_id'=>2,
            'user_id'=>1,
            'slug'=>str_slug($t2)
          
            ];

            $d3 = [
                'title'=>$t3,
                'content'=>'lorempsum is the ipsum creatd by loreum ',
                'channel_id'=>2,
                'user_id'=>1,
                'slug'=>str_slug($t3)
              
            ];

            $d4 = [
                'title'=>$t4,
                'content'=>'lorempsum is the ipsum creatd by loreum ',
                'channel_id'=>5,
                'user_id'=>1,
                'slug'=>str_slug($t4)
              
            ];

            App\Discussion::create($d1);
            App\Discussion::create($d2);
            APp\Discussion::create($d3);
            App\Discussion::create($d4);
    }
}
