<div class="card">
    <div class="card-header form-inline">
        <div class="col-8">
             <input wire:model="search" type="text" class="w-100 form-control" placeholder="Ingrese una oferta">
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

    @if ($ofertas->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la oferta</th>
                        <th>Creado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ofertas as $oferta)
                        <tr>
                            <td>{{$oferta->id}}</td>
                            <td>{{$oferta->name}}</td>
                            <td>{{$oferta->created_at->diffForHumans()}}</td>
                            <td style="width:10px">
                                <a href="{{route('admin.ofertas.edit', $oferta)}}"><i class="fa fa-edit"></i></a>
                            </td>
                            <td style="width:10px">
                                <form action="{{route('admin.ofertas.destroy', $oferta)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: transparent; border:none;"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {{$ofertas->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningún registro.</strong>
        </div>
    @endif

</div>
