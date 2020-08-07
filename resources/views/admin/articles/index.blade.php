@extends('theme.laratail.app')

@section('css')
<style>
    .dataTables_length {
        margin-bottom: 20px;
    }

    .dataTables_filter input {
        padding: 5px 7px;
        border: 1px solid;
        outline: none;
    }

    #example_length label {
        padding: 10px 7px;
        border: 1px solid;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto my-10 px-6 md:px-12">
    <div class="flex justify-between items-center">
        <div class="flex-1">
            <h3 class="text-gray-700 text-3xl font-semibold mb-2">Articles</h3>
            <p class="font-light">
                All the articles are liststed here. Edit <b>ArticleController</b> to customize further logics.
            </p>
        </div>
        <div class="w-48 text-right">
            <a href="{{route('articles.create')}}"
                class="bg-green-600 text-gray-200 rounded hover:bg-green-500 px-6 py-3 focus:outline-none ">Add
                Article</a>
        </div>
    </div>
    <div x-data="{ showDeleteModal: false }" class="bg-white mt-16 px-6 py-12 rounded-lg shadow-lg">
        @include('theme.laratail.components.delete-modal')
        <table id="example" class="border w-full display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $item)
                <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td class="text-center">{{$item->created_at->format('Y-m-d')}}</td>
                    <td class="flex justify-end">
                        <a href="{{route('articles.edit', $item->id)}}"
                            class="border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-gray-200 rounded flex justify-center items-center h-8 w-8 mr-1">
                            <span class="text-sm material-icons">
                                edit
                            </span>
                        </a>
                        <a href="#"
                            x-on:click.prevent="showDeleteModal=!showDeleteModal; setModalData('{{route('articles.destroy', $item->id)}}');"
                            class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-gray-200 rounded flex justify-center items-center h-8 w-8 mr-1">
                            <span class="text-sm material-icons">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Start date</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection


@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function setModalData(url) {
        $('#deleteModal').attr('action', url);
    }

</script>
@endsection
