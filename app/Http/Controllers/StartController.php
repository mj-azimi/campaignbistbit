<?php

namespace App\Http\Controllers;

use App\Models\Award_won;
use App\Models\Awards;
use App\Models\Queue;
use App\Models\Start;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class StartController extends Controller
{
    public function start()
    {
        Artisan::call('migrate');

        $status = Start::where('status',1)->get();
        foreach ($status as $item) {
            $status_col = $item->status;
        }
        if (!isset($status_col)) {
            $status = new Start ;
            $status->status=1;
            $status->save();


            // ledger nano S
            $start = new Awards;
            $start->name = '1 sol';
            $start->delivery_in_time = 50400;
            $start->time_open=Carbon::now()->addMinutes(50400);
            $start->number = 1;
            $start->number_left=1;
            $start->type = 'sat';
            $start->save();

            // mi band
            $start = new Awards;
            $start->name = '0.1 sol';
            $start->delivery_in_time = 25920;
            $start->time_open=Carbon::now()->addMinutes(25920);
            $start->number = 7;
            $start->number_left=7;
            $start->type = 'sat';
            $start->save();

            // 10,000 sat
            $start = new Awards;
            $start->name = '5 SFP';
            $start->delivery_in_time = 2880;
            $start->time_open=Carbon::now()->addMinutes(2880);
            $start->number = 20;
            $start->number_left= 20;
            $start->type = 'sat';
            $start->save();


            // 7,500 sat
            $start = new Awards;
            $start->name = '2400 SC';
            $start->delivery_in_time = 2460;
            $start->time_open=Carbon::now()->addMinutes(2460);
            $start->number = 5;
            $start->number_left= 5;
            $start->type = 'sat';
            $start->save();


            // 5,000 sat
            $start = new Awards;
            $start->name = '10 sand';
            $start->delivery_in_time = 2520;
            $start->time_open=Carbon::now()->addMinutes(2520);
            $start->number = 5;
            $start->number_left= 5;
            $start->type = 'sat';
            $start->save();


            // 2,000 sat
            $start = new Awards;
            $start->name = '150 celr';
            $start->delivery_in_time = 600;
            $start->time_open=Carbon::now()->addMinutes(600);
            $start->number = 20;
            $start->number_left= 20;
            $start->type = 'sat';
            $start->save();



            // 750 sat
            $start = new Awards;
            $start->name = '1200 SC';
            $start->delivery_in_time = 254;
            $start->time_open=Carbon::now()->addMinutes(254);
            $start->number = 50;
            $start->number_left= 50;
            $start->type = 'sat';
            $start->save();


            //250 sat
            $start = new Awards;
            $start->name = '1 SUSHI';
            $start->delivery_in_time = 152;
            $start->time_open=Carbon::now()->addMinutes(152);
            $start->number = 20;
            $start->number_left= 20;
            $start->type = 'sat';
            $start->save();


            //125 sat
            $start = new Awards;
            $start->name = '5 CTK';
            $start->delivery_in_time = 261;
            $start->time_open=Carbon::now()->addMinutes(261);
            $start->number = 50;
            $start->number_left= 50;
            $start->type = 'sat';
            $start->save();



            //400 T
            $start = new Awards;
            $start->name = '1 SAND';
            $start->delivery_in_time = 11520;
            $start->time_open=Carbon::now()->addMinutes(11520);
            $start->number = 20;
            $start->number_left= 20;
            $start->type = 'sat';
            $start->save();



            //200 T
            $start = new Awards;
            $start->name = '600 SC';
            $start->delivery_in_time = 10080;
            $start->time_open=Carbon::now()->addMinutes(10080);
            $start->number = 30;
            $start->number_left= 30;
            $start->type = 'sat';
            $start->save();


            //100 T
            $start = new Awards;
            $start->name = '12 SFP';
            $start->delivery_in_time = 6660;
            $start->time_open=Carbon::now()->addMinutes(6660);
            $start->number = 12;
            $start->number_left= 12;
            $start->type = 'sat';
            $start->save();



            //Discount -0/02 ٪
            $start = new Awards;
            $start->name = '-0/2 % تخفیف';
            $start->delivery_in_time = 540;
            $start->time_open=Carbon::now();
            $start->number = 10000;
            $start->number_left= 10000;
            $start->type = 'discount';
            $start->save();

            //Discount -0/03 ٪
            $start = new Awards;
            $start->name = '-0/3 % تخفیف';
            $start->delivery_in_time = 2760;
            $start->time_open=Carbon::now();
            $start->number = 5000;
            $start->number_left= 5000;
            $start->type = 'discount';
            $start->save();


            //Discount -0/04 ٪
            $start = new Awards;
            $start->name = '-0/4 % تخفیف';
            $start->delivery_in_time = 2760;
            $start->time_open=Carbon::now();
            $start->number = 25;
            $start->number_left= 25;
            $start->type = 'discount';
            $start->save();


            //Discount -0/05 ٪
            $start = new Awards;
            $start->name = '-0/5 % تخفیف';
            $start->delivery_in_time = 9780;
            $start->time_open=Carbon::now();
            $start->number = 12;
            $start->number_left= 12;
            $start->type = 'discount';
            $start->save();



            //Discount -0/06 ٪
            $start = new Awards;
            $start->name = '-0/6 % تخفیف';
            $start->delivery_in_time = 20160;
            $start->time_open=Carbon::now();
            $start->number = 6;
            $start->number_left= 6;
            $start->type = 'discount';
            $start->save();


            $awards = Awards::
            where('time_open','<',Carbon::now())
            ->get();
            $number =count( $awards);

            for ($i=0; $i < $number; $i++) {
                $queues = new Queue();
                $queues->award_id = $awards[$i]->id;
                $queues->save();

                Awards ::
                where('id',$awards[$i]->id)
                ->update([
                    "time_open"=> Carbon::now()->addMinutes($awards[$i]->delivery_in_time),
                ]);


            }
            $award_wons = new Award_won();
            $award_wons->user_id = 0;
            $award_wons->awards_id = 0;
            $award_wons->code = 0;
            $award_wons->code_id = 0;
            $award_wons->save();

echo "با  موفقیت انجام شد";
        }else{
            echo "قبلا استارت شده است";
        }

    }
}
