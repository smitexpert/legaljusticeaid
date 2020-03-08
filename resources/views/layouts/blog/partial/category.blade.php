
<div class="ts-category">
    <h2 class="block-title">
        <span class="title-angle-shap"> Categories </span>
    </h2>
    <ul class="ts-category-list">
        @foreach (App\BlogCategory::all() as $category)
            <li>
                <a href="#">
                    <span> {{ $category->name }} </span>
                    <span class="bar"></span> 
                    <span class="category-count">{{ $category->posts->count() }}</span>
                </a>
            </li><!-- end list 1 -->
        @endforeach
    </ul>
</div>