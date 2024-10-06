<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Lists</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('partials.dashboard')
    <div class="container mt-5">
        <h2 class="mb-4">Companies List</h2>

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('companies.create') }}" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i>Add
                New Company</a>

            <!-- Search Form -->
            <form method="GET" action="{{ route('companies.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search by name, email, website link" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <a href="{{ route('companies.index') }}" class="btn btn-secondary mb-3">Clear</a>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Company's Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $company->logo) }}"
                                 alt="{{ $company->name }} Logo" style="height: 80px; width: auto;">
                        </td>                        
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-success btn-sm"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit</a>

                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this company?')"><i
                                        class="fa-solid fa-trash"></i>Delete</button>
                            </form>

                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-eye"></i> View
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $companies->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
