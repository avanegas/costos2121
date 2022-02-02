<x-app-layout>
    <div class="container mx-auto mt-4 px-4 py-2">

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="flex items-center justify-between py-2 px-6">
                <div>
                    <span class="text-lg font-bold text-gray-800">AUTOR: </span>
                    <span class="ml-1 text-lg text-gray-600 font-normal">{{$precio->user->name}}</span>
                </div>
                <div class="border rounded-lg px-1" style="padding-top: 2px;">
                    <button onclick="exportTableToExcel('table','{{$precio->name}}')" type="button" class="text-blue-700 px-1 leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center">
                        EXCEL
                    </button>
                </div>
            </div>
        </div>

        <table id="table" class="border-collapse w-full my-4">
            <thead>
                <tr>
                    <th class='mt-3 px-4 py-1'  colspan="7">
                        <p class="text-gray-600 text-lg uppercase tracking-wide font-bold text-center mb-3">ANALISIS DE PRECIO UNITARIO</p>
                    </th>
                </tr>
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">GRUPO:</th>
                <td class="px-2 bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell"  colspan="4">{{$precio->grupo_precio->name}}</td>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">FECHA:</th>
                <td class="px-2 bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" >{{$precio->updated_at->isoFormat('MM/YYYY')}}</td>
                </tr>
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">RUBRO:</th>
                <td class="px-2 bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="4">{{$precio->name}}</td>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">UNIDAD:</th>
                <td class="px-2 bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" >{{$precio->unidad}}</td>
                </tr>
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">ESPECIFICACION:</th>
                <td class="px-2 bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="6">{{$precio->detalle}}</td>
                </tr>
                <tr>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="7">EQUIPOS</td>
                </tr>
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">&nbsp;</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Descripcion</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Cantidad</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Tarifa</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Costo Hora</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Rendimiento</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($precio->equipos as $equipo)
                <tr>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ $equipo->id }}</td>          
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">{{ $equipo->name }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($equipo->cantidad,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($equipo->tarifa,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format(($equipo->tarifa * $equipo->cantidad),4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($equipo->rendimiento,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format(($equipo->tarifa * $equipo->cantidad * $equipo->rendimiento),4,',',' ') }}</td>
                </tr>
                @endforeach
                @php $sumaEquipo = $precio->equipos->sum('total');@endphp
                @for ($i=0; $i < 5 - count($precio->equipos); $i++)
                <tr>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">ND</td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                </tr>
                @endfor
                <tr>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="5">MANO DE OBRA</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">Subtotal</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($sumaEquipo,4,',',' ') }}</td>
                </tr>
                <!-- FIN EQUIPO -->
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">&nbsp;</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Descripcion</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Cantidad</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Jornal Hora</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Costo Hora</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Rendimiento</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Total</th>
                </tr>
                @foreach ($precio->obreros as $obrero)
                <tr>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ $obrero->id }}</td>          
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">{{ $obrero->name }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($obrero->cantidad,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($obrero->jornalhora,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format(($obrero->cantidad * $obrero->jornalhora),4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($obrero->rendimiento,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format(($obrero->jornalhora * $obrero->cantidad * $obrero->rendimiento),4,',',' ') }}</td>
                </tr>
                @endforeach
                @php $sumaObrero = $precio->obreros->sum('total');@endphp
                @for ($i=0; $i < 7 - count($precio->obreros); $i++)
                <tr>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">ND</td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                </tr>
                @endfor
                <tr>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="5">MATERIALES</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">Subtotal</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($sumaObrero,4,',',' ') }}</td>
                </tr>
                <!-- FIN OBRERO -->
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">&nbsp;</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2">Descripcion</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Unidad</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Cantidad</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Precio</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Total</th>
                </tr>
                @foreach ($precio->materials as $material)
                <tr>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ $material->id }}</td>          
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2">{{ $material->name }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">{{ $material->unidad }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($material->cantidad,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($material->precio,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format(($material->precio * $material->cantidad),4,',',' ') }}</td>
                </tr>
                @endforeach
                @php $sumaMaterial = $precio->materials->sum('total');@endphp
                @for ($i=0; $i < 7 - count($precio->materials); $i++)
                <tr>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">ND</td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                </tr>
                @endfor
                <tr>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="5">TRANSPORTE</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">Subtotal</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($sumaMaterial,4,',',' ') }}</td>
                </tr>
                <!-- FIN MATERIALES -->
                <tr>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">&nbsp;</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2">Descripcion</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Unidad</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Cantidad</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Tarifa</th>
                <th class="uppercase bg-gray-200 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">Total</th>
                </tr>
                @foreach ($precio->transportes as $transporte)
                <tr>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ $transporte->id }}</td>          
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2">{{ $transporte->name }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell">{{ $transporte->unidad }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($transporte->cantidad,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format($transporte->tarifa*$transporte->distancia,4,',',' ') }}</td>
                    <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">{{ number_format(($transporte->total),4,',',' ') }}</td>
                </tr>
                @endforeach
                @php $sumaTransporte = $precio->transportes->sum('total');@endphp
                @for ($i=0; $i < 4 - count($precio->transportes); $i++)
                <tr>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell">ND</td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                <td class="px-2 bg-white text-gray-600 border border-gray-300 text-sm text-center font-bold lg:table-cell"></td>
                </tr>
                @endfor
                <tr>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="5"></td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">Subtotal</td>
                <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($sumaTransporte,4,',',' ') }}</td>
                </tr>
                <!-- FIN TRANSPORTE -->
                @php $costoDirecto = $sumaEquipo+$sumaObrero+$sumaMaterial+$sumaTransporte;@endphp
                <tr>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">&nbsp;</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">TOTAL DE COSTO DIRECTO</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($costoDirecto,4,',',' ') }}</td>
                </tr>
                @php $indirectosyUtilidades = 0.18*$costoDirecto;@endphp
                <tr>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">&nbsp;</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2">INDIRECTOS Y UTILIDADES %</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center"> 18 %</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($indirectosyUtilidades,4,',',' ') }}</td>
                </tr>
                @php $otrosIndirectos = 0.05*$costoDirecto;@endphp
                <tr>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">&nbsp;</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="2">OTROS INDIRECTOS %</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">5 %</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($otrosIndirectos,4,',',' ') }}</td>
                </tr>
                @php $costoTotal = $costoDirecto+$indirectosyUtilidades+$otrosIndirectos;@endphp
                <tr>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">&nbsp;</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">COSTO TOTAL DEL RUBRO</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($costoTotal,4,',',' ') }}</td>
                </tr>
                @php $costoOfertado = $costoTotal;@endphp
                <tr>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">&nbsp;</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell" colspan="3">VALOR OFERTADO</td>
                    <td class="px-2 uppercase bg-gray-100 text-gray-600 border border-gray-300 text-sm font-bold lg:table-cell text-center">{{ number_format($costoOfertado,4,',',' ') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
        }
    </script>
</x-app-layout>