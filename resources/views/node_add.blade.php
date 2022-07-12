<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj node
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="col-span-2 p-6 bg-white border-b border-gray-200">
                        Uzupełnij formularz aby dodać kategorie
                    </div>
                    <form action="/node_add" method="post">
                        @csrf
                        <div class="ml-2 mb-2">
                            <a>Podaj nazwę kategorii</a>
                            <input type="text" id="name" name="name" class="my-2 block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" placeholder="Nazwa">
                            <a>Wybierz kategorię do której będzie należała nowa kategoria:</a>
                            <div class="flex flex-row">
                                <div>
                                    <select  id="id" name="id" class="block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                        @foreach ($trees as $tree)
                                            <option value={{{$tree->id}}}>{{ $tree->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <p class="pl-5 py-2 text-red-500">* Wybranie opcji "Nowy root" będzie skutkować utworzeniem nowej kategorii głównej *</p>
                                </div>
                            </div>
                            <input type="submit" value="Dodaj kategorie" class="my-2 py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

