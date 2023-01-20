@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Edit Project</h2>

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
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">Select</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id', $project->type_id) == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content', $project->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-success mt-3" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
