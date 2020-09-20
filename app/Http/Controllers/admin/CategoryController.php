<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $allcategories = Category::when($request->table_search , function($alldata) use($request){

        return $alldata->where('name','like','%'.$request->table_search.'%')
        ->orwhere('id','like','%'.$request->table_search.'%');

    })->latest()->paginate(5);

       return view('admin.category.index',compact('allcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $roules = [] ;

        foreach( config('translatable.locales') as $locale ){

            $roules += [ $locale . '.name' => ['required',Rule::unique('category_translations' , 'name')]];

        }
        
        $request->validate($roules);


        Category::create($request->all());

        session()->flash('success' , __('site.added_successfuly'));

        return redirect('/admin/Category');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {

        return view('admin.category.edit',compact('Category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {

        $roules = [] ;

        foreach( config('translatable.locales') as $locale ){

            $roules += [ $locale . '.name' => ['required',Rule::unique('category_translations' , 'name')->ignore($Category->id, 'category_id')]];

        }
        
        $request->validate($roules);


        $Category->update($request->all());
        
        session()->flash('success' , __('site.update_successfuly'));

        return redirect('/admin/Category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        

        $Category->delete();

        
        session()->flash('success' , __('site.delete_successfuly'));

        return redirect()->route('Category.index');


    }
}
