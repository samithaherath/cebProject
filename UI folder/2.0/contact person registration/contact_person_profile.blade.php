@extends('dashboard.layouts.main')
@section('title')
  Profile - Manage Contact Persons CEB UNION
@endsection
@section('content')
            <div class="container-fluid">
                                     <div class="row">
<div class="col-md-12">
	
			<div class="card">
				<h4 align="center">Member Details -(member name)</h4>
				  <form method="get" action="" class="form-horizontal">
					
					<div class="card-content">
						  <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">First Name:</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="union_id"   class="form-control" value="" disabled>
                                    <span class="help-block">Please first name.</span>
                                </div>
                            </div>
                        </div>
                <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Last Name:</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="name"   value="" class="form-control" disabled>
                                    <span class="help-block">Please enter last name.</span>
                                </div>
                            </div>
                        </div>
         <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Address:</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="lname"   value=""  class="form-control" value disabled>
                                    <span class="help-block">Please enter address .</span>
                                </div> 
                            </div>
    <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Mobile Number:</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="username"  value=""  class="form-control" 
                                    <span class="help-block">Please enter mobile number</span>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Home Phone Number:</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="mobile" value="" class="form-control" disabled>
                                    <span class="help-block">Please enter Home Phone Number of the user.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Description:</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="mobile" value="" class="form-control" disabled>
                                    <span class="help-block">Please enter description.</span>
                                </div>
                            </div>
                        </div>
<div class="row">
    <label class="col-sm-2 label-on-left">Photo</label>
    <picture>
        <img src="" alt="" style="width:200px;height: 200px;" disabled>
      </picture>
</div>


<a href="" class="btn btn-info pull-right">Back</a>


</div>
</form>
				
			</div>
		</div>
	</div>
</div>


		  @endsection