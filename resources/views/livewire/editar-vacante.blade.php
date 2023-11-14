
    {{-- Stop trying to control. --}}
    <form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>

        <x-input-label for="titulo" :value="__('Titulo de la Vacante')" />
        <x-text-input id="titulo"
            class="block mt-1 w-full"
            type="text"
            wire:model='titulo'
            :value="old('titulo')"
            placelhoder="Titulo de la Vacante"
            autocomplete="titulo" />

            @error('titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

        <x-input-label for="salario" :value="__('Salario Mensual')" />

            <select class="block mt-1 w-full bg-gray-900 text-white"  wire:model='salario' id='salario'>
                <option value="" > --Seleccione-- </option>
                @foreach ($salarios as $salario)
                   <option value="{{$salario->id}}"> {{$salario->salario}}</option>
                @endforeach

            </select>
            @error('salario')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-input-label for="categoria" :value="__('Categoria')" />

            <select class="block mt-1 w-full bg-gray-900 text-white" wire:model='categoria' id='categoria'>
                <option value="" > --Seleccione-- </option>
                @foreach ($categorias as $categoria)
                   <option value="{{$categoria->id}}"> {{$categoria->categoria}}</option>
                @endforeach

            </select>

            @error('categoria')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

        <x-input-label for="empresa" :value="__('Nombre de la Empresa')" />
        <x-text-input id="empresa"
            class="block mt-1 w-full"
            type="text" wire:model="empresa" :value="old('empresa')"
            placelhoder="Nombre de la empresa"
            autocomplete="empresa" />

            @error('empresa')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        <x-input-label for="dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="dia"
            class="block mt-1 w-full"
            type="date" wire:model="dia" :value="old('dia')"
            placelhoder="Ultimo dia para postularse"
            autocomplete="dia" />
            @error('dia')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

        <x-input-label for="descripcion" :value="__('Descripción de la Vacante')" />
       <textarea wire:model="descripcion" id="descripcion"
            class="block mt-1 w-full bg-gray-900 text-white"
            cols="30" rows="10"></textarea>
            @error('descripcion')
                 <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-text-input id="imagen"
            class="block mt-1 w-full"
            type="file" wire:model="imagenNueva"
            placelhoder="Imagen de la Vacante"
            accept='image/*'
           />

           <div class="my-5 w-80">
                <x-input-label :value="__('Imagen Actual')" />
                <img src="{{ asset('storage/vacantes/' . $imagen)}}" alt="{{'Imagen Vacante'  . $titulo }}" >
           </div>

           <div class="my-5 w-80">
            @if($imagenNueva)
                Imagen Nueva: <img src="{{ $imagenNueva->temporaryUrl() }}" alt="imagen Nueva">
            @endif
           </div>

           @error('imagenNueva')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
           <x-primary-button > Guardar Cambios </x-primary-button>
      </form>

