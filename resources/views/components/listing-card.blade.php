@props(['listings'])

<x-card>
 <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$listings->logo ? asset('storage/'. $listings->logo) : asset('images\no-image.png')}}" alt="images de laravel" />
    <div>
        
            <h3 class="text-2xl">
                <a href="/listing/{{$listings->id}}">{{$listings->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listings->company}}</div>
            
            <x-listing-tags :tagsCsv="$listings->tags" />
          
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$listings->location}}
      </div>
    </div>
  </div>
</x-card>