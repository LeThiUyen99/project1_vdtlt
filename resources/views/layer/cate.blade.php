
<div>
    @foreach($categories as $category)
        <div>
            <p>{!! $category->categoryName !!}</p>
        </div>
    @endforeach
</div>
