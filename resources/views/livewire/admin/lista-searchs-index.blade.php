<div class="card">
    <div class="card-header">
        <button class="btn btn-warning btn-block"><strong>Borrar datos en esta linea. .  .?</strong></button>
    </div>

    <div >
        <div class="card-header form-inline">
            <div class="col-8">
                <input wire:model="search" type="text" class="w-100 form-control"  placeholder="Buscar...">
            </div>
            <div class="col-3">
                <select wire:model="perPage" class="form-control w-100">
                    <option value="20">20 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
            <div class="col">
                @if($search !=='')
                    <button wire:click="clear" class="form-control w-100">X</button>
                @endif
            </div>
        </div>

        @if($equipos->count())
            <div class="card-body">
                <table class="table table-striped w-full">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th wire:click="order('name')">
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
                            <th wire:click="order('marca')">
                                Marca
                                {{-- sort --}}
                                @if ($sort == 'marca')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('tipo')">
                                Tipo
                                {{-- sort --}}
                                @if ($sort == 'tipo')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th>Tarífa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($equipos as $key=>$equipo)
                        <tr wire:click="pasar({{ $equipo }})" style="cursor:pointer;">
                            <td class="px-2 py-3">{{ $equipo->grupo_equipo->name }}</td>
                            <td>{{ $equipo->name }}</td>
                            <td>{{ $equipo->marca }}</td>
                            <td>{{ $equipo->tipo }}</td>
                            <td>{{ $equipo->tarifa }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mb-2">
                    {{$equipos->links()}}
                </div>
            </div>
            @else
                <div class="card-body">
                    <strong>No existe ningún registro.</strong>
                </div>
            @endif
    </div>
</div>
