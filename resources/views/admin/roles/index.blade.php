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
            <h3 class="text-gray-700 text-3xl font-semibold mb-2"></h3>
            <p class="font-light">
                All the are roles liststed here. Edit <b>RolesController</b> to customize further logics.
            </p>
        </div>
        <div class="w-48 text-right">
            <a href="{{route('roles.create')}}"
                class="bg-green-600 text-gray-200 rounded hover:bg-green-500 px-6 py-3 focus:outline-none ">Add
                Role</a>
        </div>
    </div>
    <div x-data="{ showDeleteModal: false }" class="bg-white mt-16 px-6 py-12 rounded-lg shadow-lg">
        @include('theme.laratail.components.delete-modal')
        <table id="example" class="border w-full display">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Created at</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td class="text-center">{{$item->created_at->format('Y-m-d')}}</td>
                    <td class="flex justify-end">
                        <a href="#"
                            x-on:click.prevent="showDeleteModal=!showDeleteModal; setModalData('{{route('roles.destroy', $item->id)}}');"
                            class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-gray-200 rounded flex justify-center items-center h-8 w-8 mr-1">
                            <span class="text-sm material-icons">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Created at</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection


@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    function setModalData(url){
        $('#deleteModal').attr('action', url);
    }
</script>
@endsection
