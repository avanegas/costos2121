<x-app-layout>
  <div class="container py-8">
      <div>
          <h1 class="text-2xl font-black text-gray-900 pb-6 px-6 md:px-12">
              Apuntes, detalles y teoría de la construcción.
          </h1>
      </div>

      @foreach ($posts as $post)
          <div class="flex flex-wrap px-6">
              <div class="w-full md:px-4 lg:px-6 py-5">
                  <div class="bg-white hover:shadow-xl">

                      <article class="w-full h-80 bg-cover bg-center" style="background-image:url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2020/02/06/20/01/university-library-4825366_960_720.jpg @endif)">
                          <div class="w-full h-full px-8 flex flex-col justify-center">
                              <p class="text-sm text-white font-bold">
                                  <a href="{{route('posts.category',$post->category)}}" class="uppercase"> {{$post->category->name}} </a>
                              </p>
                              <p class="text-4x1 text-white leading-6 font-bold mt-2 uppercase">
                                  <a href="{{route('posts.show',$post)}}"> {{$post->name}}</a>
                              </p>
                              <div>
                                  @foreach ($post->tags as $tag)
                                      <a href="{{route('posts.tag', $tag)}}" class="inline-block px-2 h-6 bg-{{$tag->color}}-600 text-white rounded-full"> {{$tag->name}}</a>
                                  @endforeach
                              </div>
                          </div>
                      </article>

                      <div class="px-4 py-4 md:px-10">
                          RESUMEN: <p class="py-2">{!! $post->excerpt !!}</p>
                          <div class="flex flex-wrap pt-8">
                              <div class="w-full md:w-1/3 text-sm font-medium">
                                  {{$post->created_at->format('l jS \\of F Y h:i A')}}
                              </div>
                              <div class="2/3">
                                  <div class="text-sm font-medium">
                                      SHARE:
                                      <a href="" class="text-blue-700 px-1 ">
                                          FACEBOOk
                                      </a>
                                      <a href="" class="text-blue-500 px-1 ">
                                          TWITTER
                                      </a>
                                      <a href="{{route('posts.show',$post)}}" class="text-blue-600 px-1 ">
                                          Comentarios: {{$post->comments->count()}}
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      @endforeach
      <div class="mt-4">
          {{$posts->links()}}
      </div>
  </div>
</x-app-layout>