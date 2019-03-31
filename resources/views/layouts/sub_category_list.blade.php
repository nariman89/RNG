<ul>
    @foreach($childs as $parent)
        <li>
            {{ $parent->name }}

            {{-- `isNotEmpty` collection method was added in Laravel 5.3 --}}
            @if($parent->childs->isNotEmpty())
                @include('sub_category_list', [
                    'childs' => $parent->childs
                ])
            @endif
        </li>
    @endforeach
</ul>
