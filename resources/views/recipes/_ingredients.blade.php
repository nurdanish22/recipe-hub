<ul class="list-disc list-inside mb-8">
    @foreach($ingredients as $ingredient)
        <li>{{ $ingredient->quantity }} {{ $ingredient->unit }} {{ $ingredient->name }}</li>
    @endforeach
</ul>
