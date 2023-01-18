<x-guest-layout>
    <div class="mt-5 pt-5">
        <div class="container">
            <h1 class="text-center mb-4">{{ $promo->title }}</h1>
            <img src="/storage/{{ $promo->image }}" alt="{{ $promo->title }}" class="mb-4 rounded">
            <div class="px-md-5 mx-md-5 px-0 mx-0">
                {!! $promo->description !!}
            </div>
        </div>
    </div>
</x-guest-layout>
