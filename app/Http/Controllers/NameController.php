<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;

class NameController extends Controller
{
    public function index()
    {
        $names=Name::All();
        return view('names.index', compact('names'));
    }
    
    public function create()
    {
        return view('names/create');
    }
    
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        
        Name::create($request->all());

        return redirect()->route('name.index')->with('success', 'Berhaslil menambahkan.');
    }

    public function edit(Name $name)
    {
        return view('names.edit',compact('name'));
    }

    public function update(Request $request, Name $name)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        $name->update($request->all());
        return redirect()->route('name.index')->with('success','Berhasil mengupdate');
    }
    
    public function destroy(Name $name)
    {
        $name->delete();
    
        return redirect()->route('name.index')->with('success','Berhasil menghapus');
    }
}
// Muhammad Faiz Alfangie