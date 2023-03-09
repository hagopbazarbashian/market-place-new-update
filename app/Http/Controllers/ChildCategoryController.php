<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChildCategoryRequest;
use App\Http\Requests\ChildCategoryUpdateRequest;
use App\Models\Childcategory;
use App\Models\Category; 
use App\Models\Subcategory;

class ChildCategoryController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {    $childcategories = Childcategory::with('subcategory')->get();
         return view('backend.childcategory.index' ,compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorys = Subcategory::All();
         return view('backend.childcategory.create' , compact('subcategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildCategoryRequest $request)
    {
       
        Childcategory::create([
            'name'=>$request->name,
            'subategory_id'=>$request->saubctegory_id,
            'slug'=>$request->name
        ]);

        return  redirect()->back()->with('message', 'ChildCategory Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $childcategory = Childcategory::find($id);
        $subcategorys = Subcategory::All();
         return view('backend.childcategory.edit' ,compact('childcategory' ,'subcategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildCategoryUpdateRequest $request, $id)
    {
        $childcategory = Childcategory::find($id);

        $childcategory->update([
            'name'=>$request->name,
            'subategory_id'=>$request->subcategory_id,
        ]);
        return redirect()->back()->with('message', 'ChildCategory Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $childcategory = Childcategory::find($id);
        $childcategory->delete();
        return redirect()->back();

    }
}
