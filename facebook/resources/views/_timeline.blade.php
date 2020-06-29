{{-- @include('_puplish-post-panel') --}}
                        
        <div class="border-2 border-black rounded-lg p-2 mt-2">
            @forelse ($posts as $post)
            
            <div class="border border-grey-300 rounded-lg mt-6">
                @include('_posting')
                <form action="/posts/{{ $post->id }}/store" method="POST">
                    @csrf
                <div class="border border-grey-300 rounded-lg mt-2">
                    <label for="comment"></label>
                    <textarea 
                   name="comment" 
                   class="w-full border-2 border-blue-400 rounded-lg"
                   placeholder="write comment here "
                   required
                  ></textarea>
                </div>

                <div class="flex mt-2 justify-end p-2">
                    <button class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white" type="submit">Add Comment </button>
                </div>
            </form>
        </div>
            @empty 
                 <p class="p-4"> No Posts Yet, Go and write Some Posts Now </p>    

            @endforelse

        

            {{ $posts->links() }}
        
        </div>