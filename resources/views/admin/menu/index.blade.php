<x-admin-layout>
    <div class="mt-5 pt-5">
        <div class="container">
            <h1>Menu</h1>
            <a class="btn btn-primary" href="{{ route('admin.menu.create') }}">Create</a>
            @if (session()->has('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $row)
                            <tr>
                                <td class="align-middle">{{ $row->name }}</td>
                                <td class="align-middle">{{ $row->type }}</td>
                                <td class="d-flex gap-2">
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.menu.edit', $row->id) }}">Edit</a>
                                    <div class="vr"></div>
                                    <form onsubmit="return confirm('Yakin?')" method="POST"
                                        action="{{ route('admin.menu.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="1000000">No data...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
