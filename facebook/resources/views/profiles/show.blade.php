<x-app>
   <header class="mb-6 relative">
      <div class="relative">
         {{-- <form action="/posts" method="POST">
            <div class="form-group">
               <input type="file" class="form-control" name="image">
             </div>
         </form> --}}
        
      <img 
         
         class="rounded-lg mb-2"
         src="{{ $user->cover }}"
         alt=""
      
         >

         <img

       src="{{ $user->avatar }}"
        alt=""
        class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" 
        style="left: 50%"
        width="150"
        
        >
      </div>
         <div class="flex justify-between items-center mb-6">
            <div>
            <h2 class="font-bold text-2xl "> {{ $user->name}}</h2>
            <p class="text-sm"> joined  {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
               @can ('edit', $user)            
               
               <a 
               href="{{ $user->path('edit') }}" 
               class=" bg-white rounded-full border border-black py-2 px-4 text-black text-xs mr-2">
               Edit Profile</a>

               @endcan

               <!-- anonymous blade component-->
               <x-follow-button :user="$user">

               </x-follow-button>
                <!-- end anonymous blade component -->
            </div>
         </div>

         <p class="text-sm border border-black ">
            add some information here, and let others know about you
         </p>
         


         

   </header>

   @include('_timeline',[
      'posts'=>$posts
   ])
</x-app>
