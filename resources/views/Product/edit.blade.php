@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <a class="btn btn-info float-right mb-4" href="{{ url('/') }}"> Go Back</a>
        <form method="post" action="{{ url('/edit-product/' . $product->id) }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title') ?? $product->title }}" class="form-control"
                    placeholder="Title">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Price</label>
                <input type="number" name="price" value="{{ old('price') ?? $product->price }}" class="form-control"
                    placeholder="Price">
            </div>

            <select name="category_id" class="form-control" id="exampleFormControlSelect1">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
