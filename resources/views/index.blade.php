
@php
 $category_list = App\Models\Category::all();
 $single_category = json_decode($category_list[0]->category_type);   
@endphp
@foreach ($single_category as $xx)

<p>
    <strong>
        {{$xx}}
    </strong>
</p>
@endforeach