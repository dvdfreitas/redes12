<x-guestLayout>
    Stories

    <div class="grid grid-cols-3 gap-3 max-w-4xl m-auto">
        @foreach ($stories as $story)
            <div class="border">
                <div class="p-2 font-bold bg-fuchsia-200">{{ $story->title }}</div>
                <div class="p-2">{{ $story->description }}</div>            
                <div class="flex">
                    @foreach ($story->categories as $category) 
                        <div class="border p-1 bg-fuchsia-100 rounded">{{ $category->name }}</div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-guestLayout>
