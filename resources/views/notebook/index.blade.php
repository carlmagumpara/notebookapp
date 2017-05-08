@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif (Session::has('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
            @endif
            <div>
                <a href="{{ route('notebook.create') }}" class="btn btn-success pull-right">Create Notebook</a>
                <h1>Notebooks</h1>
            </div>
            @foreach ($notebooks as $notebook)
                <div class="panel notebook-item">
                    <div class="panel-body">
                        
                        <form class="pull-right" action="{{ route('notebook.destroy',$notebook->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete" name="" class="btn btn-danger btn-sm" />
                        </form>

                        <a href="{{ route('notebook.edit',$notebook->id) }}" class="btn btn-primary btn-sm pull-right">
                            Edit
                        </a>

                        <a href="{{ route('notebook.show',$notebook->id) }}" class="btn btn-success btn-sm pull-right">
                            Show Notes
                        </a>

                        <h2>{{ $notebook->name }}</h2>
                        <small>{{ $notebook->created_at }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
