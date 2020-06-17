@extends('theme.auth.app')

@section('content')
<div class="w-full h-screen bg-gray-300 flex items-center justify-center">
    <form method="POST" action="{{route('login')}}" class="w-full md:w-1/3 bg-white rounded-lg py-10">
        @csrf
        <div class="flex font-bold justify-center">
            <img class="h-20 w-20"
                src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
        </div>
        <h2 class="text-3xl text-center text-gray-700 mb-4">Login Form</h2>
        <div class="px-12 pb-10">
            <div class="w-full mb-2">
                <div class="flex items-center">
                    <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-user'></i>
                    <input type='text' name="email" placeholder="Email"
                        class="-mx-6 px-8  w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" required />
                </div>
            </div>
            <div class="w-full mb-2">
                <div class="flex items-center">
                    <i class='ml-3 fill-current text-gray-400 text-xs z-10 fas fa-lock'></i>
                    <input type='password' name="password" placeholder="Password"
                        class="-mx-6 px-8 w-full border rounded px-3 py-2 text-gray-700 focus:outline-none" required />
                </div>
            </div>
            <button type="submit"
                class="w-full my-2 py-2 rounded-lg bg-green-600 text-gray-100  focus:outline-none">Login</button>
    </form>
</div>
@endsection
