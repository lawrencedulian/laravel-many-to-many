@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">{{ $project->title }}</h1>
        <p class="text-center">{{ $project->type ? $project->type->name : 'No Type' }}</p>
        <div class="d-flex justify-content-between">
            <h5>{{ $project->created_at }}</h5>
            <p> {{ $project->slug }}</p>
            <p>
                @forelse ($project->technologies as $technology)
                    <span>#{{ $technology->title }}</span>
                @empty
                    <span>...</span>
                @endforelse
            </p>
        </div>
        <p class="mt-3">{{ $project->content }}</p>
    </div>
@endsection
