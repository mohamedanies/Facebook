<ul class="bg-blue-200 border-2 border-black rounded-lg py-4 px-6">
    <li>
        <a
         class="font-bold text-lg mb-4 block"
          href="{{ route('home') }}">
        Home Page</a>
    </li>
    <hr/>
    <li>
        <a
         class="font-bold text-lg mb-4 block"
         href="/explore">
        Find Friends</a>
    </li>
    <hr/>
    <li>
        <a
         class="font-bold text-lg mb-4 block"
         href="{{ route('profile', auth()->user()) }}">
        Profile</a>
    </li>
    <hr/>
    <li>
    <form action="/logout" method="post">
        @csrf
        <button  class="font-bold text-lg">Logout</button>

    </form>
</li>
</ul>