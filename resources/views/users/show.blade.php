@extends('layouts.app')
@section('content')
<div class="mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg ">
    <h1 class="text-xl font-bold dark:text-white mb-4">User Details</h1>

    <div class="mb-4">
        <strong class="text-gray-700 dark:text-gray-300">ID:</strong>
        <span class="text-gray-900 dark:text-gray-100">{{ $user->id }}</span>
    </div>

    <div class="mb-4">
        <strong class="text-gray-700 dark:text-gray-300">Name:</strong>
        <span class="text-gray-900 dark:text-gray-100">{{ $user->name }}</span>
    </div>

    <div class="mb-4">
        <strong class="text-gray-700 dark:text-gray-300">Email:</strong>
        <span class="text-gray-900 dark:text-gray-100">{{ $user->email }}</span>
    </div>

    <div class="mb-4">
        <strong class="text-gray-700 dark:text-gray-300">Role:</strong>
        <span class="text-gray-900 dark:text-gray-100">{{ $user->role }}</span>
    </div>

    @if(auth()->user()->isAdmin())
        <div class="flex justify-start space-x-2 mt-4">
            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit User</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete User</button>
            </form>
        </div>
    @endif
    @endsection
