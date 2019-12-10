<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;

class FixtureController extends Controller
{

    public function index()
    {
        $fixtures = Fixture::all();
        return view('fixtures.index', compact('fixtures'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function fetchInfo($id)
    {
        $fixture = Fixture::with(['home_team', 'away_team'])->whereId($id)->first();
        return response()->json([
            'success' => true,
            'message' => 'fetched fixture information',
            'data' => $fixture,
        ], 200);
    }
}