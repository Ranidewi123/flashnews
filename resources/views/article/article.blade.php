@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><a href="/" class="text-decoration-none">Articles</a> > <a class="text-decoration-none" href="/articles?category={{ $article->category->id }}">{{ $article->category->name }}</a> </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-3">{{ $article->title }}</h2>
                                <p><i>{{ $article->created_at }}</i></p>
                                <p><i>By <a href=" /articles?user={{$article->user->id}}" class="text-decoration-none">{{ $article->user->name }}</a></i></p>
                                <div style="width: auto;">
                                    <img src="{{ asset('/storage/'.$article->image) }}" class="card-img-top" alt="...">
                                </div>
                                <article class="my-3 text-justify" style="text-align: justify;">
                                    <p class="text-justify">{!! $article->description !!}</p>
                                </article>

                                <a href="/" class="btn btn-danger btn-sm"><i class="bi bi-caret-left-fill"></i> Kembali ke Home Page</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
