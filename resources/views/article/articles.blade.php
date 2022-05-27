@extends('layouts.app')

@section('menu-home')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <div class="row">

                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6">
                                    <form action="/articles">
                                        <div class="input-group mb-3">
                                            @if(request('category'))
                                                <input type="text" name="category" value="{{ request('category') }}" hidden>
                                            @endif
                                            @if(request('user'))
                                                <input type="text" name="user" value="{{ request('user') }}" hidden>
                                            @endif
                                            <input type="text" name="search" class="form-control" placeholder="Cari Artikel..." aria-label="Cari Artikel..." aria-describedby="button-addon2" value="{{ request('search') }}">
                                            <button class="btn btn-danger text-white" type="submit" id="button-addon2">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @forelse($articles as $article)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.7)"><a href="/articles?category={{ $article->category->id }}" class="text-white text-decoration-none">{{ $article->category->name }}</a> </div>
                                        <div>
                                            <img src="{{ asset('/storage/'.$article->image) }}" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $article->title }}</h5>
                                            <p><i>{{ $article->created_at }}</i></p>
                                            <p><i>By : <a class="text-decoration-none" href="/articles?user={{ $article->user->id }}">{{ $article->user->name }}</a></i></p>
                                            <p class="card-text">{{ strip_tags(Str::limit($article->description, 100))  }}</p>
                                            <a href="/articles/{{ $article->id }}" class="btn btn-primary text-decoration-none">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center fs-4">Belum ada artikel.</p>
                            @endforelse
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
