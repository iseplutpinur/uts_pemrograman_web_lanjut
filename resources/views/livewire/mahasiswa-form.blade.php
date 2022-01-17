<div>
    <div class="flex mb-2">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <button wire:click="showModal()"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-4 rounded mb-2">
                <i class="fa-solid fa-plus"></i> Create Mahasiswa
            </button>
            <button wire:click="exportExcel()"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded mb-2">
                <i class="fa-regular fa-file-excel"></i> Export Excel
            </button>
            <a href="/mahasiswa/exportPDF" x
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded mb-2 inline-block">
                <i class="fa-regular fa-file-pdf"></i> Export PDF
            </a>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input wire:model="search" type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                placeholder="Search Mahasiswa...">
        </div>
    </div>

    @if($isOpen)
    @include('livewire.mahasiswa-modal')
    @endif

    @if(session()->has('info'))
    <script>
        Swal.fire({title: '{{ session('info') }}', icon: 'success'});
    </script>
    @endif

    <div class="flex flex-col">
        <div class="py-2">
            <div class="min-w-full border-b border-gray-200 shadow">
                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                No</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                NPM</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Nama</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Jurusan</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Alamat</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="block md:table-row-group">
                        @foreach($mahasiswas as $key => $mahasiswa)
                        <tr
                            class="bg-{{(($key+1) % 2) == 0 ? 'white':'gray-300' }} border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">No
                                </span>
                                {{ $key+1 }}
                            </td>

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">NPM
                                </span>
                                {{ $mahasiswa->npm }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Nama
                                </span>
                                {{ $mahasiswa->nama }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Jurusan
                                </span>
                                {{ isset($mahasiswa->jurusan->title) ? $mahasiswa->jurusan->title: '' }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Alamat
                                </span>
                                {{ $mahasiswa->alamat }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Actions
                                </span>
                                <button wire:click="edit({{ $mahasiswa->id }})"
                                    class="px-4 py-2 text-white bg-blue-600 rounded">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                                <button wire:click="$emit('triggerDelete',{{ $mahasiswa->id }})"
                                    class="px-4 py-2 text-white bg-red-600 rounded"><i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', postId => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Post record will be deleted!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                    @this.call('destroy',postId)
                    // success response
                    Swal.fire({title: 'Post Successfully Deleted', icon: 'success'});
                }
            });
        });
    })
</script>
@endpush
