<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class NotebookController extends Controller
{
    //
    public function index()
    {
    	$user = Auth::user();
    	$notebooks = $user->notebook()->orderBy('created_at','DESC')->get();
        return view('notebook.index',compact('notebooks'));
    }

    public function create() 
    {
    	return view('notebook.create');
    }

    public function show($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
        $notes = $notebook->note()->get();
    	return view('notebook.show', compact('notebook','notes'));
    }

    public function edit($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	return view('notebook.edit', compact('notebook'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	]);
    	$user = Auth::user();
    	$user->notebook()->create($request->all());
    	return redirect('/home')->with('success','Notebook Successfully Saved!');
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	]);
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	$notebook->update($request->all());
    	return redirect('/home')->with('success','Notebook Successfully Updated!');
    }

    public function destroy($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	$notebook->delete();
    	return redirect('/home')->with('success','Notebook Successfully Deleted!');
    }

}
