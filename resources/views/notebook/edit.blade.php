@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Edit Notebook</h1>
                </div>
                <div class="panel-body">
                    <form action="{{ route('notebook.update',$notebook->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" value="{{ $notebook->name }}" class="form-control" placeholder="Notebook Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group notebook-item">
                            <a class="btn btn-warning pull-right" href="{{ route('notebook.index') }}">Cancel</a>
                            <input type="submit" name="" class="btn btn-success pull-right" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection