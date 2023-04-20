<div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">
        <p class="uppercase text-xl text-black mb-4 mt-4 tracking-wider">{{auth()->user()->name}}</p>
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Сессии</p>

        <!-- link -->
        <a href="/sessions" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            Список сессий
        </a>


        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Авторизация</p>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">Выйти</button>
            </form>



    </div>
    <!-- end sidebar content -->

</div>
