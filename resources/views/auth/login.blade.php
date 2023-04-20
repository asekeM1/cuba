@extends('modules.index')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="form-input mt-1 block w-full" autofocus required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="ml-2 text-gray-700">Remember me</label>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Login
            </button>
        </div>
    </form>
@endsection
