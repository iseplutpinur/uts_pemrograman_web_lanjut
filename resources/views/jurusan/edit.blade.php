<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Jurusan') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="container mx-auto">

            @if ($errors->any())

            <div class="mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="text-right">
              <a href="{{ route('jurusans.index') }}">
                <x-button class="mb-4">
                  {{ __('Back') }}
                </x-button>
              </a>
            </div>
            <form action="{{ route('jurusans.update',$jurusan->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mt-4">
                <x-label for="title" :value="__('Nama')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $jurusan->title }}"
                  required />
              </div>

              <div class="mt-4">
                <x-label for="description" :value="__('Deskripsi')" />
                <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                  value="{{ $jurusan->description }}" required />
              </div>
              <div class="text-right">
                <x-button class="mt-4 ">
                  {{ __('Update') }}
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>