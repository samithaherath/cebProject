 @extends('dashboard.layouts.main')
@section('title')
  Home-Manage Members CEB UNION
@endsection
@section('content')
            <div class="container-fluid" style="padding-bottom:0px;">
                                     <div class="row">
<div class="col-md-12">
			<div class="card">
				<h4 align="center" style="font-weight:500;font-size:20px;">Application of New Member Registration </h4>
				@if($message = Session::get('danger'))
				  <div class="alert alert-danger">
				  	<strong>{{$message}}</strong>
				  </div>


				@endif
				<form id="myfrm" method="post" action="{{ route('member.add') }}" class="form-horizontal" enctype="multipart/form-data">
					{{csrf_field()}}
					<!--div class="card-header card-header-text" data-background-color="rose">
						<h4 class="card-title"></h4>
					</div-->
                     @if(count($errors) > 0 )
                                        @foreach($errors->all() as $error)
                                            <p class="alert alert-danger">{{$error}}</p>
                                        @endforeach
                    @endif
					<div class="card-content">

						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Union ID</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="union_id"  value="{{ old('union_id') }}"class="form-control" value>
									<span class="help-block">Please enter Union ID of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">First Name</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="name" value="{{ old('name') }}" class="form-control" value>
									<span class="help-block">Please enter First Name of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Last Name</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="lname" value="{{ old('lname') }}"  class="form-control" value>
									<span class="help-block">Please enter Last Name of the user.</span>
								</div> 
                            </div>
						</div>
						<div class="row">
                                <label style="color: black;" class="col-sm-2 label-on-left">NIC Number</label>
                             
                                <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                  <label class="control-label"></label>
                                  <input type="text" name="nic"   class="form-control" >
                                  <span class="help-block">Please enter NIC number of the user.</span>
                              </div>
                             </div>
                             </div>
						<div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Employee ID</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="employee_id" class="form-control" value>
                                    <span class="help-block">Please enter employee ID  of the user.</span>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Gender</label>
                            <div class="col-sm-10 checkbox-radios">
                            	<div class="radio">
									<label>
										<input type="radio" name="gender" value="male" checked="true">
										Male
									</label>
								</div>

								<div class="radio">
									<label>
										<input type="radio" name="gender" value="female" >
										Female
									</label>
								</div>
								
                            </div>
                        </div>
							<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Date of Birth</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="date" name="dob" value="{{ old('dob') }}" class="form-control" value>
									<span class="help-block">Please enter Date Of Birth of the user.</span>
								</div>
                            </div>
                        </div>
							<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Permenant Address</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="address"  value="{{ old('address') }}" class="form-control" value>
									<span class="help-block">Please enter Permenant Address of the user.</span>
								</div>
                            </div>
                        </div>
							<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Mobile Number</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" value>
									<span class="help-block">Please enter Mobile Number of the user.</span>
								</div>
                            </div>
						</div>
						
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Home Phone Number</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="homephone" value="{{ old('homephone') }}" class="form-control" value>
									<span class="help-block">Please enter Home Phone Number of the user.</span>
								</div>
                            </div>
						</div>
						 <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Select Designation</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="designation" value="{{ old('designation') }}" id="nameid">
                                    	<option value=""></option>
                                    @foreach($designations as $designation)

                                        <option value="{{$designation->id}}">{{$designation->designation}}</option>
                                     @endforeach
                                    </select>
                                    <span class="help-block">Please select designation of the user.</span>
                                </div>
                            </div>
                        </div>
						
                        <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Select Work Place</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="work_place" id="workplaceid">
                                    	<option value="">Select Workplace</option>
                                    	   @foreach($workplaces as $workplace)
                                        <option value="{{$workplace->id}}" >{{$workplace->placename}}</option>
                                        @endforeach
                                     
                                    </select>
                                    <span class="help-block">Please select of the user work place .</span>
                                </div>
                            </div>
                        </div>
                        
                       <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Photo</label>
                            <label class="btn btn-file ">

                                Browse <input type="file" name="profile_img" value="{{ old('profile_img') }}">

                            </label>
                        </div>
						
					
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Email</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Email</label>
									<input type="text" name="email" value="{{ old('email') }}" class="form-control" value>
									<span class="help-block">Please enter email the user.</span>
								</div>
                            </div>
						</div>
					
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Username</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="username" value="{{ old('username') }}"  class="form-control" value>
									<span class="help-block">Username</span>
								</div> 
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Password</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="password" value="{{ old('password') }}"  class="form-control" value>
									<span class="help-block">password</span>
								</div> 
                            </div>
						</div>
						
                        <!--##########################################################-->
						
                        <a href="/admin/home" class="btn btn-danger pull-right" >Back</a>
						<a href="" onclick="" class="btn btn-primary pull-right" >Reset</a>
                        <input class="btn btn-success pull-right" type="submit" value="Save">
                        <input class="btn btn-warning pull-right" type="submit" value="Save And New">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
function myFunction() {
  document.getElementById("myfrm").reset();
}
</script>
		  @endsection