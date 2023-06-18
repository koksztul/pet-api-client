<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ Route::currentRouteNamed('pet.create') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('pet.create') }}">Add Pet </a>
        </li>
        <li class="nav-item {{ Route::currentRouteNamed('pet.edit') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('pet.edit') }}">Edit Pet</a>
        </li>
        <li class="nav-item {{ Route::currentRouteNamed('pet.show') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('pet.show') }}">Show Pet</a>
        </li>
      </ul>
    </div>
  </nav>