@extends('layouts.app')

@section('menu-articles')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Articles by {{ Auth::user()->name }}</div>

                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div style="float: right">
                            <a href="{{ route('news.create') }}" class="btn btn-outline-primary"><i class="bi bi-person-plus-fill"></i> Add Category</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Title</td>
                                    <td>Category</td>
                                    <td>Description</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $article)
                                    <tr>
                                        <td>{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}</td>
                                        <td><a href="/articles/{{ $article->id }}" class="text-decoration-none">{{ $article->title }}</a></td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>{!! Str::limit($article->description, 50) !!}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete-action"><i class="bi bi-trash-fill"></i></button>
                                            {{ Form::open(['url' => route('news.destroy', $article), 'method' => 'delete']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data article not found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('.delete-action').click(function (e)
            {
                if (confirm('Are you sure?')) {
                    $(this).siblings('form').submit();
                }

                return false;
            });
        });
    </script>
@endsection
