<ol class="list-decimal list-inside">
    @foreach($steps->sortBy('step_number') as $step)
        <li class="mb-4">
            <span class="font-bold">Step {{ $step->step_number }}:</span> {{ $step->instruction }}
            @if($step->image_url)
                <div><img src="{{ $step->image_url }}" alt="Step {{ $step->step_number }} image" class="rounded mt-2 w-64"></div>
            @endif
        </li>
    @endforeach
</ol>
