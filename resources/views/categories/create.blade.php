<x-guestLayout>
    <form action="/categories/store" method="POST">
        @csrf
        Nome: <input type="text" name="name"><br>
        Slug: <input type="text" name="slug"><br>
        Image: <input type="text" name="image"><br>
        Descrição: <textarea name="description"></textarea>
        <x-button>Criar</x-button>
    </form>
</x-guestLayout>