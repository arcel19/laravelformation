<x-layout>
 @include('partials.__hero')
 @include('partials.__search')
 
 <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

 @unless (count($listing) == 0)


 @foreach ( $listing as $listings)

 <x-listing-card :listings="$listings" />

@endforeach 

@else
<p> no listing </p>
     
 @endunless
 </div>

 <div class = "mt-6 p-7">
    {{ $listing->links() }}
 </div>
</x-layout>
     
 
