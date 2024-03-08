<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Operadores</div>
  </h1>

  <div wire:click="$dispatch('open-modal', { modal: 'create-operator' })" class="ui fluid primary button"><i class="plus icon"></i>Añadir operador</div>

  <div class="ui fitted basic segment">
    <div class="ui inverted dimmer" wire:loading.class="active">
      <div class="ui text loader">Cargando</div>
    </div>
    <table class="ui compact celled table">
      <thead class="full-width">
      <tr>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Dirección</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($operators as $operator)
        <tr wire:key="{{ $operator->id }}">
          <td>{{ $operator->name }}</td>
          <td>{{ $operator->phone_number }}</td>
          <td>{{ $operator->address->state . ', ' . $operator->address->country }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($operators->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-operator @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $operators->links('vendor.livewire.fomantic') }}
  </div>
</div>