<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <a class="navbar-brand" href="#">CRM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @auth
                <a class="nav-item nav-link" href="/customers">Customer</a>
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav-item nav-link">Logout</button>
                </form>
            @endauth
            @guest
                <a class="nav-item nav-link" href="/login">Login</a>
            @endguest
        </div>
    </div>
</nav>
