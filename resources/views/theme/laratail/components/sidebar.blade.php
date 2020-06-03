<div class="sidebar w-1/5 fixed h-screen bg-gray-800 z-10">
    <div class="image-menu flex items-center mx-2 py-6 overflow-hidden z-10 border-b border-gray-700">
        <img class="menu-icon border-2 w-10 h-10 rounded-full"
            src="http://web2tailwind.com/assets/docs/master/image-01.jpg">
        <div class="menu-text text-gray-100 ml-4">WEB2TAILWIND</div>
    </div>
    <div class="flex mx-4 px-3 rounded py-3 bg-red-500 mt-6 mb-3">
        <a href="#" class="flex">
            <i class="material-icons fill-current text-gray-100">dashboard</i>
            <div class="menu-text text-gray-100 ml-4">Dashboard</div>
        </a>
    </div>
    <div class="flex mx-4 mb-3">
        <div href="#" x-data="{show: @php echo request()->url()== route('articles.index') ? 'true':'false' @endphp}"
            class="w-full flex flex-col cursor-pointer" @click="show=!show">
            <div class="w-full flex justify-between px-3 hover:bg-gray-700 rounded py-3" :class="{'bg-gray-700':show}">
                <div class="flex">
                    <i class="material-icons fill-current text-gray-100">assignment</i>
                    <div class="relative menu-text text-gray-100 ml-4">
                        CMS
                    </div>
                </div>
                <span class="transition ease-in duration-150 text-gray-100 material-icons transform"
                    :class="{'rotate-180':show}">
                    arrow_drop_down
                </span>
            </div>
            <div x-show="show" class="transition ease-in duration-700 mt-3
                bg-gray-800">
                <a href="{{route('articles.index')}}">
                    <div class="w-full flex px-3 hover:bg-gray-700 rounded py-3 mb-3"
                        :class="{'bg-gray-700':@php echo request()->url()== route('articles.index') ? 'true':'false' @endphp}">
                        <span class="w-6 text-center text-xs text-gray-100">P</span>
                        <div class="relative text-xs font-light menu-text text-gray-100 ml-4">
                            Posts
                        </div>
                    </div>
                </a>
                <div class="w-full flex px-3 hover:bg-gray-700 rounded py-3 mb-3">
                    <span class="w-6 text-center text-xs text-gray-100">PS</span>
                    <div class="relative text-xs font-light menu-text text-gray-100 ml-4">
                        Page SEO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
