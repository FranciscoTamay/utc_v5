<div>
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" wire:model="name">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" wire:model="email">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

</div>
