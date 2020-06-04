<div>
    <div x-show="showDeleteModal" tabindex="0"
        class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
        <div x-on:click.away="showDeleteModal = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
            style="width: 500px;">
            <form id="deleteModal" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-10 py-10">
                    <div class="text-center">
                        <span
                            class="material-icons border-4 rounded-full p-4 text-red-500 font-bold border-red-500 text-4xl">
                            close
                        </span>
                    </div>
                    <div class="text-center py-6 text-2xl text-gray-700">Are you sure ?</div>
                    <div class="text-center font-light text-gray-700 mb-8">
                        Do you really want to delete these records? This process cannot be undone.
                    </div>
                    <div class="flex justify-center">
                        <button x-on:click={showDeleteModal=false}
                            class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">Cancel</button>
                        <button
                            class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-6 py-2 focus:outline-none mx-1">Delete</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
    </div>
</div>
