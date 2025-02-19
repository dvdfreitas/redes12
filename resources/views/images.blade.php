<x-guestLayout>
    <div class="grid grid-cols-4">
        @foreach ($images as $image)
            <img class="h-48" src="/images/{{$image->path}}">
        @endforeach
    </div>
</x-guestLayout>