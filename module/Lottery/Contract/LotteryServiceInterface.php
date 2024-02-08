<?php

namespace Module\Lottery\Contract;

use App\Models\User;
use Module\Campaign\Models\Campaign;

interface LotteryServiceInterface
{
    public function lottery(Campaign $campaig,User $user);

    public function checkUserLottery($campaign, $user);

    public function generateCode();
}
