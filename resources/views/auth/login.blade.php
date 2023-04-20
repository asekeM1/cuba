@extends('modules.index')
@section('content')
<form method="POST" action="/login" class="w-full max-w-lg mx-auto my-8">
   @csrf
   <div class="mb-4">
       <label class="block text-gray-700 font-bold mb-2" for="email">{{ __('E-Mail Address') }}</label>
       <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

       @error('email')
       <p class="text-red-500 text-xs italic">{{ $message }}</p>
       @enderror
   </div>

   <div class="mb-6">
       <label class="block text-gray-700 font-bold mb-2" for="password">{{ __('Password') }}</label>
       <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

       @error('password')
       <p class="text-red-500 text-xs italic">{{ $message }}</p>
       @enderror
   </div>

   <div class="flex items-center justify-between">
       <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
           {{ __('Login') }}
       </button>

       <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('register') }}">
           {{ __('Register') }}
       </a>
   </div>
</form>
@endsection
