@extends('theme.laratail.app')

@section('css')
<link rel="stylesheet" href="/assets/lib/select2/select2.css">
@endsection

@section('content')
<div class="container mx-auto my-10 px-6 md:px-12">
    <div class="flex justify-between items-center">
        <div class="flex-1">
            <h3 class="text-gray-700 text-3xl font-semibold mb-2">Add Role</h3>
            <p class="font-light">
                This is the place to add new Role.
            </p>
        </div>
        <div class="w-48 text-right">
            <a href="{{route('roles.index')}}"
                class="bg-green-600 text-gray-200 rounded hover:bg-green-500 px-6 py-3 focus:outline-none ">List
                Role</a>
        </div>
    </div>
    <div class="w-3/4 bg-white mt-16 px-6 py-12 rounded-lg shadow-lg">
        <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Role</label>
                <input type='text' name="name" placeholder="Enter your tag name"
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            </div>

            <div class="pb-6">
                <button type="submit"
                    class="float-right bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-8 py-2 focus:outline-none">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
@endsection
