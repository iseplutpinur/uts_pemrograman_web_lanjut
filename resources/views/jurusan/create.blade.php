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

            <form action="{{ route('jurusans.store') }}" method="POST">
              @csrf

              <div class="grid lg:grid-cols-2 gap-4">
                <!-- Emp ID -->
                <div>
                  <x-label for="emp_id" :value="__('Employee ID')" />

                  <x-input id="emp_id" class="block mt-1 w-full" type="text" name="emp_id" :value="old('emp_id')"
                    required autofocus />
                </div>

                <!-- Name -->
                <div>
                  <x-label for="emp_name" :value="__('Name')" />
                  <x-input id="emp_name" class="block mt-1 w-full" type="text" name="emp_name" :value="old('emp_name')"
                    required />
                </div>

                <!-- Position -->
                <div class="mt-4">
                  <x-label for="position" :value="__('Position')" />
                  <x-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')"
                    required />
                </div>

                <!-- Email-->
                <div class="mt-4">
                  <x-label for="emp_email" :value="__('Email')" />
                  <x-input id="emp_email" class="block mt-1 w-full" type="email" name="emp_email"
                    :value="old('emp_email')" required />
                </div>

                <!-- phone-->
                <div class="mt-4">
                  <x-label for="emp_phone" :value="__('Phone Number')" />
                  <x-input id="emp_phone" class="block mt-1 w-full" type="text" name="emp_phone"
                    :value="old('emp_phone')" required />
                </div>

                <!-- address-->
                <div class="mt-4">
                  <x-label for="emp_address" :value="__('Address')" />
                  <x-input id="emp_address" class="block mt-1 w-full" type="text" name="emp_address"
                    :value="old('emp_address')" required />
                </div>

              </div>
              <div class="text-right">
                <x-button class="mt-4 ">
                  {{ __('Save') }}
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>