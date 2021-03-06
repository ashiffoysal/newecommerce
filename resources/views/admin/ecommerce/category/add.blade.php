@extends('layouts.adminapp')
@section('admin_content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- content wrpper -->
			<div class="content_wrapper">
				<!--middle content wrapper-->
				<div class="middle_content_wrapper">

				<section class="page_area">
					<div class="panel">
						<div class="panel_header">
							<div class="row">
								<div class="col-md-6">
									<div class="panel_title"><span class="panel_icon"><i class="fas fa-plus-square"></i></span><span>Add Category</span></div>
								</div>
								<div class="col-md-6 text-right">

									<button type="button"  style="margin: 5px;" class="btn btn-success" ><i class="fas fa-award"></i> <a href="{{route('admin.category.all')}}" style="color: #fff;">All Category</a></button>
								</div>
							</div>
						</div>
						<div class="panel_body">
						<form class="form-horizontal" action="{{route('admin.category.insert')}}" method="POST" enctype="multipart/form-data" >
						          	@csrf
									 <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category Name:</label>
									    <div class="col-sm-6">
									      <input type="text" class="form-control" name="cate_name" required>
									    </div>
									  </div>
									  <div class="form-group row">
					                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Category Slug</label>
					                <div class="col-sm-6">
					                   <input class="form-control" type="text" name="cate_slug">
					                   <p style="font-size: 11px">(If you leave it blank, it will be generated automatically)</p>
					                </div>
						         </div>
									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image:</label>
									    <div class="col-sm-6">
									      <input type="file" name="pic" required>
									  		 <p>(270px*270px)</p>
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Icon:</label>

									    <div class="col-sm-6">
									      <input type="text" name="icon" class="form-control" placeholder="<i class='icon-star'></i>" >
									     <!--  <p>(20px*20px)</p> -->
									    </div>
									  </div>


									  <div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Tag:</label>
									    <div class="col-sm-6">
									      <input type="text" name="tag" class="form-control">
									    </div>
									  </div>
								    <div class="form-group text-center">

								    	<button type="submit" class="btn btn-blue">Add Category</button>
								    </div>

							</form>

						</div>
					</div>
				</section>
			</div><!--/middle content wrapper-->
			</div><!--/ content wrapper -->



@endsection
