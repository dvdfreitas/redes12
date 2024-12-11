<x-guestLayout>
    <form action="/categories/store" method="POST">
        @csrf
        Nome: <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        <br>
        Slug: <input type="text" name="slug" value="{{ old('slug') }}"><br>
        @error('slug')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        Image: <input type="file" name="image" value="{{ old('image') }}">
        @error('image')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        <br>
        Descrição: <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        <x-button>Criar</x-button>
    </form>
</x-guestLayout>