<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    @include('partials.dashboard')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Employee Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <h5>{{ $employee->name }}</h5>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <h5>{{ $employee->email }}</h5>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <h5>{{ $employee->phone }}</h5>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                                @if($employee->profile && Storage::disk('public')->exists($employee->profile))
                                    <img src="{{ asset('storage/' . $employee->profile) }}" id="preview-image" 
                                         style="height: 80px; width: auto; display: block;" alt="{{ $employee->name }}" />
                                @else
                                    <p>No photo available.</p>
                                @endif
                            </div>
                        </div>

                        <a href="{{ route('employees.index') }}" class="btn btn-primary">Back to Employee List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
