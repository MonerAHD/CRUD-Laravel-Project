<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <title>@yield("title")</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
          <a class="navbar-brand text-light fs-3 fw-bold" href="#">Laravel Project</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          {{-- <div class="nav-link" style="">

              <ul style=" list-style-type:none; display: flex; align-items: center; gap:10px; margin:0;">

                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light" style="">Logout</button>
                  </form>
                </li>

                <li>
                  <a href="" class="text-light" style="text-decoration: none"><button class="btn btn-outline-light">Content Us</button></a>
                </li>

              </ul>
        
          </div> --}}
              
          <ul class="mt-3" style="list-style: none; margin-right:6rem">

            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">

                <li>
                  <a class="dropdown-item" href="{{ route('user.profile') }}">profile</a>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="dropdown-item" style="">Logout</button>
                  </form>
                </li>

              </ul>

            </li>  

          </ul> 

        </div>

    </nav>

    <div class="mt-4">
        @yield('content')
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>