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

                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{ route('blog.store') }}" method="POST">
                                @csrf
                                <label for="title">Titre :</label>
                                <input type="text" name="title" id="title">
                                <label for="content">Contenu :</label>
                                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                                <input type="submit" value="Ajouter" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
