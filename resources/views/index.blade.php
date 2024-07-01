@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div class="mt-4 mb-4 ">
        <a href="{{ route('tasks.create') }}" class="font-medium text-blue-600 underline">Add Task!</a>
    </div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
            @class(['line-through text-slate-400' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mx-auto">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection