@foreach($comments as $comment)
    <div  x-data="{open:false}" class="display-comment">

        @if ($comment->parent_id)
            <div class="bg-slate-50 rounded-lg p-3 flex flex-col justify-center items-center md:items-start shadow-lg mb-4 ml-5">
                @else
                    <div class="bg-white rounded-lg p-3 flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                        @endif

                        <div class="flex flex-row justify-center mr-2">
                            <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                            <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{ $comment->user->name }} comento {{$comment->updated_at->diffForHumans()}}:</h3>
                        </div>
                        <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $comment->comment }}</p>

                        <button x-show="!open" x-on:click="open=true" class="bg-blue-200 px-2 py-1 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">Replicar!</button>
                        <button x-show="open" x-on:click="open=true"  class="bg-green-200 px-2 py-1 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">Mejor NO!</button>
                    </div>

                    <div x-show="open" x-on:click.away="open=false" class="ml-5">
                        <form class="m-4 flex" action="{{ route('reply.add') }}" accept-charset="UTF-8"  method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post_id }}" />
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                            <textarea id="comment" name="comment"  class="w-full rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" rows="4" placeholder="Replicar aqui ..."></textarea>
                            <button type="submit" class="bg-green-300 border-green-300 px-8 p-4 rounded-r-lg text-xl text-gray-800 font-bold uppercase border-t border-b border-r">Replicar</button>
                        </form>
                    </div>

                    @include('admin.comments.replies', ['comments' => $comment->replies])

            </div>
@endforeach