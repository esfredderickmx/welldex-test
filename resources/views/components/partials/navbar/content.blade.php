<div class="ui grid">
  <div class="ui mobile only row container">
    <div class="ui dropdown icon item">
      <i class="bars icon"></i>
      <div class="menu">
        <a @class(['item', 'active' => \Illuminate\Support\Facades\Route::currentRouteName() === 'index' || \Illuminate\Support\Facades\Route::currentRouteName() === 'home']) href="{{ route('home') }}"><i class="home icon"></i>Inicio</a>
        <div class="divider"></div>
        <a class="item" href="{{ route('index-customers') }}"><i class="hand holding usd icon"></i>Clientes</a>
        <a class="item" href="{{ route('index-providers') }}"><i class="city icon"></i>Proveedores</a>
        <a class="item" href="{{ route('index-operators') }}"><i class="user cog icon"></i>Operadores</a>
        <a class="item" href="{{ route('index-terminals') }}"><i class="warehouse icon"></i>Terminales</a>
        <a class="item" href="{{ route('index-lines') }}"><i class="kaaba icon"></i>Navieras</a>
      </div>
    </div>
  </div>
  <div class="tablet computer only row">
    <a @class(['item', 'active' => \Illuminate\Support\Facades\Route::currentRouteName() === 'index' || \Illuminate\Support\Facades\Route::currentRouteName() === 'home']) href="{{ route('home') }}">Inicio</a>
    <a class="item" href="{{ route('index-customers') }}">Clientes</a>
    <a class="item" href="{{ route('index-providers') }}">Provs.</a>
    <a class="item" href="{{ route('index-operators') }}">Opers.</a>
    <a class="item" href="{{ route('index-terminals') }}">Termins.</a>
    <a class="item" href="{{ route('index-lines') }}">Navs.</a>
  </div>
</div>
<div class="right menu">
  <div class="item">
    <a href="{{ route('index-imports') }}" class="ui inverted animated fade button" tabindex="0">
      <div class="visible content">¿Ya cuentas con todo?</div>
      <div class="hidden content">Realizar importación</div>
    </a>
  </div>
</div>