<?php

namespace Module\Campaign\Models\Relations;

use App\Models\User;

trait CampaignRelationTrait
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
