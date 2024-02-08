<?php

namespace Module\Campaign\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Module\Campaign\Contract\CampaignServiceInterface;
use Module\Campaign\Http\Requests\CampaignFromRequest;

class CampaignController extends Controller
{
    public function __construct(private CampaignServiceInterface $campaignService)
    {

    }

    // Get all campaigns
    public function index()
    {
        $campaigns = $this->campaignService->all();
        return response()->json($campaigns);
    }

    // Get a specific campaign by ID
    public function show($id)
    {
        $campaign = $this->campaignService->show($id);
        return response()->json($campaign);
    }

    // Create a new campaign
    public function store(CampaignFromRequest $request)
    {
        $campaign = $this->campaignService->store($request->all());
        return response()->json($campaign, 201);
    }

    // Update an existing campaign
    public function update(CampaignFromRequest $request, $id)
    {
        $campaign = $this->campaignService->update($id, $request->all());
        return response()->json($campaign);
    }

    // Delete a campaign
    public function destroy($id)
    {
        $this->campaignService->delete($id);
        return response()->json(['message' => 'Campaign deleted successfully']);
    }
}
