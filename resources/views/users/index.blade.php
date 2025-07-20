@extends('layouts.app')
@section('content')
<div class="mx-auto w-3/4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <h1 class="text-xl font-bold dark:text-white">Users List</h1>
    <br>
    <div class="flex justify-start mb-4">
        @if(auth()->user()->isAdmin())
            <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</a>
        @endif
    </div>
    <table class="border-collapse w-full text-center text-sm text-gray-500 dark:text-gray-400 ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
            @foreach($users as $user)
                <tr class="border-b dark:border-gray-700">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="flex justify-center space-x-2 items-center p-2">
                        <a href="{{route('users.show', $user->id)}}" class="hover:bg-cyan-400 dark:hover:bg-blue-500 bg-cyan-500 dark:bg-blue-600 rounded-lg p-1 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500">Ver</a>
                        @if(auth()->user()->isAdmin())
                            <a href="#" class=" hover:bg-yellow-400 dark:hover:bg-yellow-500 bg-yellow-500 dark:bg-yellow-600 rounded-lg p-1 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-yellow-200
                            ">Edit</a>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" hover:bg-red-400 dark:hover:bg-red-500 bg-red-500
                                dark:bg-red-600 rounded-lg p-1 transition delay-150 duration-300 ease-in-out
                                hover:-translate-y-1 hover:scale-110 hover:bg-red-200 cursor-pointer">Delete</button>
                            </form>
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

</div>
@endsection
