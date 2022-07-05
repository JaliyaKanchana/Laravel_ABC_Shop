@extends('layout.master')

@section('content')

    <div class="container">
        <h1>Add Category</h1>
        <a class="btn btn-info float-right mb-4" href="{{ url('/category') }}"> Go Back</a>
        <form method="post" action="{{ url('/add-category') }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                    placeholder="Enter Category Name">
            </div>

            <div class="container mt-2">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="container mt-2">
                @if (session()->exists('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>


            <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
