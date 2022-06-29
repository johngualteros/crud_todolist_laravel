@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-4 rounded">
        <form action="{{ route('tasks') }}" method="post">
            @csrf
            <h1 class="text-center">Add Task</h1>
            @if (session('success'))
                <div class="alert alert-success text-succes bg-opacity-25">{{ session('success') }}</div>
            @endif
            @error('title')
                <div class="alert alert-danger text-danger bg-opacity-25">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria de la tarea</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary rounded fw-bold">Add Task</button>
        </form>
        <div>
            @foreach ($todos as $todo)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tasks-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tasks-destroy', [$todo->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded fw-bold">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
