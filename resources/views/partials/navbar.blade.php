
<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="/"><h2><i class="bi bi-bag-dash-fill"></i> BSA </h2></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>

        @if (auth()->user() == null)
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            </ul>
        @else
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/cart" class="nav-link"><i class="bi bi-cart"></i> Cart</a>
            </li>
            <li class="nav-item">
                <span class="nav-link">|</span>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hello, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/account/{{ auth()->user()->username }}">Account</a></li>
                <li><a class="dropdown-item" href="#">My Store</a></li>
                <li><a class="dropdown-item">
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" name="submit" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form></a>
                </li>
              </ul>
            </li>           
        </ul>
        @endif
        
      </div>
    </div>
  </nav>
  <nav class="navbar bg-body-tertiary">
      <div class="container-fluid d-flex justify-content-around">
        <span>Fear the known!</span>
        <span>Fear the known!</span>
        <span>Fear the known!</span>
      </div>
  </nav>
