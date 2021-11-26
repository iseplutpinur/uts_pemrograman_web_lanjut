<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Employees') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <div class="container mx-auto">

            <div class="text-right">
              <a href="{{ route('employees.index') }}">
                <x-button class="mb-4">
                  {{ __('Back') }}
                </x-button>
              </a>
            </div>

            <div class="grid lg:grid-cols-2 gap-4">
              <!-- Emp ID -->
              <div>
                <x-label for="emp_id" :value="__('Employee ID')" />

                <x-input id="emp_id" class="block mt-1 w-full" type="text" name="emp_id" value="{{ $employee->emp_id }}"
                  readonly />
              </div>

              <!-- Name -->
              <div>
                <x-label for="emp_name" :value="__('Name')" />
                <x-input id="emp_name" class="block mt-1 w-full" type="text" name="emp_name"
                  value="{{ $employee->emp_name }}" readonly />
              </div>

              <!-- Position -->
              <div class="mt-4">
                <x-label for="position" :value="__('Position')" />
                <x-input id="position" class="block mt-1 w-full" type="text" name="position"
                  value="{{ $employee->position }}" readonly />
              </div>

              <!-- Email-->
              <div class="mt-4">
                <x-label for="emp_email" :value="__('Email')" />
                <x-input id="emp_email" class="block mt-1 w-full" type="email" name="emp_email"
                  value="{{ $employee->emp_email }}" readonly />
              </div>

              <!-- phone-->
              <div class="mt-4">
                <x-label for="emp_phone" :value="__('Phone Number')" />
                <x-input id="emp_phone" class="block mt-1 w-full" type="text" name="emp_phone"
                  value="{{ $employee->emp_phone }}" readonly />
              </div>

              <!-- address-->
              <div class="mt-4">
                <x-label for="emp_address" :value="__('Address')" />
                <x-input id="emp_address" class="block mt-1 w-full" type="text" name="emp_address"
                  value="{{ $employee->emp_address }}" readonly />
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>