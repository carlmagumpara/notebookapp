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
        return view('notebook.index',['notebooks' => $notebooks]);
    }

    public function create() 
    {
    	return view('notebook.create');
    }

    public function show($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
        $notes = $notebook->note()->orderBy('created_at','DESC')->get();
    	return view('notebook.show', ['notebook' => $notebook, 'notes' => $notes]);
    }

    public function edit($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	if (empty($notebook)) {
            return redirect('/home')->with('danger',"Access Denied!");
        } else {
            return view('notebook.edit',['notebook' => $notebook]);
        }
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	]);
    	$user = Auth::user();
    	$user->notebook()->create($request->all());
    	$response = array('success' => 'Notebook Successfully Saved!', 'redirect' => '/home' );
        return $response;
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	]);
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	$notebook->update($request->all());
        $response = array('success' => 'Notebook Successfully Updated!', 'redirect' => '/home' );
        return $response;
    }

    public function destroy($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	$notebook->delete();
    	return redirect('/home')->with('success','Notebook Successfully Deleted!');
    }

}
