@extends('mobile.extra_master')
@section('page_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<header class="bar bar-nav ">
  <a class="btn btn-link btn-nav pull-left" href="#" >
    <span class="icon icon-left-nav"></span>
  </a>
  <a class="btn btn-link btn-nav pull-right toggle-panel" href="#panel-menu">
    <span class="icon icon-bars"></span>
  </a>
  <h1 class="title">{{$subcate->subcate_name}}</h1>
</header>
<!-- //End Bar Nav -->

<div class="content">
  <!-- //Begin Main Content -->
  <div class="container page-category">
    <div class="row">
      <aside class="col-xs-12 content-aside left_column sidebar-offcanvas">
        <span id="close-sidebar" class="btn btn-default"><i class="fa fa-times"></i></span>
        <div class="module ">
          <div class="modcontent ">
            <form class="type_2">

              <div class="table_layout filter-shopby">
                <div class="table_row">
                  <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
                  <div class="table_cell" style="z-index: 103;">
                    <legend>Search</legend>
                    <input class="form-control no-margin" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
                  </div>
                  <!--/ .table_cell -->
                  <!-- - - - - - - - - - - - - - End of category filter - - - - - - - - - - - - - - - - -->
                  <!-- - - - - - - - - - - - - - SUB CATEGORY - - - - - - - - - - - - - - - - -->
                  <div class="table_cell">
                    <fieldset>
                      <legend>Sub Category</legend>
                      <ul class="checkboxes_list">
                        <li>
                          <input type="checkbox" checked="" name="category" id="category_1">
                          <label for="category_1">Smartphone &amp; Tablets</label>
                        </li>
                        <li>
                          <input type="checkbox" name="category" id="category_2">
                          <label for="category_2">Electronics</label>
                        </li>
                        <li>
                          <input type="checkbox" name="category" id="category_3">
                          <label for="category_3">Shoes</label>
                        </li>
                        <li>
                          <input type="checkbox" name="category" id="category_4">
                          <label for="category_4">Watches</label>
                        </li>

                      </ul>

                    </fieldset>

                  </div>
                  <!--/ .table_cell -->
                  <!-- - - - - - - - - - - - - - End SUB CATEGORY - - - - - - - - - - - - - - - - -->
                  <!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
                  <div class="table_cell">
                    <fieldset>
                      <legend>Manufacturer</legend>
                      <ul class="checkboxes_list">
                        <li>
                          <input type="checkbox" checked="" name="manufacturer" id="manufacturer_1">
                          <label for="manufacturer_1">Manufacturer 1</label>
                        </li>
                        <li>
                          <input type="checkbox" name="manufacturer" id="manufacturer_2">
                          <label for="manufacturer_2">Manufacturer 2</label>
                        </li>
                        <li>
                          <input type="checkbox" name="manufacturer" id="manufacturer_3">
                          <label for="manufacturer_3">Manufacturer 3</label>
                        </li>

                      </ul>

                    </fieldset>

                  </div>
                  <!--/ .table_cell -->
                  <!-- - - - - - - - - - - - - - End manufacturer - - - - - - - - - - - - - - - - -->

                  <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                  <div class="table_cell">
                    <fieldset>
                      <legend>Price</legend>
                      <div class="range">
                        Range :
                        <span class="min_val">$10.00</span> -
                        <span class="max_val">$383.00</span>
                        <input type="hidden" name="" class="min_value" value="10.00">
                        <input type="hidden" name="" class="max_value" value="383.00">
                      </div>
                      <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 65.4397%;"></span>
                        <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 65.4397%;"></div>
                      </div>
                    </fieldset>
                  </div>
                  <!--/ .table_cell -->

                  <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

                  <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->

                  <div class="table_cell">

                    <fieldset>

                      <legend>Color</legend>

                      <div class="row">

                        <div class="col-sm-6">

                          <ul class="simple_vertical_list">

                            <li>

                              <input type="checkbox" name="" id="color_btn_1">
                              <label for="color_btn_1" class="color_btn green">Green</label>

                            </li>

                            <li>

                              <input type="checkbox" name="" id="color_btn_2">
                              <label for="color_btn_2" class="color_btn yellow">Yellow</label>

                            </li>

                            <li>
                              <input type="checkbox" name="" id="color_btn_3">
                              <label for="color_btn_3" class="color_btn red">Red</label>

                            </li>

                          </ul>

                        </div>

                        <div class="col-sm-6">

                          <ul class="simple_vertical_list">

                            <li>
                              <input type="checkbox" name="" id="color_btn_4">
                              <label for="color_btn_4" class="color_btn blue">Blue</label>
                            </li>

                            <li>
                              <input type="checkbox" name="" id="color_btn_5">
                              <label for="color_btn_5" class="color_btn grey">Grey</label>
                            </li>

                            <li>
                              <input type="checkbox" name="" id="color_btn_6">
                              <label for="color_btn_6" class="color_btn orange">Orange</label>
                            </li>

                          </ul>

                        </div>

                      </div>

                    </fieldset>

                  </div>
                  <!--/ .table_cell -->

                  <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

                </div>
                <!--/ .table_row -->
                <footer class="bottom_box">
                  <div class="buttons_row">
                    <button type="submit" class="button_grey button_submit">Search</button>
                    <button type="reset" class="button_grey filter_reset">Reset</button>
                  </div>
                        <!--Back To Top-->
                      <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
                  </footer>
              </div>
              <!--/ .table_layout -->



            </form>
          </div>
        </div>
      </aside>

      <div id="content" class="col-xs-12">
        <div class="sidebar-overlay"></div>

        <div class="products-category">


          <div id="collapseCategory" class="product-catalog__mode collapse" aria-expanded="false" style="height: 0px;">


          </div>


          <!--// Begin Select Category Simple -->
          <!-- Filters -->
          <div class="product-filter filters-panel clearfix">
            <div class="col-xs-4 view-mode ">

              <div class="list-view">
                <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
              </div>

            </div>


            <div class="col-xs-4 ">
              <a class="btn btn-primary open-sidebar" href="javascript:void(0)"><i class="fa fa-filter"></i> Refine </a>
            </div>

            <div class="short-by-show col-xs-4">

              <div class="form-group short-by">
                <i class="fa fa-sort-amount-asc"></i>
                <select id="input-sort" class="form-control" onchange="location = this.value;">
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=rating&amp;order=DESC">Rating (Highest)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=rating&amp;order=ASC">Rating (Lowest)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=p.model&amp;order=ASC">Model (A - Z)</option>
                  <option value="http://opencart.opencartworks.com/themes/so_revo/index.html?route=product/category&amp;path=20&amp;sort=p.model&amp;order=DESC">Model (Z - A)</option>
                </select>
              </div>

            </div>


          </div>
          <!-- //end Filters -->

          <!--Changed Listings-->
          <div class="products-list row nopadding-xs grid so-filter-gird">
            @php
              $subcategory_id=$subcate->id;
              $products=App\Product::where('is_deleted',0)->where('status',1)->where('subcate_id',$subcategory_id)->orderBy('id','DESC')->simplePaginate(6);
            @endphp
            @foreach($products as $product)
            @php
              $flashdealdetail=App\FlashDealDetail::where('product_id',$product->id)->where('status',1)->limit(1)->get();
            @endphp
            <div class="product-layout col-xs-6">
              <div class="product-item-container">
                <div class="left-block">
                  <div class="product-image-container ">
                    <a href="{{url('product/details/'.$product->slug.'/'.$product->id)}}" title="amper modi dolores">
                      <img src="{{asset('public/uploads/products/thumbnail/productdetails/'.$product->thumbnail_img)}}" title="amper modi dolores" class="img-responsive">
                    </a>
                  </div>

                </div>
                <div class="box-label">
                  <!--Sale Label-->
                  @if(count($flashdealdetail) > 0)
                   @foreach($flashdealdetail as $row)
                     @if($row->discount_type==1)
                     <span class="label-product label-sale">-{{$row->discount}}৳</span>
                     @elseif($row->discount_type==2)
                     <span class="label-product label-sale">-{{$row->discount}}%</span>
                     @endif
                   @endforeach
                 @endif
                </div>
                <div class="right-block">
                  <div class="caption">
                    <h4><a href="{{url('product/details/'.$product->slug.'/'.$product->id)}}">{{Str::limit($product->product_name,10)}}</a></h4>
                    <div class="ratings">
                      <div class="rating-box">
                        @php
                          $rount=App\ProductReview::where('product_id',$product->id)->count();
                        @endphp
                        @if($rount)
                          @php
                          $sumofreview =App\ProductReview::where('product_id',$product->id)->sum('review');
                          $rating=$sumofreview/$rount;
                          @endphp
                          @if($rating == 1)
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          @elseif($rating < 2)
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          @elseif($rating < 3)
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          @elseif($rating < 4)
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          @elseif($rating < 5)
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          @elseif($rating == 5)
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                          @elseif($rating == 0)
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                          @endif
                      @else
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                      @endif
                      </div>
                    </div>
                    <div class="description ">
                      <p>{!! Str::limit($product->product_description,50) !!}</p>
                    </div>
                    <div class="price">
                      @if(count($flashdealdetail) > 0)
                         @foreach($flashdealdetail as $row)
                             @if($row->discount_type==1)
                             <span class="price-new">৳ {{$product->product_price -$row->discount}}</span> <span class="price-old">৳ {{$product->product_price}}</span>
                             @elseif($row->discount_type==2)
                               @php
                                 $productdiscount = ($product->product_price * $row->discount) / 100;
                               @endphp
                               <span class="price-new">৳ {{$product->product_price -$productdiscount}}</span> <span class="price-old">৳ {{$product->product_price}}</span>
                             @endif
                         @endforeach
                       @else
                         <span class="price-new">৳ {{$product->product_price}}</span>
                       @endif
                    </div>
                    <div class="button-group">
                      <button class="addToCart font-sn" type="button" title="Add to Cart" onclick="cart.add('175', '1');"> <i class="fa fa-shopping-cart"></i><span><span>Add to Cart</span></span></button>
                      @if(Auth::guard('web')->check())
                      <a class="wishlist btn btn-button mywishlist" id="mywishlist" title="Add to Wish List" data-id="{{$product->id}}"><i class="fa fa-heart-o"></i></a>
                      @else
                      <a class="wishlist btn btn-button" href="{{url('/mobile/login')}}"  title="Add to Wish List"><i class="fa fa-heart-o"></i></a>
                      @endif
                      <a class="compare btn btn-button compareproduct" id="compareproduct" data-id="{{$product->id}}" ><i class="fa fa-retweet"></i></a>
                    </div>

                  </div>

                </div>
              </div>
            </div>
            @endforeach
            <div class="clearfix visible-xs-block"></div>
          </div>
          <!--// End Changed listings-->

          <!-- Filters -->
          <div class="product-filter text-center clearfix filters-panel">
            <div class="short-by-show text-center">
              {{$products->links()}}
              <div class="form-group" style="margin:0px">Showing <?= $products->currentPage() ?></div>
            </div>
          </div>
          <!-- //end Filters -->

          <!--End content-->

        </div>
      </div>
    </div>
  </div>
  <!-- //End Main Content -->
</div>

</div>
<!-- wishlist product -->
<script type="text/javascript">
		$(document).ready(function() {
				$('.mywishlist').on('click', function() {
						var id = $(this).data('id');
						//alert(id);
						if (id) {
								$.ajax({
										url: "{{ url('/product/mobile/add/wishlist/') }}/" + id,
										type: "GET",
										dataType: "json",
										processData: false,
										success: function(data) {
												console.log(data);
												if (data.check) {
														toastr.error("Already This Product Add wishlist");
												} else {
														toastr.success("Product Add To wishlist");
												}
										}
								});
						} else {
								alert('danger');
						}
				});

		});
</script>

<!-- compare -->
	<script>
			$(document).ready(function() {
					$('.compareproduct').on('click', function() {
							var id = $(this).data('id');
							//alert(id);
							$.ajax({
									type: 'GET',
									url: "{{ url('/product/mobile/compare') }}/" + id,
									processData: false,
									success: function(data) {
											if (data.checkip) {
													toastr.error("Already This Product Add Compare");

											} else {
													toastr.success("product add to compare");

											}
									}
							});
					});
			});
	</script>

@endsection
