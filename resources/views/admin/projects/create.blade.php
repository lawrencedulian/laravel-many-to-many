@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Create New Project</h2>

        <div class="row justify-content-center">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.projects.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <h6>Technologies</h6>
                            @foreach ($technologies as $technology)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]"
                                        id="technologies-{{ $technology->id }}" value="{{ $technology->id }}"
                                        @checked(in_array($technology->id, old('technologies', [])))>
                                    <label for="technologies-{{ $technology->id }})"
                                        class="form-check-label">{{ $technology->title }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="type">Type</label>
                            <select name="type_id" id="type" class="form-select">
                                <option value="">Select</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-success mt-3" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
