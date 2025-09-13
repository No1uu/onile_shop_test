<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
 
class CategoryController extends Controller
{   
    public function index()
    {
        $categories = Category::all();

        // dd($categories);

        return view('admin.category.index', compact('categories'));
    }
    
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([        
            'name' => ['required', 'string']
        ]);
        Category::create($validated);
        return redirect()->route('admin.category.index');
    }
    public function edit($id){
        $Category=Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => ['required', 'string' , 'max:255']
        ]);
        $Category=Category::findOrFail($id);

        $Category->update($validated);

        $Category->save();

        return redirect('/categories');

    }
    public function destroy($id){
        $Category = Category::findOrFail($id);

        $Category->delete();

        return redirect()->back();
    }

}