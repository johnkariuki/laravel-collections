@foreach($list->chunk(3) as $names)
    <div class="row">
        @foreach($names as $name)
            {{ $name }}
        @endforeach
    </div>
@endforeach