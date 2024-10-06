<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Details</title>
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
                        <h2>Company Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Company Name:</strong></label>
                            <p id="name">{{ $company->name }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Email:</strong></label>
                            <p id="email">{{ $company->email }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label"><strong>Website:</strong></label>
                            <p id="website">
                                @if($company->website)
                                    <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                @else
                                    No website available
                                @endif
                            </p>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label"><strong>Logo:</strong></label>
                            <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                                @if($company->logo && Storage::disk('public')->exists($company->logo))
                                    <img src="{{ asset('storage/' . $company->logo) }}" id="preview-image" 
                                         style="height: 80px; width: auto; display: block;" alt="{{ $company->name }} Logo" />
                                @else
                                    <p>No logo available.</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to Companies</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit Company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
