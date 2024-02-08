<?php

namespace Module\Campaign\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Campaign\Database\Factories\CampaignFactory;
use Module\Campaign\Models\Relations\CampaignRelationTrait;

class Campaign extends Model
{
    use HasFactory, SoftDeletes,CampaignRelationTrait;

    const CAMPAIGN_CODE_TYPE = [
        'G' => 'g_count',
        'S' => 's_count',
        'B' => 'b_count'
    ];
    protected $fillable = ['name', 'description', 'max_code', 'g_count', 's_count', 'b_count'];

}
