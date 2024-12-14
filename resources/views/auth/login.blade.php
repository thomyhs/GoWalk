@extends('layouts.app')
@section('section')
<div class="flex flex-col  overflow-hidden h-screen items-center">
  
    <div class="w-full p-6 m-auto bg-white rounded-md  lg:max-w-lg">
        {{-- <h1 class="text-3xl font-semibold text-center text-gray-700">Go-Walk</h1> --}}
        <div class="flex justify-center">
            <img src="/image/logoGW.png" alt="logo" width="175px" height="175px" class="object-cover">
        </div>
        @if (session('message'))
        <div role="alert" class="text-red-800 font-semibold  mt-3 lg:max-w-lg flex justify-center" id="warning">
            <span class="mr-1">
                {{ session('message') }}
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            
        </div> 
        @endif
        <form class="space-y-3" action="{{ route('login.submit') }}" method="post">
            @csrf
            <div>
                <label class="label">
                    <span class="text-base label-text">Username</span>
                </label>
                <input name="username" type="text" placeholder="Input Username" class="w-full px-4 py-2 border rounded-md focus:outline-none" />
            </div>
            <div>
                <label class="label">
                    <span class="text-base label-text">Email</span>
                </label>
                <input name="email" type="text" placeholder="Email Address" class="w-full px-4 py-2 border rounded-md focus:outline-none" />
            </div>
            <div>
                <label class="label">
                    <span class="text-base label-text">Password</span>
                </label>
                <input name="password" type="password" placeholder="Enter Password"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none" />
            </div>
            <div class="flex justify-between">
                <a href= "/" class="text-xs text-gray-600 hover:underline hover:text-blue-600">Dont't have a account?</a>
            </div>
            <div>
                <button type="submit" class="w-full bg-yellow-500/75 py-2.5 px-4 rounded-md text-black font-semibold">Login</button>
            </div>
        </form>
    </div>
</div>
@push('script')
<script>
    setTimeout(() => {
        document.getElementById('warning').style.display = 'none';
    }, 5000);
</script>
@endpush

@endsection