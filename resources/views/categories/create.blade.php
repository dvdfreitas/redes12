<x-guestLayout>
    <form action="/categories/store">
        Nome: <input type="text" name="name"><br>
        Slug: <input type="text" name="slug"><br>
        Descrição: <textarea name="description"></textarea>
        <x-button>Criar</x-button>
    </form>
</x-guestLayout>