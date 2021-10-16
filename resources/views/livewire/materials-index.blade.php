<div class="container py-8">
    <div>
        <h1 class="text-2xl font-black text-gray-900 pb-6 px-6 md:px-12">
            Materiales para la construcción.
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
            @if($search !=='')
                <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block">X</button>
            @endif
        </div>

        <div class="bg-white">
            <div class="px-4">
                @if($materials->count())
                    <table class="min-w-full divide-y divide-gray-200"> <!--<table class="table-fixed w-full">-->
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Grupo</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Unidad</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 bg-gray-50">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($materials as $key=>$material)
                            <tr>
                                <td class="px-2 py-3">{{ $material->grupo_material->name }}</td>
                                <td>{{ $material->name }}</td>
                                <td>{{ $material->unidad }}</td>
                                <td>{{ $material->precio }}</td>
                                <td>{{ $material->updated_at->format('dMY') }}</td>
                                <td>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                        Proveedor
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4 mb-2">
                        {{$materials->links()}}
                    </div>
                @else
                    <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} materiales por página.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
