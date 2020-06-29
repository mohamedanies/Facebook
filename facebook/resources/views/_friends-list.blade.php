<div class="bg-blue-200 border-2 border-black rounded-lg py-2 px-6">
<h3 class="font-bold text-xl nb-4"> My Friends </h3>

<ul >
    @forelse (auth()->user()->follows as $user)
    
        <li class="{{ $loop->last ? '' : 'mt-4' }}">
            <div class="p-2 mt-2">
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                <img

            src="{{ $user-> avatar }}"
                alt="avatar"
                class="rounded-full mr-2" 
                width="40"
                height="40"
                >
                {{ $user->name }}

                </a>
            </div>
        </li>
        <hr/>
        @empty 
          <li> No Friends Yet , Please add some nice friends </li>

    @endforelse
</ul>
</div>