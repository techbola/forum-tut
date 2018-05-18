<?php

use Illuminate\Database\Seeder;

use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$r1 = [

    		'user_id' => 1,
    		'discussion_id' => 1,
    		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.'

    	];
    	$r2 = [

    		'user_id' => 2,
    		'discussion_id' => 1,
    		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.'

    	];
    	$r3 = [

    		'user_id' => 1,
    		'discussion_id' => 2,
    		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.'

    	];
    	$r4 = [

    		'user_id' => 2,
    		'discussion_id' => 2,
    		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur mauris id arcu tincidunt ornare. Suspendisse non sapien dignissim arcu molestie volutpat. Vivamus ac ex tristique, ultrices nibh nec, facilisis libero.'

    	];

    	Reply::create($r1);
    	Reply::create($r2);
    	Reply::create($r3);
    	Reply::create($r4);

    }
}
