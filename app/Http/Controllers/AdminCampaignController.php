<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class AdminCampaignController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Campaign::all())
                ->addColumn('action', 'admin/campaigns/campaign-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.campaigns.index');
    }

    public function store(Request $request)
    {
        $campaignId = $request->id;
        $attributes   = array_merge(
            [ 'id' => $campaignId ],
            [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to
            ]);

        $campaign = Campaign::updateOrCreate($attributes);
        return Response()->json($campaign);
    }

    public function edit(Request $request)
    {
        $campaign = Campaign::query()->where('id',$request->id)->first();
        return Response()->json($campaign);
    }

    public function destroy(Request $request)
    {
        $campaign = Campaign::query()->where('id',$request->id)->delete();
        return Response()->json($campaign);
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
