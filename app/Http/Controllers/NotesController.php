<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Notebook;

class NotesController extends Controller
{
    public function create($id)
    {
    	$user = Auth::user();
    	$notebook = $user->notebook()->find($id);
    	return view('note.create',['notebook' => $notebook]);
    }

    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->find($id);
        $notebook->note()->create($request->all());	
        return redirect('notebook/'.$id.'/show')->with('success','Note Successfully Saved!');
    }

    public function edit($id, $note_id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->find($id);
        $note = $notebook->note()->find($note_id);
        return view('note.edit',['notebook' => $notebook, 'note' => $note]);
    }

    public function update(Request $request, $id, $note_id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->find($id);
        $note = $notebook->note()->find($note_id);
        $note->update($request->all());
        return redirect('notebook/'.$id.'/show')->with('success','Note Successfully Updated!');
    }

    public function destroy($id, $note_id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->find($id);
        $note = $notebook->note()->find($note_id);
        $note->delete();
        return redirect('/notebook/'.$id.'/show')->with('success','Note Successfully Deleted!');
    }

}
