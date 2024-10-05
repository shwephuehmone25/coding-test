<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Company</title>
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
                        <h2>Edit Company</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Company Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Company Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Company Name"
                                    value="{{ old('name', $company->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Company Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email', $company->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Company Website (Optional) -->
                            <div class="mb-3">
                                <label for="website" class="form-label">Website (Optional)</label>
                                <input type="url" id="website" name="website"
                                    class="form-control @error('website') is-invalid @enderror" placeholder="Website"
                                    value="{{ old('website', $company->website) }}">
                                @error('website')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Company Logo -->
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" id="logo" name="logo"
                                    class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                                    @if($company->logo && Storage::disk('public')->exists($company->logo))
                                        <img src="{{ asset('storage/' . $company->logo) }}" id="preview-image" 
                                             style="height: 80px; width: auto; display: block;" alt="{{ $company->name }} Logo" />
                                    @else
                                        <p>No logo available.</p>
                                    @endif
                                </div>
                                @error('logo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>                            
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Company</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logo').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
