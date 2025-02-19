<x-guestLayout>
<h1 class="text-4xl">Upload de imagens</h1>

<form method="POST" action="/images" enctype="multipart/form-data">
    @csrf
    <div class="space-y-4">
        <div>
            <x-label>Nome</x-label>
            <x-input type="text" name="name" id="name"/>
            @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <x-label>Imagem</x-label>
            <x-input type="file" name="image" id="image"/>
            @error('image')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <x-button>Upload</x-button>
        
    </div>
    
</form>

</x-guestLayout>