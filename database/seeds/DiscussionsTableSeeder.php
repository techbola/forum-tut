<?php

use Illuminate\Database\Seeder;

use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $t1 = 'Implementing OAUTH2 with laravel passport';
        $t2 = 'Pagination in vuejs not working correctly';
        $t3 = 'Laravel homestead error - undetected database';

        $d1 = [

        	'title' => $t1,
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.',
        	'channel_id' => 1,
        	'user_id' => 1,
        	'slug' => str_slug($t1)

        ];
        $d2 = [

        	'title' => $t2,
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.',
        	'channel_id' => 2,
        	'user_id' => 2,
        	'slug' => str_slug($t2)

        ];
        $d3 = [

        	'title' => $t3,
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.',
        	'channel_id' => 1,
        	'user_id' => 2,
        	'slug' => str_slug($t3)

        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);

    }
}
