<?php

namespace Module\Campaign\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "max_code" => $this->max_code,
            "g_count" => $this->g_count,
            "b_count" => $this->b_count,
            "s_count" => $this->s_count,
        ];
    }
}
