<div class="container py-8">
    <div>
        <h1 class="text-2xl font-black text-gray-900 pb-6 px-6 md:px-12">
            Presupuestos de construcción.
        </h1>
    </div>

    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            <input class="form-input ronded-md shadow-sm mt-1 block w-full" wire:model="search" type="text" placeholder="Buscar...">

            <div class="form-input ronded-md shadow-sm mt-1 ml-6 block">
                <select wire:model="perPage" class="outline-none text-gray-500 text-sm">
                    <option value="10">10 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
            @if($search !== '')
                <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block">X</button>
            @endif
        </div>

        <div class="bg-white">
            <div class="px-4">
            @if($proyectos->count())
                <table class="min-w-full divide-y divide-gray-200"> <!--<table class="table-fixed w-full">-->
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Contratante</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Oferente</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">gran_total</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($proyectos as $key=>$proyecto)
                        <tr>
                            <a href="#">
                            <td class="px-2 py-3">{{ $proyecto->id }}</td>
                            <td><a class="" href="{{url('proyectos', $proyecto)}}">{{ $proyecto->name }}</a></td>
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
</div>