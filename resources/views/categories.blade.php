@extends('layouts.main')

@section('menu-category')
    active
@endsection

@section('container')
    <h1>Kategori Artikel :</h1>
    <div class="container">
        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-4">
                    <a href="/articles?category={{$category->id}}">
                        <div class="card bg-dark text-white">
                            <img src=https://source.unsplash.com/random/500x400?{{ $category->name }}" class="card-img-top" alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-3 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>Belum tersedia kategori.</p>
            @endforelse
        </div>
    </div>

@endsection
