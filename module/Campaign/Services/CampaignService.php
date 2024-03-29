<?php

namespace Module\Campaign\Services;

use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Http\Resources\CampaignResource;
use Module\Campaign\Models\Campaign;

class CampaignService implements CampaignServiceInterface
{

    public function all()
    {
        return CampaignResource::collection(Campaign::all());
    }

    public function find($id)
    {
        return Campaign::findOrFail($id);
    }

    public function show($id)
    {
       $campaign = $this->find($id);
        return new CampaignResource($campaign);
    }

    public function store(array $data)
    {
        $campaign = Campaign::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'max_code' => $data['max_code']
        ]);
        return new CampaignResource($campaign);
    }

    public function update($id, array $data)
    {
        $campaign = $this->find($id);
        $campaign->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'max_code' => $data['max_code']
        ]);

        return new CampaignResource($campaign);
    }

    public function delete($id)
    {
        $campaign = $this->find($id);
        $campaign->delete();
    }

    public function isCompleted($campaign): bool
    {
        return $campaign->max_code == $campaign->g_count && $campaign->max_code == $campaign->s_count && $campaign->max_code == $campaign->b_count;
    }

    public function checkCodeIsCompleted($campaign,$code): bool
    {
        return $campaign->{$this->findCodeType($code)} == $campaign->max_code;
    }

    public function updateCodeCount($campaign,$code)
    {
        $codeTypeField = $this->findCodeType($code);
        $campaign->increment($codeTypeField);
    }

    private function findCodeType($code)
    {
        $codeType = explode('-',$code)[0];
        return Campaign::CAMPAIGN_CODE_TYPE[$codeType];
    }


}
