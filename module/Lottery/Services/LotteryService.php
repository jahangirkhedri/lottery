<?php

namespace Module\Lottery\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Models\Campaign;
use Module\Lottery\Contract\LotteryServiceInterface;
use Module\Lottery\Models\Lottery;

class LotteryService implements LotteryServiceInterface
{
    public function __construct(private CampaignServiceInterface $campaignService)
    {
    }

    public function lottery(Campaign $campaign, User $user)
    {
        //Check user already wine in this campaign
        $lottery = $this->checkUserLottery($campaign, $user);
        if ($lottery) {
            return [
                "code" => $lottery->code ?? "",
            ];
        }

        //check campaign is completed
        if ($this->campaignService->isCompleted($campaign)) {
            return [
                "message" => "campaign is completed"
            ];
        }


        // generate new code
        $code = $this->generateUniqueCode();

        //check this code type is completed
        if(!is_null($code) && $this->campaignService->checkCodeIsCompleted($campaign, $code)){
                $code = null;
        }

        $lottery = Lottery::create([
            'user_id' => $user->id,
            'campaign_id' => $campaign->id,
            'code' => $code,
        ]);

        // update campaign codes
        if (!is_null($code)) {
            $this->campaignService->updateCodeCount($campaign,$code);
        }


        return $lottery;
    }

    public function checkUserLottery($campaign, $user)
    {
        return Lottery::where([
            'user_id' => $user->id,
            'campaign_id' => $campaign->id,
        ])->first();
    }

    public function generateUniqueCode()
    {
        $randomNumber = mt_rand(1, 2);
        dump($randomNumber);
        $str = Str::random(5);
        if ($randomNumber == 1) {
            return "G-" . $str; // Gold winner with 1/10000 probability
        } elseif ($randomNumber <= 11) {
            return "S-" . $str; // Silver winner with 1/1000 probability
        } elseif ($randomNumber <= 111) {
            return 'B-' . $str; // Bronze winner with 1/100 probability
        } else {
            return null; // No win
        }
    }
}
