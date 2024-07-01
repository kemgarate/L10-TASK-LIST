@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mt-4 mb-4 ">
        <a href="{{ route('tasks.index') }}" class="font-medium text-blue-600 underline"><- Back</a>
    </div>

    <p class="font-medium text-gray-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="font-medium text-gray-700">{{ $task->long_description }}</p>
    @endif
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
        {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>
    
    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
            class="btn mb-2">Edit</a>
    </div>
    
    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn mb-2">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>

    <div>
        <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn hover:bg-red-500 text-white">Delete</button>
        </form>
    </div>
@endsection