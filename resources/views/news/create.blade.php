@extends('layouts.app')

@section('menu-admin')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add Article Form</div>

                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('news.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-2 col-form-label text-md-end">Title</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-md-2 col-form-label text-md-end">Category</label>
                                <div class="col-md-8">
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required autocomplete="category_id">
                                        @foreach($categories as $category)
                                            @if(old('category_id') == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-md-2 col-form-label text-md-end">Image</label>
                                <div class="col-md-8">
                                    <input type="file" id="formFile" name="image" required class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-2 col-form-label text-md-end">Description</label>

                                <div class="col-md-8">
                                    <input id="description" type="hidden" name="description" class="form-control @error('phone') is-invalid @enderror" value="{{ old('description') }}">
                                    <trix-editor input="description"></trix-editor>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="row col-md-12 offset-md-2">
                                    <div class="col-md-2">
                                        <a href="{{ route('admins.index') }}" class="btn btn-danger"><i class="bi bi-caret-left-fill"></i> Back</a>
                                    </div>
                                    <div class="col-md-6 offset-4">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script>
        document.addEventListener('trix-file-accept', function (e){
            e.preventDefault();
        });
    </script>
@endsection
