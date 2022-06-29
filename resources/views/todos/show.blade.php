@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-4 rounded">
        <form action="{{route('tasks-update',['id'=>$todo->id])}}" method="post">
            @method('PATCH')
            @csrf
            <h1 class="text-center">Update Task</h1>
            @if (session('success'))
                <div class="alert alert-success text-succes bg-opacity-25">{{ session('success') }}</div>
            @endif
            @error('title')
                <div class="alert alert-danger text-danger bg-opacity-25">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title"
                    value="{{ $todo->title }}">
            </div>
            <button type="submit" class="btn btn-primary rounded fw-bold">Update Task</button>
        </form>
    </div>
@endsection
