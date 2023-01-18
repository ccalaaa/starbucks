<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Starbucks</title>
</head>

<body>
    <div class="min-vh-100 d-flex justify-content-center align-items-center bg-primary">
        <div class="card p-4" style="width: 25rem;">
            <form action="{{ route('login.store') }}" method="POST" class="card-body">
                @csrf
                <img width="80" class="mx-auto d-block mb-2" src="/img/starbucks.svg" alt="Starbucks">
                <h5 class="card-title fw-bold fs-3 text-center">Login</h5>
                @error('email')
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="off" id="email"
                        placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
