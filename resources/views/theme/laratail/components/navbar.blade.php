<div @click.away="nav = false" class="container mx-auto md:px-6 py-2 z-20" :class="{'opacity-75':nav}">
    <div class="hidden md:flex justify-between">
        <button class="rounded-full bg-white items-center justify-center h-10 w-10 hover:shadow-lg focus:outline-none"
            onclick="document.querySelector('body').classList.toggle('sidebar-mini');" class="text-gray-500"><span
                class="material-icons">more_vert</span>
        </button>
        <div x-data="{show: false}" @click.away="show = false">
            <button @click="show = ! show"
                class="block text-gray-200 rounded-full text-sm overflow-hidden border-2 border-gray-200 focus:outline-none focus:border-white">
                <div class="flex">
                    <img class="menu-icon border-2 w-10 h-10 rounded-full"
                        src="http://web2tailwind.com/assets/docs/master/image-01.jpg">
                </div>
            </button>
            <div x-show="show" class="absolute mt-2 py-2 w-48 bg-white rounded-lg shadow-xl" style="right:20px">
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
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
