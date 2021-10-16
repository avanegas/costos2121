<x-app-layout>
  <div class="container py-8">
      <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
      <div class="text-lg text-gray-500 mb-2">{!! $post->excerpt !!}</div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

          {{-- Contenido Principal--}}
          <div class="md:col-span-2">
              <div class="text-base text-gray-500 mt-4">.<span class="font-bold uppercase"> {{$post->user->name}}</span> actualizó el {{$post->updated_at->diffForHumans()}}</div>

              <figure>
                  @if ($post->image)
                      <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                  @else
                      <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/02/06/20/01/university-library-4825366_960_720.jpg" alt="">                    
                  @endif
              </figure>

              <div class="text-base text-gray-500 mt-4">{!! $post->body !!}</div>
          </div>

          {{-- Contenido Relacionado --}}
          <aside>
              <h1 class="font-bold text-gray-700 mb-4">Más en... <span >{{$post->category->name}}</span></h1>
              <ul>
                  @foreach ($similares as $similar)
                      <li class="mb-4">
                          <a class="flex" href="{{route('posts.show', $similar)}}">
                              @if($similar->image)
                                  <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                              <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                              @else
                                  <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/02/06/20/01/university-library-4825366_960_720.jpg" alt="">
                              @endif
                          </a>
                      </li>
                  @endforeach
              </ul>
          </aside>

      </div>

      {{-- Comentarios --}}
      <div x-data="{open:false}">
          <section class="rounded-b-lg  mt-4 ">
              @auth
                  <button x-show="!open" class="bg-blue-200 px-1 py-1 rounded border border-blue-300 text-gray-800 max-w-max shadow-md hover:shadow-lg hover:bg-blue-300 float-right" x-on:click="open=true">Comentar!</button>
                  <button x-show="open"  class="bg-red-200 px-1 py-1 rounded border border-red-300 text-gray-800 max-w-max shadow-md hover:shadow-lg hover:bg-red-300 float-right" x-on:click="open=true">Mejor NO!</button>
              @endauth

              <h3 class="py-2 text-lg flex">Comentarios: &nbsp; <strong> {{$post->comments->count()}}</strong></h3>
              @guest
                  <p class="mb-4"><small>PARA COMENTAR ES NECESARIO REGISTRARSE</small></p>
              @endguest

              <div x-show="open" x-on:click.away="open=false">
                  <form class="m-4 flex" action="{{route('comment.add')}}" accept-charset="UTF-8" method="POST">
                      @csrf
                      <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                      <textarea id="comment" name="comment" class=" w-full rounded-l-lg p-4 border-t mr-0 border-b border-l text-xl text-gray-800 border-gray-200 bg-white" rows="4" placeholder="Comentar aqui ..."></textarea>
                      <button type="submit" class="px-8 rounded-r-lg bg-red-300 text-xl text-gray-800 font-bold p-4 uppercase border-red-300 border-t border-b border-r">Comentar</button>
                  </form>
              </div>

              <div class="card-body">
                  @include('comments.replies', ['comments' => $post->comments, 'post_id' => $post->id])
              </div>

          </section>
      </div>
  </div>
</x-app-layout>
