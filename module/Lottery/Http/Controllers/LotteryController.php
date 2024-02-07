<?php

namespace Module\Lottery\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Lottery\Contract\LotteryServiceInterface;

class LotteryController extends Controller
{
    public function __construct(private LotteryServiceInterface $lotteryService, private CampaignServiceInterface $campaignService)
    {
    }

    public function lottery($campaignId)
    {
        $campaign = $this->campaignService->find($campaignId);
        $d = $this->lotteryService->lottery($campaign, Auth::user());
    }
}
