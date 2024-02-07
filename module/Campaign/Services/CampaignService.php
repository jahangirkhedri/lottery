<?php

namespace Module\Campaign\Services;

use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Models\Campaign;

class CampaignService implements CampaignServiceInterface
{

    public function all()
    {
        return Campaign::all();
    }

    public function find($id)
    {
        return Campaign::findOrFail($id);
    }

    public function store(array $data)
    {
        return Campaign::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'max_code' => $data['max_code']
        ]);
    }

    public function update($id, array $data)
    {
        $campaign = $this->find($id);
        $campaign->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'max_code' => $data['max_code']
        ]);

        return $campaign;
    }

    public function delete($id)
    {
        $campaign = $this->find($id);
        $campaign->delet();
    }
}
