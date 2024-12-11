<x-guestLayout>
    <form action="/categories/store" method="POST">
        @csrf
        Nome: <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="text-sm text-red-700">{{ $message }}</div>
        @enderror
        <br>
        Slug: <input type="text" name="slug" value="{{ old('slug') }}">
        @error('slug')
            <div class="text-sm text-red-700">{{ $message }}</div>
        @enderror
        <br>
        Image: <input type="file" name="image"><br>        
        Descrição: <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="text-sm text-red-700">{{ $message }}</div>
        @enderror
        <x-button>Criar</x-button>
    </form>
</x-guestLayout>