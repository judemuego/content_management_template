<?php

namespace App\Http\Controllers;

use App\ItemType;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;


class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_types = ItemType::orderBy('id')->get();
        return view('backend.pages.inventory.maintenance.item_type', compact('item_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_type = $request->validate([
            'item_type_name' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        ItemType::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function show(ItemType $itemType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_types = ItemType::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('item_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ItemType::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_type = ItemType::find($id);
        $item_type->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
