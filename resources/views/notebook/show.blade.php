@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                <div class="notebook-item">
                    <a href="{{ route('notebook.index') }}" class="btn btn-warning pull-right"> Back to Notebooks </a>
                    <a href="{{ route('note.create',$notebook->id) }}" class="btn btn-success pull-right"> Add Notes </a>
                    <a href="{{ route('notebook.edit',$notebook->id) }}" class="btn btn-primary pull-right">
                        Edit
                    </a>
                    <h1>{{ $notebook->name }}</h1>
                </div>
            @foreach ($notes as $note)
                <div class="panel notebook-item note-item pointer">
                    <div class="panel-body">
                        <button data-action="{{ route('note.destroy',[$notebook->id , $note->id]) }}" class="btn btn-danger btn-delete btn-sm pull-right">
                            Delete
                        </button>
                        <a href="{{ route('note.edit', [$notebook->id, $note->id]) }}" class="btn btn-sm btn-primary pull-right">Edit</a>
                        <h3 class="note-item" id="{{ $note->id }}">{{ $note->title }}</h3>
                    </div>
                    <div class="panel-body hide-note note-body-{{ $note->id }}" >
                        <p>{{ $note->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection