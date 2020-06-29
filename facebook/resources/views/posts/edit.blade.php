<x-app>
    
    <form action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-black"
                   for="name"
            >
                Post Body
            </label>

            <textarea class="border-2 border-black rounded-lg p-2 w-full"
                   type="text"
                   name="body"
                   id="body"
                   value=""
                   required
            >{{ $post->body }}</textarea>

            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        

        
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-black"
                  for="avatar"
            >
                Post Image
            </label>

            <div class="flex">
                <input class="border-2 border-black rounded-lg p-2 w-full"
                       type="file"
                       name="image"
                       id="image"
                       
                >

                {{-- <img src="{{ $post->image }}"
                alt="post image"
                width="40"
                > --}}
                
            </div>

            @error('image')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        

        

        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
            >
                Update
            </button>

            <a href="/posts" class="hover:underline">Cansle</a>



    </form>
</x-app>