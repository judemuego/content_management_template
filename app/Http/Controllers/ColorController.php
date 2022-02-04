<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('id', 'desc')->get();
        return view('backend.pages.inventory.maintenance.colors', compact('colors'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Color::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $color = $request->validate([
            'color_code' => ['required'],
            'color_name' => ['required'],
        ]);

        Color::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $colors = Color::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('colors'));
    }

    public function update(Request $request, $id)
    {
        Color::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy($id)
    {
        $color_destroy = Color::find($id);
        $color_destroy->delete();
        return "Successfully Deleted!";
    }
}
