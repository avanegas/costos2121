<div class="container py-8">
    <div>
        <h1 class="px-6 pb-6 text-2xl font-black text-gray-900 md:px-12">
            Ofertas...<strong class="text-sm"> Con factura y garantía.</strong>
        </h1>
    </div>

    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

        <div class="flex px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
            <input class="block w-full mt-1 shadow-sm form-input ronded-md" wire:model="search" type="text" placeholder="Buscar...">
            <div class="block mt-1 ml-6 shadow-sm form-input ronded-md">
                <select wire:model="perPage" class="text-sm text-gray-500 outline-none">
                    <option value="9">9 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
            @if($search !== '')
                <button wire:click="clear" class="block mt-1 ml-6 rounded-md shadow-sm form-input">X</button>
            @endif
        </div>

        <div class="bg-white">
            <div class="px-4">
                @if($ofertas->count())
                    <section class="grid grid-cols-1 gap-5 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
                        @foreach($ofertas as $key=>$oferta)
                        <div class="py-2 overflow-hidden rounded shadow-lg">

                            @if ($oferta->image)
                                <img class="object-cover object-center w-full rounded-lg shadow-md h-80" src="{{Storage::url($oferta->image->url)}}" alt="">
                            @else
                                <img class="w-full rounded-lg shadow-md" src="https://source.unsplash.com/random/350x350" alt="">
                            @endif

                            <div class="flex items-baseline pt-2">
                                <span class="inline-block px-3 text-xs font-bold tracking-wide text-teal-800 uppercase bg-teal-200 rounded-full">
                                    New
                                </span>
                                <div class="ml-2 text-xs font-semibold tracking-wider text-gray-600 uppercase">
                                    {{ $oferta->stock }} en stock  &bull; /{{ $oferta->unidad }}
                                </div>
                                <span class="px-2 ml-2 font-bold text-red-700 bg-red-200 rounded-full text-x1">$ {{ $oferta->precio }}</span>
                            </div>

                            <div class="px-2 py-4">
                                <div class="mb-2 font-bold uppercase">{{ $oferta->name }}</div>
                                <p class="text-base text-gray-700 ">{{ $oferta->descripcion }}</p>
                            </div>

                            <div class="px-2 pt-2 pb-2">
                                <span class="inline-block px-2 py-1 mb-2 mr-2 text-sm font-bold text-blue-700 bg-yellow-200 rounded-full">{{$oferta->updated_at->diffForHumans()}}</span>
                                <span class="inline-block px-2 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">TWITTER</span>
                                <span class="inline-block px-2 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-green-200 rounded-full">
                                    <a href="storage/archivos/{{$oferta->file}}" target="blanck_"> {{ $oferta->file }} </a>
                                </span>
                            </div>

                            <div class="flex mb-4 space-x-3 text-sm font-medium">
                                <div class="flex flex-auto space-x-3">
                                    <button class="flex items-center justify-center w-1/2 text-white bg-black rounded-md" type="submit">Buy now</button>
                                    <button class="flex items-center justify-center w-1/2 border border-gray-300 rounded-md" type="button">Add to bag</button>
                                </div>
                                <button class="flex items-center justify-center flex-none text-gray-400 border border-gray-300 rounded-md w-9 h-9" type="button" aria-label="like">
                                    <svg width="20" height="20" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                        @endforeach
                    </section>
                    <div class="mt-4 mb-2">
                        {{$ofertas->links()}}
                    </div>
                @else
                    <div class="px-4 py-3 text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                        No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} ofertas por página.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>