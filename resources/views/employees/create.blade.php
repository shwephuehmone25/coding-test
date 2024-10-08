<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('partials.dashboard')

    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Employee</h2>

        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data"
            class="border border-3 p-4 rounded">
            @csrf

            <!-- Employee Name -->
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Employee Name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Employee Email -->
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Employee Email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Employee Phone -->
            <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone"
                    class="form-control @error('phone') is-invalid @enderror" placeholder="Employee Phone">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Employee Profile -->
            <div class="form-group mb-3">
                <label for="profile">Profile</label>
                <input type="file" id="profile" name="profile" class="form-control @error('profile') is-invalid @enderror" 
                       placeholder="Employee Profile" accept="image/*" />
                <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                    <img src="" id="preview-image" style="height: 80px; width: 80px; display: none;" />
                </div>
                @error('profile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Select Company -->
            <div class="form-group mb-3">
                <label for="company_id">Company</label>
                <select id="company_id" name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        document.getElementById('profile').addEventListener('change', function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                const previewImage = document.getElementById('preview-image');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block'; 
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
