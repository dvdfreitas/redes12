<x-guestLayout>
    Stories

    <div class="grid grid-cols-3 gap-3 max-w-4xl m-auto">
        @foreach ($stories as $story)
            <div class="border p-2 font-bold">{{ $story->title }}</div>
            <div class="border p-2">{{ $story->description }}</div>
            <div class="flex">
                @foreach ($story->categories as $category)
                    <div class="p-1">{{ $category->name }}</div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-guestLayout>
