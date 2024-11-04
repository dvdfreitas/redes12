<x-guestLayout>
    Index das categorias
    
    @foreach ($categories as $category)
        <div class="border p-2 rounded">{{ $category->name }}</div>
    @endforeach

    <a class="hover:underline text-blue-500" href="/categories/create">Criar nova categoria</a>
</x-guestLayout>