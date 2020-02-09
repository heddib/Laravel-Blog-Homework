@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenue sur le blog.
                    <br>
                    <a href="{{ route('blog.add') }}">Ajouter un article</a>
                    <hr>
                    @forelse($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            #{{ $post->id }} {{ $post->title }} par {{ App\User::find($post->user_id)->name }}
                        </div>
                    @empty
                        <div class="col-lg-12 col-md-12">
                            <div class="card h-100">
                                <strong>Aucun article...</strong>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
