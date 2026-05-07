<x-layout title="info">
<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="mb-4 text-center">
            Laravel CRUD Form
        </h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Start --}}
        @if(isset($editInfo))

            <form action="{{ route('infos.update', $editInfo->id) }}" method="POST">

                @csrf
                @method('PUT')

        @else

            <form action="{{ route('infos.store') }}" method="POST">

                @csrf

        @endif

            <div class="mb-3">
                <label class="form-label">
                    Full Name
                </label>

                <input
                    type="text"
                    name="full_name"
                    class="form-control"
                    value="{{ $editInfo->full_name ?? '' }}"
                    placeholder="Enter Full Name"
                >

                @error('full_name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Massage
                </label>

                <textarea
                    name="massage"
                    class="form-control"
                    rows="4"
                    placeholder="Enter Massage"
                >{{ $editInfo->massage ?? '' }}</textarea>

                @error('massage')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">

                @if(isset($editInfo))
                    Update
                @else
                    Submit
                @endif

            </button>

        </form>
    </div>

    {{-- Table --}}
    <div class="card mt-5 shadow p-4">

        <h3 class="mb-4">
            All Data
        </h3>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Massage</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($infos as $info)

                    <tr>
                        <td>{{ $info->id }}</td>
                        <td>{{ $info->full_name }}</td>
                        <td>{{ $info->massage }}</td>

                        <td>

                            <a
                                href="{{ route('infos.edit', $info->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('infos.destroy', $info->id) }}"
                                method="POST"
                                style="display:inline-block;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this item?')"
                                >
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            No Data Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-layout>