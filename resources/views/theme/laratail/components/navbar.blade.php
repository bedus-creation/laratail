<div @click.away="nav = false" class="container mx-auto md:px-6 py-2 z-20" :class="{'opacity-75':nav}">
    <button
        class="hidden md:inline-flex rounded-full bg-white items-center justify-center h-10 w-10 hover:shadow-lg focus:outline-none"
        onclick="document.querySelector('body').classList.toggle('sidebar-mini');" class="text-gray-500"><span
            class="material-icons">more_vert</span>
    </button>
    <div class="flex mx-4 items-center justify-between md:hidden">
        <h1 class="font-light text-lg text-gray-700">Dashboard</h1>
        <button x-show="nav == false"
            class="flex items-center justify-center h-10 w-10 md:hidden text-gray-500 focus:outline-none"
            @click="nav=true">
            <span class="material-icons">menu</span>
        </button>
        <button x-show="nav"
            class="flex items-center justify-center h-10 w-10 md:hidden text-gray-500 focus:outline-none"
            @click="nav=false">
            <span class="material-icons">close</span>
        </button>
    </div>
</div>
