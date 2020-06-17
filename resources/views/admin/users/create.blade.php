@extends('theme.laratail.app')

@section('css')
<link rel="stylesheet" href="/assets/lib/select2/select2.css">
@endsection

@section('content')
<div class="container mx-auto my-10 px-6 md:px-12">
    <div class="flex justify-between items-center">
        <div class="flex-1">
            <h3 class="text-gray-700 text-3xl font-semibold mb-2">Create User</h3>
            <p class="font-light">
                This is the place to add new Admin User.
            </p>
        </div>
        <div class="w-48 text-right">
            <a href="{{route('users.index')}}"
                class="bg-green-600 text-gray-200 rounded hover:bg-green-500 px-6 py-3 focus:outline-none ">List
                Article</a>
        </div>
    </div>
    <div class="w-3/4 bg-white mt-16 px-6 py-12 rounded-lg shadow-lg">
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">User Name</label>
                <input type='text' name="name" placeholder="Enter your Fullname"
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Email</label>
                <input type='text' name="email" placeholder="Enter your Email"
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Password</label>
                <input type='text' name="password" placeholder="Password"
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Roles</label>
                <select name="roles[]" id="roles" class="w-full border select"
                    data-container-css-class="border border-gray-400 focus:border-green-500"
                    data-dropdown-css-class="bg-gray-100 border-green-500">
                    @foreach($roles as $item)
                    <option class="py-4" value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <file-input name="image" />
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="/assets/lib/select2/select2.js"></script>
<script>
    $('#roles').select2({
        minimumResultsForSearch: Infinity
    });
</script>
@stack('scripts')
@endsection
