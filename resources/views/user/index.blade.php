<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        action="{{route('users.index')}}"
                        method="get">
                        <input type="text" name="search" class="block mt-1 w-full" id="search" value="{{request()->query('search')}}" />
                        <button type="submit" class="btn btn-warning">Search</button>
                        <a href="{{route('users.index')}}" class="btn btn-link">Clear</a>
                    </form>

                    <a href="{{route('users.create')}}" class="btn btn-link">Create User</a>

                    <table class="table mt-4">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $user -> name}}</td>
                            <td>{{ $user -> email}}</td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="underline">Edit</a>
                                |
                                <form action="{{ route('users.destroy', $user)}}"
                                    method="post"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method("delete")
                                    <button  type="submit" class="text-red-500 underline">Delete</button>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$users -> links()}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
