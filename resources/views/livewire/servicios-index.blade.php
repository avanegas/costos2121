<div class="container py-8">
    <div class="flex pb-6 ">
        <p class="flex-initial text-2xl text-gray-900 px-6 md:px-12">
            Servicios.
        </p>
        <p class="form-input bg-yellow-100 border-b border-gray-300 text-gray-700 text-center rounded-md w-full pt-1 ml-6">
            SIN COMPROMISO diseño, construcción y mucho más con los mejores  . ...<span class="font-bold text-pink-500"> CALIDAD, ECONOMIA Y SEGURIDAD!</span>
        </p>
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
            <div class="ml-6 block">
                <select wire:model="search" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione</option>
                    @foreach ( $groups as $key => $group)
                        <option value="{{$group->name}}" class="text-sm font-semibold">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            @if($search !=='')
                <button wire:click="clear" class="border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 ml-6 px-2 block">X</button>
            @endif
        </div>
        <div class="bg-white">
            <div class="px-4">
                @if ($users->count())
                    <table class="min-w-full divide-y divide-gray-200"> <!--<table class="w-full table-fixed">-->
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">GRUPOS</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">NOMBRES</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">EMAIL</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">EXPERIENCIA</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">DOMICILIO</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $key=>$user)
                            <tr>
                            <a href="#">
                                <td class="px-2 py-3">{{ $user->groups->pluck('name')->implode(', ') }}</td>
                                <td><a class="" href="{{url('users', $user)}}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <p class="">{{ $user->profile->bio }}</p>
                                <td>
                                    <p>{{ $user->location->country }}</p>
                                    <p class="text-sm">PHONE: {{ $user->profile->phone }}</p></td>
                                </td>
                            </a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 mb-2">
                        {{$users->links()}}
                    </div>
                @else
                    <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} proyectos por página.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>