<?php

namespace App\Http\Controllers;

use App\Bag;
use Illuminate\Http\Request;

class BagController extends Controller
{
    
    public function index()
    {
        $bags = Bag::orderBy('id', 'desc')->get();
        return view('backend.pages.inventory.maintenance.bags', compact('bags'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Bag::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $bag = $request->validate([
            'class_code' => ['required'],
            'bag_type' => ['required'],
        ]);

        Bag::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $bags = Bag::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('bags'));
    }

    public function update(Request $request, $id)
    {
        Bag::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy($id)
    {
        $bag_destroy = Bag::find($id);
        $bag_destroy->delete();
        return "Successfully Deleted!";
    }
}
