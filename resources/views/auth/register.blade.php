@extends('modules.index')
@section('content')
<x-template>
<form method="POST" action="{{ route('register') }}" class="w-full max-w-lg mx-auto my-8">
    @csrf

    <div class="mb-6">
        <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
               class="w-full px-4 py-2 border border-gray-400 rounded-lg @error('name') border-red-500 @enderror">
        @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               class="w-full px-4 py-2 border border-gray-400 rounded-lg @error('email') border-red-500 @enderror">
        @error('email')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full px-4 py-2 border border-gray-400 rounded-lg @error('password') border-red-500 @enderror">
        @error('password')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
               class="w-full px-4 py-2 border border-gray-400 rounded-lg">
    </div>

    <div class="flex items-center justify-end">
        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
            Register
        </button>
    </div>
</form>
</x-template>
@endsection
