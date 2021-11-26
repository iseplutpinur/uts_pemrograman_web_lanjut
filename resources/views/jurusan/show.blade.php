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
            <div class="text-right">
              <a href="{{ route('jurusans.index') }}">
                <x-button class="mb-4">
                  {{ __('Back') }}
                </x-button>
              </a>
            </div>

            <div class="mt-4">
              <x-label for="title" :value="__('Nama')" />
              <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $jurusan->title }}"
                readonly />
            </div>
            <div class="mt-4">
              <x-label for="description" :value="__('Deskripsi')" />
              <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                value="{{ $jurusan->description }}" readonly />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>