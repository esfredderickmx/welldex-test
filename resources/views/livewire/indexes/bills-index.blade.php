<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Bills of Landing</div>
  </h1>

  <div wire:click="$dispatch('open-modal', { modal: 'create-bill' })" class="ui fluid grey button"><i class="plus icon"></i>Añadir BL</div>

  <div class="ui fitted basic segment">
    <div class="ui inverted dimmer" wire:loading.class="active">
      <div class="ui text loader">Cargando</div>
    </div>
    <table class="ui compact celled table">
      <thead class="full-width">
      <tr>
        <th>Referencia</th>
        <th>Cliente</th>
        <th>Naviera</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($bills as $bill)
        <tr wire:key="{{ $bill->id }}">
          <td>{{ $bill->reference }}</td>
          <td>{{ $bill->customer->name }}</td>
          <td>{{ $bill->shippingLine->name }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @if($bills->isEmpty())
      <div class="ui placeholder segment">
        <div class="ui icon header">
          <i class="ghost icon"></i>Aún no hay elementos que mostrar.
        </div>
      </div>
    @endif
  </div>

  <livewire:store.create-bill @show-message="$refresh"/>

  <div class="ui fitted basic segment">
    {{ $bills->links('vendor.livewire.fomantic') }}
  </div>
</div>