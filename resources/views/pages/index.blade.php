@extends('components.layouts.app')

@section('title', 'Inicio')

@section('content')
  <div class="ui container very padded horizontally fitted basic segment">
    <h1 class="ui header">
      <div class="content">Seleccione una opción</div>
    </h1>
    <div class="ui horizontally fitted basic segment">
      <div class="ui large three stackable doubling cards">
        <a class="card" href="{{ route('index-customers') }}">
          <div class="content">
            <i class="large right floated hand holding usd icon"></i>
            <div class="header">Clientes</div>
            <div class="meta">Principal</div>
            <div class="description">Gestión de clientes/importadores.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-providers') }}">
          <div class="content">
            <i class="large right floated city icon"></i>
            <div class="header">Proveedores</div>
            <div class="meta">Principal</div>
            <div class="description">Gestión de proveedores/exportadores de mercancía.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-operators') }}">
          <div class="content">
            <i class="large right floated user cog icon"></i>
            <div class="header">Operadores</div>
            <div class="meta">Principal</div>
            <div class="description">Gestión de operadores/notificadores.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-terminals') }}">
          <div class="content">
            <i class="large right floated warehouse icon"></i>
            <div class="header">Terminales</div>
            <div class="meta">Principal</div>
            <div class="description">Gestión de terminales marítimas/zonas de carga y descarga.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-lines') }}">
          <div class="content">
            <i class="large right floated kaaba icon"></i>
            <div class="header">Navieras</div>
            <div class="meta">Principal</div>
            <div class="description">Gestión de transporte de mercancías.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-shipments') }}">
          <div class="content">
            <i class="large secondary right floated box icon"></i>
            <div class="header">Mercancías</div>
            <div class="meta">Secundaria</div>
            <div class="description">Gestión de mercancías.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-ships') }}">
          <div class="content">
            <i class="large secondary right floated ship icon"></i>
            <div class="header">Buques</div>
            <div class="meta">Secundaria</div>
            <div class="description">Gestión de transportes.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-bills') }}">
          <div class="content">
            <i class="large grey right floated file invoice dollar icon"></i>
            <div class="header">BLs</div>
            <div class="meta">Terciaria</div>
            <div class="description">Gestión de bills of landing.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-bookings') }}">
          <div class="content">
            <i class="large grey right floated book icon"></i>
            <div class="header">Bookings</div>
            <div class="meta">Terciaria</div>
            <div class="description">Gestión de bookings.</div>
          </div>
        </a>
        <a class="card" href="{{ route('index-imports') }}">
          <div class="content">
            <i class="large teal right floated receipt icon"></i>
            <div class="header">Importaciones</div>
            <div class="meta">Operacional</div>
            <div class="description">Gestión de operaciones comerciales.</div>
          </div>
        </a>
      </div>
    </div>
  </div>
@endsection