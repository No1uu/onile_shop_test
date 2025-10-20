<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserdetailRequest;
use App\Models\Userdetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserdetailController extends Controller
{
    
    


    public function index()
    {   
        $user_id = auth()->id();

        $userdetails = Userdetail::where('user_id', $user_id)->first(); 

        return view('userdetail.index', compact('userdetails'));
    }

    public function create()
    {
        return view('userdetail.create');
    }

    public function store(UserdetailRequest $request)
    { 
        $validated = $request->validated();

        $data = array_merge($validated, ['user_id' => Auth::id()]);

        $userdetail = Userdetail::create($data);

        return redirect()->route('details.show',['id' => $userdetail->id])->with('success', 'Профайл амжилттай үүсгэлээ.'); 
    }
    
    public function show($id)
    {
        $detail = Userdetail::findOrFail($id);

        return view('userdetail.show', compact('detail'));
    }
    
    public function edit($id) {

        $userdetail = Userdetail::findOrFail($id);
         
        return view('userdetail.edit', compact('userdetail'));
    }

    public function update(UserdetailRequest $request ,$id) {
        
        $userdetail = Userdetail::findOrFail($id);

        $validated = $request->validated();

        $userdetail->update($validated);

        return redirect()->route('home',['id' => $userdetail->id])->with('success', 'Мэдээлэл амжилттай шинэчлэгдлээ.');
    }
    
}