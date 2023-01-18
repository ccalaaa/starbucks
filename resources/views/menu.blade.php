<x-guest-layout>
    <div class="mt-5 pt-5">
        <div class="container">
            <div class="text-center">
                <h1>{{ $type }}</h1>
            </div>
            <div class="row mt-5 justify-content-center g-4">
                @forelse ($menu as $row)
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ratio ratio-1x1 mb-3">
                            <img
                                class="object-fit-cover rounded"
                                src="/storage/{{ $row->image }}"
                                alt="{{ $row->name }}" />
                        </div>
                        <h2 class="text-center fs-3">
                            <a
                                href="#"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas{{ $row->id }}"
                                aria-controls="offcanvas{{ $row->id }}"
                                class="text-decoration-none">{{ $row->name }}</a>
                        </h2>
                    </div>
                    <div
                        class="offcanvas offcanvas-end"
                        tabindex="-1"
                        id="offcanvas{{ $row->id }}"
                        aria-labelledby="offcanvas{{ $row->id }}Label">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvas{{ $row->id }}Label">
                                {{ $row->name }}
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="ratio ratio-1x1 mb-3">
                                <img
                                    class="object-fit-cover rounded"
                                    src="/storage/{{ $row->image }}"
                                    alt="{{ $row->name }}" />
                            </div>
                            {!! $row->description !!}
                        </div>
                    </div>
                @empty
                    <p>No data...</p>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-layout>
