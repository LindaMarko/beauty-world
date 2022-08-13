@php
$productsWithTags = App\Models\Product::whereNotNull('product_tags_en')->get();
$tags_en = array();
foreach ($productsWithTags as $product) {
  $product_tags = explode(',', $product->product_tags_en);

  for($i = 0; $i < count($product_tags); ++$i) {
    if(!in_array($product_tags[$i], $tags_en)) {
        array_push($tags_en, $product_tags[$i]);
    }
  }
}
// $tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
// $tags_sv = App\Models\Product::groupBy('product_tags_sv')->select('product_tags_sv')->get();

@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
  <h3 class="section-title">Product tags</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list">
    @if(session()->get('language') == 'swedish')
      @foreach($tags_sv as $tag)
        @if($tag)
        <a class="item active" title="{{$tag}}" href="{{ url('product/tag/'.$tag) }}">
          {{-- {{ str_replace(',',' ',$tag->product_tags_en)  }} --}}
          {{ ucfirst($tag) }}
        </a>
        @endif
      @endforeach
    @else
      @foreach($tags_en as $tag)
        @if($tag)
          <a class="item active" title="{{$tag}}" href="{{ url('product/tag/'.$tag) }}">
            {{-- {{ str_replace(',',' ',$tag->product_tags_en)  }} --}}
            {{ ucfirst($tag) }}
          </a>
        @endif
      @endforeach
    @endif

    </div>
    <!-- /.tag-list -->
  </div>
  <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->