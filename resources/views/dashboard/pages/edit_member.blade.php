 @extends('dashboard.layouts.main')
@section('title')
  Home-Edit  Member CEB UNION
@endsection
@section('content')
            <div class="container-fluid">
                                     <div class="row">
<div class="col-md-12">
			<div class="card">
				<h4 align="center" style="font-weight:500;font-size:20px;">Member Details</h4>
				@if($message = Session::get('danger'))
				  <div class="alert alert-danger">
				  	<strong>{{$message}}</strong>
				  </div>
				@endif
				@foreach($members as $member)
				<form method="POST" action="{{ route('member.edit',$member->id)}}" class="form-horizontal" enctype="multipart/form-data">
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
									<input type="text" name="union_id"   class="form-control" value="{{$member->union_id}}">
									<span class="help-block">Please enter Union ID of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">First Name</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="name"   value="{{$member->name}}" class="form-control" >
									<span class="help-block">Please enter First Name of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Last Name</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="lname"   value="{{$member->lname}}"  class="form-control" value>
									<span class="help-block">Please enter Last Name of the user.</span>
								</div> 
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Username</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="username"  value="{{$member->username}}"  class="form-control" value>
									<span class="help-block">Username</span>
								</div> 
                            </div>
						</div>
						<!--<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Password</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="password"  value="{{$member->password}}"   class="form-control" value>
									<span class="help-block">password</span>
								</div> 
                            </div>
						</div>-->

						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Date Of Birth</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="date" name="dob"  value="{{$member->dob}}"  class="form-control" value>
									<span class="help-block">Please enter Date Of Birth of the user.</span>
								</div>
                            </div>
                        </div>
                        <div class="row">
                                <label style="color: black;" class="col-sm-2 label-on-left">NIC Number</label>
                             
                                <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                  <label class="control-label"></label>
                                  <input type="text" name="nic"   value={{$member->nic}}""  class="form-control" placeholder="{{$member->nic}}" >
                                  <span class="help-block">Please enter NIC number of the user.</span>
                              </div>
                             </div>
                             </div>

                        <!--##########################################################-->

                       <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Photo</label>
                            <label class="btn btn-file ">

                                Browse <input type="file" name="profile_img"  value="{{$member->profile_img}}" >

                            </label>
                        </div>

						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Mobile Number</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="mobile"    class="form-control"  value="{{$member->mobile}}" placeholder="{{$member->mobile}}">
									<span class="help-block">Please enter Mobile Number of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Home Phone Number</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="homephone"   value="{{$member->homephone}}"  class="form-control" value>
									<span class="help-block">Please enter Home Phone Number of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">email</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Email</label>
									<input type="text" name="email"  value="{{$member->email}}"  class="form-control" value>
									<span class="help-block">Please enter First Name of the user.</span>
								</div>
                            </div>
						</div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Permenant Address</label>

                        	<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label class="control-label"></label>
									<input type="text" name="address"   value="{{$member->address}}"  class="form-control" value>
									<span class="help-block">Please enter Permenant Address of the user.</span>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Employee ID</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="employee_id" class="form-control" placeholder="{{$member->employee_id}}" value="{{$member->employee_id}}"  >
                                    <span class="help-block">Please enter employee ID  of the user.</span>
                                </div>
                            </div>
                        </div>
						 <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Password</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="password" class="form-control"  value=""  >
                                    <span class="help-block">Please enter new password:(if you want to update the user password)</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Select Designation</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="designation" id="nameid"  >
                                        
                                    	<span style="display: none;">{{ $olddesig =$member->designation }} </span>
                                         @foreach($designations as $designation)
                                         <span style="display: none;">{{ $desig =$designation->id }} </span>
                                        <option value="{{$designation->id}}" {{  $olddesig== $desig  ? 'selected' : '' }} >{{$designation->designation}} </option>
                                        @endforeach
                                     
                                    </select>
                                    <span class="help-block">Please select designation of the user.</span>
                                </div>
                            </div>
                        </div>
                           <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Set user Status</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="status" >

                                    	<span style="display: none;">{{ $olddesig =$member->status }} </span>
                                        <option value="1" {{  $olddesig== 1 ? 'selected' : '' }} >Active </option>
                                        <option value="0"  {{  $olddesig== 0 ? 'selected' : '' }}>Inactive </option>
                                      
                                    </select>
                                    <span class="help-block">Please select designation of the user.</span>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<label style="color: black;" class="col-sm-2 label-on-left">Gender</label>
                            <div class="col-sm-10 checkbox-radios">
                            	<span style="display: none;">{{ $oldgender= $member->gender}}
                            	
                                      <?php if($oldgender === 'male'){
                                      	$genderindicator= 1 ;
                                      }else{
                                      	  $genderindicator= 0;
                            	    }
                                      ?>
                            	 </span>
                            	<div class="radio">
									<label>
										<input type="radio" name="gender" value="male" {{$genderindicator== 1 ? 'checked' : '' }}>
										Male
									</label>
								</div>

								<div class="radio">
									<label>
										<input type="radio" name="gender" value="female"  {{ $genderindicator== 0 ? 'checked' : '' }}>
										Female
									</label>
								</div>
								
                            </div>
                        </div>
                        <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Select Work Place</label>
                            	<span style="display: none;">{{ $oldworkplace =$member->work_place }} </span>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="work_place" id="workplaceid">
                                         @foreach($workplaces as $workplace)
                                    	 <span style="display: none;">{{ $work =$workplace->id }} </span>
                                        <option value="{{$workplace->id}}"  {{  $oldworkplace== $work ? 'selected' : '' }} >{{$workplace->placename}}</option>
                                        @endforeach
                                    </select>

                                    <span class="help-block">Please select of the user work place .</span>
                                </div>
                            </div>
                        </div>
                    
                        <a href="/admin/members" class="btn btn-danger pull-right" >Cancel</a>
                        <input class="btn btn-success pull-right" type="submit" value="Update">
                        
					</div>
				</form>
				@endforeach
			</div>
		</div>
	</div>
</div>

		  @endsection