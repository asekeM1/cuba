@extends('modules.index')
@section('content')
@include('modules.aside')
<x-template>


<div class="mt-6 grid grid-cols-2 gap-6 xl:grid-cols-1">

    <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
        <div class="card-body flex flex-row">

            <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                <img src="./img/happy.svg" alt="img title">
            </div>
            <div class="py-2 ml-10">
                <h1 class="h6">Привет, {{auth()->user()->name}}!</h1>
                <p class="text-white text-md"><a href="/sessions">Тут</a> можно глянуть список сессий, удалить одну или все</p>
            </div>
        </div>
    </div>
</div>
</x-template>
@endsection
