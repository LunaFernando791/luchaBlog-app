@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('users.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <h1 class="text-xl font-bold dark:text-white mb-4">Create User</h1>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 dark:text-gray-300">Password</label>
            <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 dark:text-gray-300">Role</label>
            <select name="role" id="role" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg">
                <option value="writter">Writter</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create User</button>
    </form>
</div>
@endsection
