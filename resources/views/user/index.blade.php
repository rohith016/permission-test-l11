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


                    <form action="{{route('user.index')}}" method="get">
                        <input type="text" name="search" class="block mt-1 w-full" id="search" value="{{request()->query('search')}}" />
                        <button type="submit" class="btn btn-warning">Search</button>
                        <a href="{{route('user.index')}}" class="btn btn-link">Clear</a>
                    </form>


                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user -> id}}</td>
                            <td>{{ $user -> name}}</td>
                            <td>{{ $user -> email}}</td>
                            <td>
                                <a href="{{ route('user.show', $user -> id) }}" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger">Delete</button>
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
