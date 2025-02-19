<x-guestLayout>
    <div class="w-max-5xl m-auto px-8">
        <p class="text-4xl font-bold">Upload de Imagens</p>
        <form method="POST" action="/image_upload/store" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label>Nome: </x-label>
                <x-input type="text" name="name" id="name"/>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="file" name="image" id="image"/>
                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <x-button>Inserir</x-button>
            </div>
        </form>
    </div>
</x-guestLayout>