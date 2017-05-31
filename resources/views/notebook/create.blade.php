@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Create Notebook</h1>
                </div>
                <div class="panel-body">
                    <form class="notebook-form" form-type="create" action="{{ route('notebook.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Notebook Name">
                        </div>
                        <div class="form-group notebook-item">
                            <input type="submit" name="" class="btn btn-success pull-right" value="Save">
                            <a href="{{ route('notebook.index') }}" class="btn btn-warning pull-right"> Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection