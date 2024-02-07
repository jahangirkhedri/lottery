<?php

namespace Module\Campaign\Models;

use Illuminate\Database\Eloquent\Model;
use Module\Campaign\Models\Relations\CampaignRelationTrait;

class Campaign extends Model
{
    use CampaignRelationTrait;

    protected $fillable = ['name', 'description', 'max_code', 'g_count', 's_count', 'b_count'];
}
