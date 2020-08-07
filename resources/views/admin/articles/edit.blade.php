@extends('theme.laratail.app')

@section('css')
<link rel="stylesheet" href="/assets/lib/select2/select2.css">
@endsection

@section('content')
<div class="container mx-auto my-10 px-6 md:px-12">
    <div class="flex justify-between items-center">
        <div class="flex-1">
            <h3 class="text-gray-700 text-3xl font-semibold mb-2">Eit Product</h3>
            <p class="font-light">
                This is the place to add Edit Product.
            </p>
        </div>
        <div class="w-48 text-right">
            <a href="{{route('articles.index')}}"
                class="bg-green-600 text-gray-200 rounded hover:bg-green-500 px-6 py-3 focus:outline-none ">List
                Product</a>
        </div>
    </div>
    <div class="w-3/4 bg-white mt-16 px-6 py-12 rounded-lg shadow-lg">
        <form action="{{route('articles.update', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Product Name</label>
                <input type='text' name="title" value="{{$data->title}}" placeholder="Enter your article title"
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Select Categories</label>
                <select name="categories[]" id="categories" class="w-full border select"
                    data-container-css-class="border border-gray-400 focus:border-green-500"
                    data-dropdown-css-class="bg-gray-100 border-green-500" multiple>
                    @foreach($categories as $item)
                    <option class="py-4" value="{{$item->name}}"
                        {{in_array($item->name,$data->category->pluck('name')->toArray()) ? 'selected':''}}>
                        {{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 font-light mb-2">Select tags</label>
                <select name="tags[]" id="tags" class="w-full border select"
                    data-container-css-class="border border-gray-400 focus:border-green-500"
                    data-dropdown-css-class="bg-gray-100 border-green-500" multiple>
                    @foreach($tags as $item)
                    <option class="py-4" value="{{$item->name}}"
                        {{in_array($item->name,$data->tag->pluck('name')->toArray()) ? 'selected':''}}>
                        {{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label class="block text-gray-600 font-light mb-2">Description</label>
                <textarea name="description"
                    class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none  focus:border-green-500"
                    rows="4">{{$data->description}}</textarea>
            </div>
            <div class="mb-6 mt-4">
                <file-input name="image" title="Click here to Update Image" />
            </div>
            <div class="flex justify-center mb-6 p-6 border">
                <img class="w-full rounded-lg shadow-lg" src="{{$data->cover}}">
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
    $('#categories').select2({
        minimumResultsForSearch: Infinity
    });
    $('#tags').select2({
        minimumResultsForSearch: Infinity
    });

</script>
@stack('scripts')
@endsection
