<div class="border-2 border-black rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/posts" enctype="multipart/form-data">
        @csrf

        <textarea 
        name="body" 
        class="w-full border-2 border-blue-400 rounded-lg"
        placeholder="write some thing here"
        required
       ></textarea>
       

       <hr class="my-4">
       <div class="form-group">
        <input type="file" class="form-control" name="image">
      </div>
       <hr class="my-4">


       <footer class="flex justify-between">
        <img

       src="{{ auth()->user()->avatar }}"
        alt="your avatar"
        class="rounded-full mr-2" 
        width="40"
        height="40"
        >

        <button class="bg-blue-500 rounded-full shadow py-2 px-2 text-white" type="submit"> Puplish Now</button>

       </footer>

    </form>
    @error('body')
<p class="text-red-500 text-sm mt-2"> {{ $message }}</p>
    @enderror

 

</div>