<div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @guest
            @php
                route('login');
            @endphp
        @endguest

        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between items-center">
                <div class="leading-10">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text.xl font-bold"> {{$vacante->titulo}} </a>
                    <p class="text-sm text-gray font-bold"> {{$vacante->empresa}} </p>
                    <p class="text-sm text-gray-500 font-bold"> Último día para Postular: {{$vacante->dia}} </p>
                </div>

                <div class="flex flex-col items-stretch md:flex-row gap-3  mt-5 md:mt-0">
                    <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold"> Candidatos </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold cursor-pointer"> Editar </a>
                    <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})" class="bg-red-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold cursor-pointer"> Eliminar </button>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-stretch md:flex-row gap-3  mt-5 md:mt-0">
                <p class="p-3 text-center text-sm text-gray-600"> No hay Vacantes! </p>
            </div>
        @endforelse

        <div class="bg-white">
            {{ $vacantes->links() }}
        </div>
    </div>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('eliminarVacante',vacanteId);
                    console.log('eliminando...')
                    Swal.fire('Eliminado', 'La vacante ha sido eliminada.', 'success');
                } else {
                    console.log('no se hizo el business')
                }
            });
        });

    </script>
@endpush

