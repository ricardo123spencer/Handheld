
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-20 w-auto" src="/img/ems.png" alt="EMS">
        <!-- <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2> -->
    </div>
@if(session('error'))
    <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

@if($errors->any())
    <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul class="list-disc">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6 mt-0" wire:submit="login">
        @csrf
        <div>
            <label for="barcode" class="block text-sm font-medium leading-6 text-gray-900">User barcode</label>
            <div class="mt-2">
                <input id="barcode" wire:model.live="barcode" type="barcode" autocomplete="barcode" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-not-allowed" autofocus>
            </div>
        </div>
        @error('barcode')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </form>
</div>
</div>

