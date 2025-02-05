<x-guestLayout>
    <div class="max-w-2xl m-auto">
        <h1>Criar corrida</h1>
        <form method="POST" action="{{ route('races.store') }}">
            @csrf

            <div class="mt-4">
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>                            
            </div>

            <div class="mt-4">
                <x-label for="date" value="{{ __('Data') }}" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autocomplete="username" />                                
            </div>

            <div class="mt-4">
                <x-label for="place" value="{{ __('Local') }}" />
                <x-input id="place" class="block mt-1 w-full" type="text" name="place" :value="old('place')" required autofocus autocomplete="name" />
                @error('place')
                    {{ $message }}
                @enderror                
            </div>

            <div class="mt-4">
                <x-label for="distance" value="{{ __('Distância') }}" />
                <x-input id="distance" class="block mt-1 w-full" type="number" name="distance" :value="old('distance')" required autofocus autocomplete="name" />                                
                @error('distance')
                    {{ $message }}
                @enderror                
            </div>

            <div class="mt-4">
                <x-label for="description" value="{{ __('Descrição') }}" />
                <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" name="description" :value="old('description')" autofocus autocomplete="name"></textarea>                                                
            </div>

            <div class="flex items-center justify-end mt-4">                
                <x-button class="ms-4">
                    {{ __('Criar') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guestLayout>