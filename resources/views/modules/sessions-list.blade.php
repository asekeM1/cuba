@extends('modules.index')
@section('content')
@include('modules.aside')
<x-template>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">все сессии</h1>
        <div class="flex justify-between mb-6">
            <h2 class="text-lg font-semibold">список сессий</h2>
            <form action="/delete/all" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg" type="submit">Закончить все сесиии</button>
            </form>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            @if(count($sessions))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действие</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($sessions as $session)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md font-medium text-black-900">{{ $session->id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $session->created_at->format('d M Y - H:i:s') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $session->ip_address }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="modules/{{$session->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg" type="submit">Закончить эту сессию</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">Нет сессий</div>
            @endif
        </div>
        <div class="mt-4">
            <a href="/" class="text-gray-600 underline">Back to Home</a>
        </div>
</div>
</x-template>
@endsection
