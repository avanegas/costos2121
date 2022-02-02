<div class="container py-8">
    <div>
        <h1 class="text-2xl text-gray-900 pb-2 px-6 md:px-12">
            Presupuestos de construcción.
        </h1>
    </div>
    <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="flex bg-white px-4 py-3 border-t border-gray-200">
            <x-jet-input class="w-full" placeholder="buscar ..." type="text" wire:model="search" />
            <div class="ml-6 block">
                <select wire:model="perPage" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="20">20 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
            @if($search !=='')
                <button wire:click="clear" class="border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 ml-6 px-2 block">X</button>
            @endif
        </div>
        <div class="bg-white px-4">
            @if($proyectos->count())
                <table class="min-w-full divide-y divide-gray-200"> <!--<table class="table-fixed w-full">-->
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th wire:click="order('name')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                                {{-- sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('contratante')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Contratante
                                {{-- sort --}}
                                @if ($sort == 'contratante')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('ubicacion')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Ubicación
                                {{-- sort --}}
                                @if ($sort == 'ubicacion')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('oferente')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Oferente
                                {{-- sort --}}
                                @if ($sort == 'oferente')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Costo</th>
                            <th           class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($proyectos as $key=>$proyecto)
                        <tr>
                            <a href="#">
                            <td class="px-2 py-3">{{ $proyecto->id }}</td>
                            <td><a href="{{url('projects', $proyecto)}}">{{ $proyecto->name }}</a></td>
                            <td>{{ $proyecto->contratante }}</td>
                            <td>{{ $proyecto->ubicacion }}</td>
                            <td>{{ $proyecto->oferente }}</td>
                            <td>{{ $proyecto->gran_total }}</td>
                            <td>{{ $proyecto->entrega }}</td>
                            </a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mb-2">
                    {{$proyectos->links()}}
                </div>
            @else
                <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                    No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} proyectos por página.
                </div>
            @endif
        </div>
    </div>
</div>