@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">My Projects</h2>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                <i class="fa-solid fa-file-circle-plus"></i>
                New
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titolo:</th>
                            <th scope="col">Data Creazione:</th>
                            <th scope="col">Azioni:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $proj)
                            <tr>
                                <th scope="row">{{ $proj->title }}</th>
                                <td>{{ $proj->created_at }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $proj->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $proj->slug) }}">
                                        <i class="fa-solid fa-file-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $proj->slug) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
