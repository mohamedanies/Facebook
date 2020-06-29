<div class="flex p-4 {{ $loop->last ? '': 'border-b border-b-grey-400' }}">
    <div class="mr-2 flex-shrink-0">
    <a href="{{  $post->user->path() }}">
        <img

    src="{{ $post->user->avatar }}"
        alt="avatar"
        class="rounded-full mr-2" 
        width="40"
        height="40"
        >
    </a>
    </div>

    <div>
    <h5 class="font-bold mb-4">
        <a href="{{ $post->user->path() }}">
        {{ $post->user->name }}
        </a>
    </h5>
         <form action="/posts/{{ $post->id }}/delete" method="POST">
            @csrf
            @if(auth()->user()->id == $post->user_id)
            <div class="flex justify-end">
                <button  type="submit">Delete post</button>
            </div>
            @endif
            
            
            @method('DELETE')
        
        </form>
        <form action="/posts/{{ $post->id }}/edit" method="get">
            @csrf

            @if(auth()->user()->id == $post->user_id)
            <div class="flex justify-end">
                <button  type="submit">Edit Post</button>
            </div>
            @endif
        </form>
         <p class="font-bold mb-3">
             {{ $post->body }}
         </p>

         <div >
         <img 
         src="/images/{{ $post->image }}" 
         alt=""
         class="rounded-lg"
         >
         </div>

         <hr class="mt-2"/>

         <x-like-buttons :post="$post"  />
          
         <hr/>
         <div class="w-full bg-blue-400">
         <h1 class="font-bold mt-2 ">Comments </h1>
         </div>
         @foreach ($post->comments as $comment)
         
                 <div class=" rounded-lg mt-2">
                    <img src="{{ $post->user->avatar }}"
                    alt="avatar"
                    class="rounded-full" 
                    width="30"
                    height="30"
                    >
                    
                        <p 
                        class="text-sm"
                        >{{ $post->user->name }}
                     </p>

                    
                 </div>
                 <div class="bg-gray-200 border border-blue-500 rounded-lg">
                <p 
                    class="text-sm"
                    > {{ $comment->comment }} </p>
                 
                </div>
              

         @endforeach



    </div>

</div>