    <div class="min-h-full">
      <nav class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 justify-between">
            <div class="flex">
              <div class="flex flex-shrink-0 items-center">
                <img class="block h-8 w-auto lg:hidden" src="/img/ems.png" alt="EMS">
                <img class="hidden h-8 w-auto lg:block" src="/img/ems.png" alt="EMS">
              </div>
            </div>
          </div>
        </div>
      </nav>
      <div class="py-10">
        <main>
          <div class="bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8  w-full">
              
            <div class="w-full">
              <div class="border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                <form class="inline-flex w-full justify-between" wire:submit="searchLocation">
                  @csrf
                  <label for="location" class="block text-sm font-medium leading-1 text-gray-900 md:pt-1.5">Location</label>
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" wire:model.live="location" id="location" autocomplete="location" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-not-allowed" autofocus>
                  </div>
                </form>
                <form class="inline-flex w-full justify-between my-5 {{ $search_inspection_form ? '' : 'hidden' }}" wire:submit="searchInspection" id="inspection-form">
                  @csrf
                  <label for="inspection" class="block text-sm font-medium leading-1 text-gray-900 md:pt-1.5">Inspection</label>
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" wire:model.live="inspection" id="inspection" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-not-allowed">
                  </div>
                </form>
                @if($coil && $inspections)
                <div class="flex w-full justify-between">
                    <h1><strong>Details</strong></h1>
                  </div>
                  <div>
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">B/L #</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">{{ $inspections->{'BillLadNo.'} }}</p>
                      </div>
                    </div>
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">EMS Coil #</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">{{ $inspections->CoilName }}</p>
                      </div>
                    </div>
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">Description</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">This is a test text</p>
                      </div>
                    </div>
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">Frame Contract</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">This is a test text</p>
                      </div>
                    </div>
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">Width</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">{{ $coil->ocoiawidth }}</p>
                      </div>
                    </div>
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">Length</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">{{ $coil->ocoinlength }}</p>
                      </div>
                    </div>
                    <div class="flex w-full justify-between">  
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">Height</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">{{ $coil->ocoinweight }}</p>
                      </div>
                    </div>  
                    <div class="flex w-full justify-between">
                      <label for="about" class="block text-sm font-medium leading-1 text-gray-900 sm:pt-1.5">Status</label>
                      <div class="">
                        <p class="text-sm leading-1 text-gray-600">{{ $coil->ocoitcustoms }}</p>
                      </div>
                    </div>  
                  </div>
                  @endif
                  @if($error)
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                      <strong class="font-bold">Error!</strong>
                      <span class="block sm:inline">{{ $error }}</span>
                    </div>
                  @endif
              </div>
            </div>
        
            <div class="mt-6 flex items-center justify-start gap-x-6">
              <a href="/" type="button" class="text-sm font-semibold leading-1 text-gray-900">Menu</a>
              <a href="/" type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go Back</a>
              <a href="javascript:alert('Printing labels...');" type="submit" class="inline-flex justify-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Print Label</a>
            </div>
        
            </div>
          </div>
        </main>
      </div>
    </div>
    @script
    <script>

      $wire.on('change-focus-other-field', () => {
        setTimeout(function(){
          document.getElementById('inspection').focus();
        }, 1);
      });

      $wire.on('change-focus-location-field', () => {
        setTimeout(function(){
          document.getElementById('location').focus();
        }, 1);
      });

    </script>
    @endscript

