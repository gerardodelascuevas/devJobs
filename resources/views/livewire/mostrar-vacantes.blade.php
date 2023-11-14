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
                        <a href="#" class="text.xl font-bold"> {{$vacante->titulo}} </a>
                        <p class="text-sm text-gray font-bold"> {{$vacante->empresa}} </p>
                        <p class="text-sm text-gray-500 font-bold"> Último dia para Postular: {{$vacante->dia}} </p>
                    </div>

                    <div class="flex flex-col items-stretch md:flex-row gap-3  mt-5 md:mt-0">
                        <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold"> Candidatos </a>


                        <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold"> Editar </a>


                        <button wire:click="$dispatch='mostrarAlerta', ({{ $vacante->id }})" class="bg-red-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold"> Eliminar </button>
                        {{-- <button wire:click="mostrarAlerta({{$vacante->id}})"
                            class="bg-red-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold"> Eliminar </button> --}}

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
// El siguiente código es el Alert utilizado
Livewire.on('postAdded', ()=> {
    //     Swal.fire({
    //     title: 'Eliminar Vacante?',
    //     text: "Una Vacante eliminada no se puede recuperar",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     cancelButtonText: "cancelar",
    //     confirmButtonText: 'Si, Eliminar!'
    //     //cancelButtonText: 'Cancelar'
    //     }).then((result) => {
    //     if (result.isConfirmed) {
    //         Swal.fire(
    //         'Eliminado!',
    //         'Tu vacante ha sido eliminada.',
    //         'success'
    //         )
    //     }
    //     })
    alert('hola ke ase')
    })
</script>
@endpush
