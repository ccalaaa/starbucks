<x-admin-layout>
    <div class="mt-5 pt-5">
        <div class="container">
            <h1>Create Menu</h1>
            <a class="btn btn-secondary" href="{{ route('admin.menu.index') }}">Back</a>
            <form action="{{ route('admin.menu.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                @if ($errors->all())
                    <div class="alert alert-danger mb-3" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" name="type" id="type">
                        <option value="STARBUCKS BEVERAGES">STARBUCKS BEVERAGES</option>
                        <option value="FRESH FOOD">FRESH FOOD</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="x" type="hidden" name="description">
                    <trix-editor input="x"></trix-editor>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-admin-layout>
