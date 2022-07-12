

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
        <form>
            <div class="flex flex-row py-2">
            <div>
                <p>Sortuj główne kategorie</p>
            <select  id="sort-category" name="sort-category" class="block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                <option value = 'asc' >Nazwa rosnąco</option>
                <option value = 'desc' >Nazwa malejąco</option>
            </select>
            </div>
                <div>
                    <p>Sortuj podkategorie</p>
                    <select  id="sort-child" name="sort-child" class="block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                        <option value = 'asc' >Nazwa rosnąco</option>
                        <option value = 'desc' >Nazwa malejąco</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Sortuj" class="my-2 py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
        </form>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 text-a">
            <p class="text-center my-2">{{ session('mssg') }}</p>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="col-span-2 p-6 bg-white border-b border-gray-200">
                        Struktura drzewiasta
                    </div>
                    <div class="ml-2 mb-2">
                        <ul class="myUL">
                            @foreach ($trees as $tree)
                                <li>
                                    @if ($tree->depth == 1)
                                        <a class="caret">{{ $tree->name }}</a>
                                    @endif
                                    @if (count($tree->childs))
                                        <ul class="nested">
                                            @include('layouts.childsList',
                                                ['childs' => $tree->childs->sortBy([
                                                                ['name', $sortChild],
                                                            ])])
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>

</x-app-layout>


