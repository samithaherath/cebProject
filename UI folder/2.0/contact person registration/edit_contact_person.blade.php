 @extends('dashboard.layouts.main')
@section('title')
  Home-Edit Contact Person CEB UNION
@endsection
@section('content')
            <div class="container-fluid">
                                     <div class="row">
<div class="col-md-12">
			<div class="card">
				<h4 align="center" style="font-weight:500;font-size:20px;">Edit Contact Person Details</h4>
				<form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="card-content">

						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">First Name:</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="union_id"   class="form-control" value="">
									<span class="help-block">Please first name.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Last Name:</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="name"   value="" class="form-control" >
									<span class="help-block">Please enter last name.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Address:</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="lname"   value=""  class="form-control" value>
									<span class="help-block">Please enter address .</span>
								</div> 
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Mobile Number:</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="username"  value=""  class="form-control" value>
									<span class="help-block">Please enter mobile number</span>
								</div> 
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Home Phone Number:</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="mobile" value="" class="form-control" value>
									<span class="help-block">Please enter Home Phone Number of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Description:</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="mobile" value="" class="form-control" value>
									<span class="help-block">Please enter description.</span>
								</div>
                            </div>
						</div>
		
                       <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Photo</label>
                            <label class="btn btn-file ">

                                Browse <input type="file" name="profile_img"  value="" >

                            </label>
                        </div>
                        <a href="" class="btn btn-danger pull-right" >Cancel</a>
                        <input class="btn btn-success pull-right" type="submit" value="Update">
                        
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>

		  @endsection