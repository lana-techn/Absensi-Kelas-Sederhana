<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('img/logo-title-dekstop.png') }}" type="image/x-icon">
    <title>Login_AE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex align-items-center min-vh-100 justify-content-center flex-column">
    <section class="p-3 p-md-4 p-xl-5 col-9 shadow border border-1 rounded border-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
              <div class="d-flex flex-column justify-content-start h-100 p-3 p-xl-5">
                <img class="img-fluid d-md-block d-none rounded mx-auto my-auto" loading="lazy" src="{{ url('img/logo-title-dekstop.png') }}" width="400" alt="BootstrapBrain Logo">
                <img class="img-fluid d-md-none rounded mx-auto my-auto" loading="lazy" src="{{ url('img/logo-title-phone.png') }}" width="400" alt="BootstrapBrain Logo">
              </div>
            </div>
            <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
              <div class="p-3 p-md-4 p-xl-5">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-5">
                      <h3>Log in</h3>
                    </div>
                  </div>
                </div>
                <form action="{{ route('login.submit') }}" method="POST">
                  @csrf
                  <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                      <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" name="password" id="password" value="" required>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="show_password" id="show_password">
                        <label class="form-check-label text-secondary" for="show_password">
                          Show Password
                        </label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button class="btn bsb-btn-xl fw-bold text-light" style="background: #532200;" type="submit">Log in</button>
                      </div>
                      
                    @if (session('error'))
                      <p class="text-danger">{{ session('error') }}</p>
                    @endif
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="{{ url('js\main.js') }}"></script>
</body>
</html>
