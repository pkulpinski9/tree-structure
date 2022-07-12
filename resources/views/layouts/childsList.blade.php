
    @foreach($childs as $child)
        <li>
            @if(count($child->childs))

               <a class="caret ">{{ $child->name }}</a>
            <ul class="nested">
                <li>
                @include('layouts.childsList',['childs' => $child->childs])
                </li>
            </ul>
            @else
                <a class="notnested">{{ $child->name }}</a>
            @endif
        </li>

    @endforeach

