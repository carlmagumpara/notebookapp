@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Edit Note</h1>
                </div>
                <div class="panel-body">
                    <form action="{{ route('note.update', [$notebook->id, $note->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Note Title" value="{{ $note->title }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Body:</label>
                            <textarea rows="12" name="body" class="form-control" placeholder="Note Body">{{ $note->body }}</textarea>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group notebook-item">
                            <input type="submit" name="" class="btn btn-success pull-right" value="Update">
                            <a class="btn btn-warning pull-right" href="{{ route('notebook.show', $notebook->id) }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection