@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <a href="{{ route('notebook.create') }}" class="btn btn-success">Create Notebook</a>

        </div>
    </div>
</div>
@endsection
