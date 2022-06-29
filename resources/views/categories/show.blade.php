@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-4 rounded">
        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <div class="alert alert-success text-succes bg-opacity-25">{{ session('success') }}</div>
            @endif
            @error('name')
                <div class="alert alert-danger text-danger bg-opacity-25">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name"
                    value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color" id="color" placeholder="Enter the color"
                    value="{{ $category->color }}">
            </div>
            <button type="submit" class="btn btn-primary rounded fw-bold">Update Category</button>
        </form>
        <div>
            @if ($category->todos->count() > 0)
                @foreach ($category->todos as $todo)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('tasks-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('tasks-destroy', [$todo->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>No hay Tareas para esta categoria</h3>
            @endif
        </div>
    </div>
@endsection
