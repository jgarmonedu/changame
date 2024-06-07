<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class AdminCampaignController extends Controller
{
    public function index()
    {
        return view('admin.campaigns.index', [
            'campaigns' => Campaign::all()
        ]);
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store()
    {
        Campaign::create(array_merge($this->validateCampaign()));

        return redirect('/admin/campaigns');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', ['campaign' => $campaign]);
    }

    public function update(Campaign $campaign)
    {
        $attributes = $this->validateCampaign($campaign);

        $campaign->update($attributes);

        return back()->with('success', 'Campaign Updated!');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return back()->with('success', 'Campaign Deleted!');
    }

    protected function validateCampaign(?Campaign $campaign = null): array
    {
        $campaign ??= new Campaign();

        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from'
        ]);
    }
}
