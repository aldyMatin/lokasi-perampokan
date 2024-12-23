<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;


class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();
        return view('incidents.index', ['incidents' => $incidents]);
    }

    public function create()
    {
        return view('incidents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'region_name' => 'required',
            'description' => 'nullable',
        ]);

        Incident::create($validated);

        return redirect()->route('incidents.index');
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index');
    }
}
