<x-layout>

        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                @foreach ($listings as $listing )
                    
                
                    
                
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="show.html">
                            {{ $listing->title }}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listing/{{ $listing->id }}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    

               
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <form method="POST" action="/listing/{{ $listing->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"> Delete</i>  </button>
                    </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class=" px-4 py-4 border-t border-b border-gray-300 text-lg"> 
                        <p class="text-cented"> No listings Found </p>
                    </td> "
                 </tr>
                 @endunless
            </tbody>
        </table>

</x-layout>