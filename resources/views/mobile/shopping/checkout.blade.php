@extends('mobile.extra_master')
@section('page_content')

<!-- Begin Bar Nav -->
<header class="bar bar-nav ">
	<a class="btn btn-link btn-nav pull-left" href="{{ URL::previous() }}">
		<span class="icon icon-left-nav"></span>
	</a>
	<a class="btn btn-link btn-nav pull-right toggle-panel" href="#panel-menu">
		<span class="icon icon-bars"></span>
	</a>
	<h1 class="title">CHECKOUT</h1>
</header>
<!-- //End Bar Nav -->
<div class="content">

	<!-- //Begin Main Content -->
	<div class="container page-sitemap">
		<div class="row">
			<div class="so-onepagecheckout " style="padding: 30px 15px">
				<div class="col-left">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
						</div>
						<div class="panel-body">
							<fieldset id="account">
								<div class="form-group required">
									<label for="input-payment-firstname" class="control-label">Name</label>
									<input type="text" class="form-control" id="input-payment-firstname" value="{{Auth::user()->username}}" name="firstname" disabled>
								</div>

								<div class="form-group required">
									<label for="input-payment-email" class="control-label">E-Mail</label>
									<input type="text" class="form-control" id="input-payment-email" value="{{Auth::user()->email}}" name="email" disabled>
								</div>
								<div class="form-group required">
									<label for="input-payment-telephone" class="control-label">Phone</label>
									<input type="text" class="form-control" id="input-payment-telephone" value="{{Auth::user()->phone}}" name="telephone" disabled>
								</div>

							</fieldset>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
						</div>
						<div class="panel-body">
							<fieldset id="address" class="required">


								<div class="form-group required">
									<label for="input-payment-address-1" class="control-label">Address</label>
									<input type="hidden" name="user_id" value="{{Auth::user()->id}}" placeholder="Address" id="input-payment-address-1" class="form-control">
									<input type="text" name="user_address" value="@if(isset($useraddress->user_address)){{$useraddress->user_address}}@endif" placeholder="Address*" id="input-payment-address-1" class="form-control">
									@error('user_address')
									<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror
								</div>



								<div class="form-group required">
									<label for="input-payment-city" class="control-label">Post Office</label>
									<input type="text" name="user_post_office" value="@if(isset($useraddress->user_post_office)){{$useraddress->user_post_office}}@endif" placeholder="Post office *" id="input-payment-city" class="form-control">
									@error('user_post_office')
									<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror
								</div>


								<div class="form-group required">
									<label for="input-payment-postcode" class="control-label">Post Code</label>
									<input type="text" name="user_postcode" value="@if(isset($useraddress->user_postcode)){{$useraddress->user_postcode}}@endif" placeholder="Post Code *" id="input-payment-postcode" class="form-control">
									@error('user_postcode')
										<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror
								</div>



								<div class="form-group required">
									<label for="input-payment-zone" class="control-label"> Country </label>
									<select name="user_country_id" id="user_country" class="form-control">
										<option value="" disabled selected> --- Please Select Your Country --- </option>
										@foreach(DB::table('countries')->get() as $country)
										<option value="{{$country->id}}" @if(isset($useraddress->user_country_id) == $country->id) selected @endif>{{$country->name}}</option>
										@endforeach
									</select>
									@error('user_country_id')
									<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror
								</div>



								<div class="form-group required">
									<label for="input-payment-zone" class="control-label"> Division </label>
									<select name="user_division_id" id="user_division" class="form-control">
										<option disabled selected> --- Please Select Your Division --- </option>
										@foreach(DB::table('divisions')->get() as $division)
										@if(isset($useraddress->user_division_id))
										<option value="{{$division->id}}" @if($useraddress->user_division_id == $division->id) selected @endif>{{$division->name}} </option>
										@else
										<option value="{{$division->id}}">{{$division->name}} </option>
										@endif
										@endforeach

									</select>
									@error('user_division_id')
									<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror
								</div>


								<div class="form-group required">
									<label for="input-payment-zone" class="control-label"> District </label>
									<select name="user_district_id" id="user_district" class="form-control">
										<option disabled selected> --- Please Select Your District --- </option>
										@php
										$dis=DB::table('districts')->get();

										@endphp
										@foreach($dis as $district)
										@if(isset($useraddress->user_district_id))
										<option value="{{$district->id}}" @if($useraddress->user_district_id == $district->id) selected @endif>{{$district->name}} </option>
										@else
										<option value="{{$district->id}}">{{$district->name}} </option>
										@endif

										@endforeach

									</select>
									@error('user_district_id')
									<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group required">
									<label for="input-payment-zone" class="control-label"> Upazila/Thana </label>
									<select name="user_upazila_id" id="user_upazila" class="form-control">
										@php
										$upa=DB::table('upazilas')->get();
										@endphp
										@foreach($upa as $upazila)
										@if($useraddress)
										<option value="{{$upazila->id}}" @if($useraddress->user_upazila_id == $upazila->id) selected @endif>{{$upazila->name}} </option>
										@else
										<option value="{{$upazila->id}}">{{$upazila->name}} </option>
										@endif
										@endforeach
									</select>
									@error('user_upazila_id')
									<div class="text-danger alert alert-danger">{{ $message }}</div>
									@enderror

								</div>


								<div class="clearfix"></div>
								<span>
									<input type="checkbox" id="is_shipping" checked="checked" value="1" name="shipping_address"> My delivery and billing addresses are the same.
								</span>
							</fieldset>





							<fieldset id="shipping-address" style="display: none">

								<div class="panel-heading">
									<hr>
									<h4 class="panel-title"><i class="fa fa-book"></i> Shipping Address</h4>
								</div>
								<div class="panel-body">
									<fieldset id="address" class="required">
										<div class="form-group">
											<label for="input-payment-company" class="control-label">Company</label>
											<input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="" name="company">
										</div>
										<div class="form-group required">
											<label for="input-payment-address-1" class="control-label">Address 1</label>
											<input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="" name="address_1">
										</div>
										<div class="form-group">
											<label for="input-payment-address-2" class="control-label">Address 2</label>
											<input type="text" class="form-control" id="input-payment-address-2" placeholder="Address 2" value="" name="address_2">
										</div>
										<div class="form-group required">
											<label for="input-payment-city" class="control-label">City</label>
											<input type="text" class="form-control" id="input-payment-city" placeholder="City" value="" name="city">
										</div>
										<div class="form-group required">
											<label for="input-payment-postcode" class="control-label">Post Code</label>
											<input type="text" class="form-control" id="input-payment-postcode" placeholder="Post Code" value="" name="postcode">
										</div>



										<div class="form-group required">
											<label for="input-payment-zone" class="control-label"> Country </label>
											<select name="user_country_id" id="user_country" class="form-control">
												<option value="" disabled selected> --- Please Select Your Country --- </option>
												@foreach(DB::table('countries')->get() as $country)
												<option value="{{$country->id}}" @if(isset($useraddress->user_country_id) == $country->id) selected @endif>{{$country->name}}</option>
												@endforeach
											</select>
											@error('user_country_id')
											<div class="text-danger alert alert-danger">{{ $message }}</div>
											@enderror
										</div>



										<div class="form-group required">
											<label for="input-payment-zone" class="control-label"> Division </label>
											<select name="user_division_id" id="user_division" class="form-control">
												<option disabled selected> --- Please Select Your Division --- </option>
												@foreach(DB::table('divisions')->get() as $division)
												@if(isset($useraddress->user_division_id))
												<option value="{{$division->id}}" @if($useraddress->user_division_id == $division->id) selected @endif>{{$division->name}} </option>
												@else
												<option value="{{$division->id}}">{{$division->name}} </option>
												@endif
												@endforeach

											</select>
											@error('user_division_id')
											<div class="text-danger alert alert-danger">{{ $message }}</div>
											@enderror
										</div>


										<div class="form-group required">
											<label for="input-payment-zone" class="control-label"> District </label>
											<select name="user_district_id" id="user_district" class="form-control">
												<option disabled selected> --- Please Select Your District --- </option>
												@php
												$dis=DB::table('districts')->get();

												@endphp
												@foreach($dis as $district)
												@if(isset($useraddress->user_district_id))
												<option value="{{$district->id}}" @if($useraddress->user_district_id == $district->id) selected @endif>{{$district->name}} </option>
												@else
												<option value="{{$district->id}}">{{$district->name}} </option>
												@endif

												@endforeach

											</select>
											@error('user_district_id')
											<div class="text-danger alert alert-danger">{{ $message }}</div>
											@enderror
										</div>

										<div class="form-group required">
											<label for="input-payment-zone" class="control-label"> Upazila/Thana </label>
											<select name="user_upazila_id" id="user_upazila" class="form-control">
												@php
												$upa=DB::table('upazilas')->get();
												@endphp
												@foreach($upa as $upazila)
												@if($useraddress)
												<option value="{{$upazila->id}}" @if($useraddress->user_upazila_id == $upazila->id) selected @endif>{{$upazila->name}} </option>
												@else
												<option value="{{$upazila->id}}">{{$upazila->name}} </option>
												@endif
												@endforeach
											</select>
											@error('user_upazila_id')
											<div class="text-danger alert alert-danger">{{ $message }}</div>
											@enderror

										</div>


										<div class="clearfix"></div>
									</fieldset>
								</div>
						</div>
					</div>
					<div class="col-right ">
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default no-padding">
									<div class="checkout-shipping-methods">
										<div class="panel-heading">
											<h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
										</div>
										<div class="panel-body ">
											<p>Please select the preferred shipping method to use on this order.</p>
											<div class="radio">
												<label>
													<input type="radio" checked="checked" name="Free Shipping"> Free Shipping - $0.00</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="Flat Shipping Rate"> Flat Shipping Rate - $7.50</label>
											</div>

										</div>
									</div>
									<div class="checkout-payment-methods">
										<div class="panel-heading">
											<h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
										</div>
										<div class="panel-body">
											<p>Please select the preferred payment method to use on this order.</p>
											<div class="radio">
												<label>
													<input type="radio" checked="checked" name="Cash On Delivery">Cash On Delivery</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="Paypal">Paypal</label>
											</div>
										</div>
									</div>
								</div>



							</div>



							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon or Voucher?</h4>
									</div>
									<div class="panel-body ">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
												<span class="input-group-btn">
													<input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
												</span>
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">
												<span class="input-group-btn">
													<input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
												</span> </div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<td class="text-center">Image</td>
														<td class="text-left">Product Name</td>
														<td class="text-left">Quantity</td>
														<td class="text-right">Unit Price</td>
														<td class="text-right">Total</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center">
															<a href="product.html"><img width="100px" src="../image/demo-mobile/product/e12.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail">
															</a>
														</td>
														<td class="text-left"><a href="product.html">Emasa rumas gacem</a>
														</td>
														<td class="text-left">
															<div class="input-group btn-block">
																<input type="text" name="quantity" value="1" size="1" class="form-control">
																<span class="input-group-btn">
																	<button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Update"><i class="fa fa-refresh"></i></button>
																	<button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
																</span>
															</div>
														</td>
														<td class="text-right">$114.35</td>
														<td class="text-right">$114.35</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td class="text-right" colspan="4"><strong>Sub-Total:</strong>
														</td>
														<td class="text-right">$93.73</td>
													</tr>
													<tr>
														<td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong>
														</td>
														<td class="text-right">$4.69.00</td>
													</tr>
													<tr>
														<td class="text-right" colspan="4"><strong>Eco Tax (-2.00):</strong>
														</td>
														<td class="text-right">$3.75.00</td>
													</tr>
													<tr>
														<td class="text-right" colspan="4"><strong>VAT (20%):</strong>
														</td>
														<td class="text-right">$19.68</td>
													</tr>
													<tr>
														<td class="text-right" colspan="4"><strong>Total:</strong>
														</td>
														<td class="text-right">$121.85</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
									</div>
									<div class="panel-body">
										<textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
										<br>
										<label class="control-label" for="confirm_agree">
											<input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
											<span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
										<div class="buttons">
											<div class="pull-right">
												<input type="button" class="btn btn-primary" id="button-confirm" value="Confirm Order">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<script>
			$(document).ready(function() {
				$("#is_shipping").click(function() {

					if (this.checked) {
						$('#shipping-address').css('display', 'none');
					}
					if (!this.checked) {
						$('#shipping-address').css('display', 'block');
					}

				});
			});
		</script>

<script>
        $(document).ready(function () {
            $('#user_country').click(function (params) {
                var country_id = $(this).val();
                

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/user/division/name') }}/" + country_id,
                    dataType: "json",
                    success: function (data) {
						
                        $('#user_division').empty();
                        $('#user_division').append(' <option value="0">--Please Select Your Division--</option>');
                        $.each(data, function (index, divisionobj) {
                            $('#user_division').append('<option value="' + divisionobj.id + '">' + divisionobj.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#user_division').click(function (params) {

				var division_id = $(this).val();
				
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/user/district/name') }}/" + division_id,
                    dataType: "json",

                    success: function (data) {
                        console.log(data);
                        $('#user_district').empty();
                        $('#user_district').append(' <option value="0">--Please Select Your Division--</option>');
                        $.each(data, function (index, districtbj) {
                            $('#user_district').append('<option value="' + districtbj.id + '">' + districtbj.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#user_district').click(function () {

				var upazila_id = $(this).val();
				alert(upazila_id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/user/upazila/name') }}/" + upazila_id,
                    dataType: "json",

                    success: function (data) {

                        console.log(data);
                        $('#user_upazila').empty();
                        $('#user_upazila').append(' <option value="0">--Please Select Your Division--</option>');
                        $.each(data, function (index, upazilabj) {
                            $('#user_upazila').append('<option value="' + upazilabj.id + '">' + upazilabj.name + '</option>');
                        });
                    }
                });
            });
        });

    });
</script>

