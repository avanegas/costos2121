<div class="row">
    <div class="col-md">
        <!--
        <div class="form-group row mb-3 mt-3">
            <div class="form-group col-10">
                <h5>action Precio</h5>
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-sm" click="save" :disabled="isProcessing"> Save</button>
                <button type="button" class="btn btn-secondary btn-sm" click="$router.back()" :disabled="isProcessing"> Cancel</button>
            </div>
        </div>
        -->

        <div class="card-block">
            <h5 class="text-center">ANALISIS  DE  PRECIO  UNITARIO</h5>
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>GRUPO:</th>
                        <td colspan="4">
                            <select name="grupo_precio_id" id="grupo_precio_id" class="form-control @error('grupo_precio_id') is-invalid @enderror">
                                <option value="">Ingrese el grupo</option>
                                @foreach ( $grupo_precios as $gp)
                                    <option value="{{ $gp->id }}" @isset($precio->grupo_precio_id) @if($precio->grupo_precio_id === $gp->id) selected @endif @endisset>{{ $gp->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <th>FECHA:</th>
                        <td ><input type=date value={{$precio->updated_at}}></td>
                    </tr>
                    <tr>
                        <th>RUBRO:</th>
                        <td colspan="4">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del precio' name="name" value="{{ isset($precio->name)?$precio->name:old('name') }}" autocomplete=off autofocus>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <th>UNIDAD:</th>
                        <td>
                            <input id="unidad" type="text" class="form-control @error('unidad') is-invalid @enderror"  placeholder='Ingrese la unidad'name="unidad" value="{{ isset($precio->unidad)?$precio->unidad:old('unidad') }}">
                            @error('unidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                    </tr>
                    <tr>
                        <th>ESPECIFICACION:</th>
                        <td colspan="6">
                            <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"  placeholder='Ingrese la especificación del rubro'name="detalle" value="{{ isset($precio->detalle)?$precio->detalle:old('detalle') }}">
                            @error('detalle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">EQUIPOS</td>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th>DESCRIPCION</th>
                        <th  class="text-center">CANTIDAD</th>
                        <th  class="text-center">TARIFA</th>
                        <th  class="text-center">COSTO HORA</th>
                        <th  class="text-center">RENDIMIENTO</th>
                        <th  class="text-center">TOTAL</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($precio->equipos as $equipo)
                    <tr>
                        <!--
                        <td click="abrirModal(lista='equipos',indice=equipo.equipo_id)"  data-toggle="modal" data-target="#exampleModalLong">
                        -->
                        <td data-toggle="modal" data-target="#exampleModalLong" @php $lista='equipos'; $indice=$equipo->equipo_id; @endphp>
                            <input id="equipo_id" type="text" class="form-control @error('equipo_id') is-invalid @enderror" placeholder='Ingrese el código' name="equipo_id" value="{{ isset($equipo->equipo_id)?$equipo->equipo_id:old('name') }}" autocomplete=off autofocus>
                            @error('equipo_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre' name="name" value="{{ isset($equipo->name)?$equipo->name:old('name') }}" autocomplete=off autofocus>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="cantidad" type="text" class="form-control text-right @error('cantidad') is-invalid @enderror" placeholder='Ingrese la cantidad' name="cantidad" value="{{ isset($equipo->cantidad)?$equipo->cantidad:old('cantidad') }}" autocomplete=off autofocus>
                            @error('cantidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="tarifa" type="text" class="form-control text-right @error('tarifa') is-invalid @enderror" placeholder='Ingrese la tarifa' name="tarifa" value="{{ isset($equipo->tarifa)?$equipo->tarifa:old('tarifa') }}" autocomplete=off autofocus>
                            @error('tarifa')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td class="text-right">{{number_format(($equipo->cantidad*$equipo->tarifa),4,',',' ') }}</td>
                        <td>
                            <input id="rendimiento" type="text" class="form-control text-right @error('rendimiento') is-invalid @enderror" placeholder='Ingrese el rendimiento' name="rendimiento" value="{{ isset($equipo->rendimiento)?$equipo->rendimiento:old('rendimiento') }}" autocomplete=off autofocus>
                            @error('rendimiento')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td class="text-right">{{number_format(($equipo->cantidad * $equipo->tarifa * $equipo->rendimiento),4,',',' ') }}</td>
                    </tr>
                    @endforeach
                    @php $sumaEquipo = $precio->equipos->sum('total');@endphp
                    @for ($i=0; $i < 5 - count($precio->equipos); $i++)
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModalLong" @php $lista='equipos'; $indice=0; @endphp>
                            <input type="text" class="form-control" value="Ingrese Equipo">
                        </td>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="text" class="form-control" ></td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="5">MANO DE OBRA</td>
                        <td> Subtotal</td>
                        <td class="text-right">{{ $sumaEquipo }}</td>
                    </tr>
                    <!-- FIN EQUIPO -->
                    <tr>
                        <th>&nbsp;</th>
                        <th>DESCRIPCION</th>
                        <th class="text-center">CANTIDAD</th>
                        <th class="text-center">JORNAL HORA</th>
                        <th class="text-center">COSTO HORA</th>
                        <th class="text-center">RENDIMIENTO</th>
                        <th class="text-center">TOTAL</th>
                    </tr>
                    @foreach($precio->obreros as $obrero)
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModalLong" @php $lista='obreros'; $indice=$obrero->obrero_id; @endphp>
                            <input id="obrero_id" type="text" class="form-control @error('obrero_id') is-invalid @enderror" placeholder='Ingrese el código' name="obrero_id" value="{{ isset($obrero->obrero_id)?$obrero->obrero_id:old('obrero') }}" autocomplete=off autofocus>
                            @error('obrero_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre' name="name" value="{{ isset($obrero->name)?$obrero->name:old('name') }}" autocomplete=off autofocus>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="cantidad" type="text" class="form-control text-right @error('cantidad') is-invalid @enderror" placeholder='Ingrese la cantidad' name="cantidad" value="{{ isset($obrero->cantidad)?$obrero->cantidad:old('cantidad') }}" autocomplete=off autofocus>
                            @error('cantidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="jornalhora" type="text" class="form-control text-right @error('jornalhora') is-invalid @enderror" placeholder='Ingrese el jornal hora' name="jornalhora" value="{{ isset($obrero->jornalhora)?$obrero->jornalhora:old('jornalhora') }}" autocomplete=off autofocus>
                            @error('jornalhora')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td class="text-right">{{number_format(($obrero->cantidad*$obrero->jornalhora),4,',',' ') }}</td>
                        <td>
                            <input id="rendimiento" type="text" class="form-control text-right @error('rendimiento') is-invalid @enderror" placeholder='Ingrese el rendimiento' name="rendimiento" value="{{ isset($obrero->rendimiento)?$obrero->rendimiento:old('rendimiento') }}" autocomplete=off autofocus>
                            @error('rendimiento')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td class="text-right">{{number_format(($obrero->cantidad * $obrero->jornalhora * $obrero->rendimiento),4,',',' ') }}</td>
                    </tr>
                    @endforeach
                    @php $sumaObrero = $precio->obreros->sum('total');@endphp
                    @for ($i=0; $i < 5 - count($precio->obreros); $i++)
                    <tr>
                        <td click="abrirModal(lista='obreros')">Ingrese Obrero</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="5">MATERIALES</td>
                        <td> Subtotal</td>
                        <td class="text-right">{{ $sumaObrero }}</td>
                    </tr>
                    <!-- FIN OBRERO -->
                    <tr>
                        <th>&nbsp;</th>
                        <th colspan="2">DESCRIPCION</th>
                        <th  class="text-center">UNIDAD</th>
                        <th  class="text-center">CANTIDAD</th>
                        <th  class="text-center">PRECIO</th>
                        <th  class="text-center">TOTAL</th>
                    </tr>
                    @foreach($precio->materials as $material)
                    <tr>
                        <td data-toggle="modal" data-target="#exampleModalLong" @php $lista='materials'; $indice=$material->material_id; @endphp>
                            <input id="material_id" type="text" class="form-control @error('material_id') is-invalid @enderror" placeholder='Ingrese el código' name="material_id" value="{{ isset($material->material_id)?$material->material_id:old('material') }}" autocomplete=off autofocus>
                            @error('material_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td colspan="2">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre' name="name" value="{{ isset($material->name)?$material->name:old('name') }}" autocomplete=off autofocus>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="unidad" type="text" class="form-control @error('unidad') is-invalid @enderror" placeholder='Ingrese la unidad' name="unidad" value="{{ isset($material->unidad)?$material->unidad:old('unidad') }}" autocomplete=off autofocus>
                            @error('unidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="cantidad" type="text" class="form-control text-right @error('cantidad') is-invalid @enderror" placeholder='Ingrese la cantidad' name="cantidad" value="{{ isset($material->cantidad)?$material->cantidad:old('cantidad') }}" autocomplete=off autofocus>
                            @error('cantidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="precio" type="text" class="form-control text-right @error('precio') is-invalid @enderror" placeholder='Ingrese el precio' name="precio" value="{{ isset($material->precio)?$material->precio:old('precio') }}" autocomplete=off autofocus>
                            @error('precio')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td class="text-right">{{number_format(($material->cantidad * $material->precio),4,',',' ') }}</td>
                    </tr>
                    @endforeach
                    @php $sumaMaterial = $precio->materials->sum('total');@endphp
                    @for ($i=0; $i < 5 - count($precio->materials); $i++)
                    <tr>
                        <td click="abrirModal(lista='materials')">Ingrese Material</td>
                        <td colspan="2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="5">TRANSPORTES</td>
                        <td> Subtotal</td>
                        <td  class="text-right">{{ $sumaMaterial }}</td>
                    </tr>
                    <!-- FIN MATERIAL -->
                    <tr>
                        <th>&nbsp;</th>
                        <th colspan="2">DESCRIPCION</th>
                        <th  class="text-center">UNIDAD</th>
                        <th  class="text-center">CANTIDAD</th>
                        <th  class="text-center">TARIFA</th>
                        <th  class="text-center">TOTAL</th>
                    </tr>
                    @foreach($precio->transportes as $transporte)
                    <tr>
                        <td click="abrirModal(lista='transportes')">
                            <input id="transporte_id" type="text" class="form-control @error('transporte_id') is-invalid @enderror" placeholder='Ingrese el código' name="transporte_id" value="{{ isset($transporte->transporte_id)?$transporte->transporte_id:old('transporte') }}" autocomplete=off autofocus>
                            @error('transporte_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td colspan="2">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre' name="name" value="{{ isset($transporte->name)?$transporte->name:old('name') }}" autocomplete=off autofocus>
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="unidad" type="text" class="form-control @error('unidad') is-invalid @enderror" placeholder='Ingrese la unidad' name="unidad" value="{{ isset($transporte->unidad)?$transporte->unidad:old('unidad') }}" autocomplete=off autofocus>
                            @error('unidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="cantidad" type="text" class="form-control text-right @error('cantidad') is-invalid @enderror" placeholder='Ingrese la cantidad' name="cantidad" value="{{ isset($transporte->cantidad)?$transporte->cantidad:old('cantidad') }}" autocomplete=off autofocus>
                            @error('cantidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td>
                            <input id="tarifa" type="text" class="form-control text-right @error('tarifa') is-invalid @enderror" placeholder='Ingrese la tarifa' name="tarifa" value="{{ isset($transporte->tarifa)?$transporte->tarifa:old('tarifa') }}" autocomplete=off autofocus>
                            @error('tarifa')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </td>
                        <td class="text-right">{{number_format(($transporte->cantidad * $transporte->tarifa * $transporte->distancia),4,',',' ') }}</td>
                    </tr>
                    @endforeach
                    @php $sumaTransporte = $precio->transportes->sum('total');@endphp
                    @for ($i=0; $i < 5 - count($precio->transportes); $i++)
                    <tr>
                        <td click="abrirModal(lista='transportes')">Ingrese Transporte</td>
                        <td colspan="2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endfor
                    <tr>
                        <td colspan="5">&nbsp;</td>
                        <td> Subtotal</td>
                        <td  class="text-right">{{ $sumaTransporte }}</td>
                    </tr>
                    <!-- FIN TRANSPORTE -->
                    @php
                        $costoDirecto = $sumaEquipo+$sumaObrero+$sumaMaterial+$sumaTransporte;
                        $indirectos = 18;
                        $otros = 5;
                        $indirectoyUtilidades = $indirectos*$costoDirecto/100;
                        $otro = $otros*$costoDirecto/100;
                        $total =  $costoDirecto + $indirectoyUtilidades + $otro;
                        $ofertado = $total;
                    @endphp
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="3">TOTAL DE COSTO DIRECTO</td>
                        <td  class="text-right">{{ $costoDirecto }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="2">INDIRECTOS Y UTILIDADES %</td>
                        <td  class="text-right">{{ $indirectos }}%</td>
                        <td  class="text-right">{{ $indirectoyUtilidades }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="2">OTROS INDIRECTOS %</td>
                        <td  class="text-right">{{ $otros }}%</td>
                        <td  class="text-right">{{ $otro }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="3">COSTO TOTAL DEL RUBRO</td>
                        <td  class="text-right">{{ $total }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="3">VALOR OFERTADO</td>
                        <td  class="text-right">{{ $ofertado }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Equipos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="">
                                @livewire('admin.lista-searchs-index',['lista' => $lista, 'indice' => $indice] )
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

    </div>
</div>
