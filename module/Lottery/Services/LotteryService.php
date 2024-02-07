<?php

namespace Module\Lottery\Services;

use App\Models\User;
use Illuminate\Support\Lottery;
use Illuminate\Support\Str;
use Module\Campaign\Models\Campaign;
use Module\Lottery\Contract\LotteryServiceInterface;

class LotteryService implements LotteryServiceInterface
{

    public function lottery(Campaign $campaign,User $user)
    {
        //check user already wine in this campaign
        if($this->checkUserLottery($campaign,$user)){

        }

        //check campaign is not completed

        // generate new code
        $code = $this->generateUniqueCode();

        $lottery = Lottery::create([
            'user_id' => $user->id,
            'campaign_id' => $campaign->id,
            'code' => $code,
        ]);

        return $lottery;
    }

    public function checkUserLottery($campaign,$user)
    {

    }

    private function generateUniqueCode()
    {
        $randomNumber = mt_rand(1, 10000);
        $str = Str::random(5);
        if ($randomNumber == 1) {
            return "G-".$str; // Gold winner with 1/10000 probability
        } elseif ($randomNumber <= 11) {
            return "S-".$str; // Silver winner with 1/1000 probability
        } elseif ($randomNumber <= 111) {
            return 'B-'.$str; // Bronze winner with 1/100 probability
        } else {
            return null; // No win
        }
    }
}
