<?php

namespace App\Http\Controllers;

const BUSES = '/buses';

use App\Models\Bus;
use CreateBusesTable;
use Illuminate\Http\Request;


class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_code' => 'required',
            'operator_name' => 'required',
            'depart' => 'required',
            'arrive' => 'required',
            'date' => 'required'
        ]);
        $buses = new Bus([
            'bus_code' => $request->get('bus_code'),
            'operator_name' => $request->get('operator_name'),
            'depart' => $request->get('depart'),
            'arrive' => $request->get('arrive'),
            'date' => $request->get('date')
        ]);
        $buses->save();
        return redirect(BUSES)->with('success', 'Bus Details Saved!');
    }
    public function show(Bus $bus_id)
    {
        $Buses = Bus::find($bus_id);
        return view('buses.show', compact('buses'));
    }

    public function edit($bus_id)
    {
        $buses = Bus::find($bus_id);
        return view('buses.edit', compact('bus_id','buses'));
    }

    public function update(Request $request, $bus_id)
    {
        $request->validate([
            'bus_code' => 'required',
            'operator_name' => 'required',
            'depart' => 'required',
            'arrive' => 'required',
            'date' => 'required'
        ]);
        $buses = Bus::find($bus_id);

        $buses->bus_code = $request->get('bus_code');
        $buses->operator_name = $request->get('operator_name');
        $buses->depart = $request->get('depart');
        $buses->arrive = $request->get('arrive');
        $buses->date = $request->get('date');

        $buses->save();
        return redirect(BUSES)->with('success', 'Bus Updated!');
    }

    public function destroy($bus_id)
    {
        $buses = Bus::find($bus_id);
        $buses->delete();
        return redirect(BUSES)->with('success', 'Bus Deleted!');
    }
}