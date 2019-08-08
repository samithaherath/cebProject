 @extends('dashboard.layouts.main')
@section('title')
  Home-Edit  Staff CEB UNION
@endsection
@section('content')
            <div class="container-fluid">
                                     <div class="row">
<div class="col-md-12">
			<div class="card">
				<h4 align="center">Member Details</h4>
				@if($message = Session::get('danger'))
				  <div class="alert alert-danger">
				  	<strong>{{$message}}</strong>
				  </div>
				@endif
				@foreach($staffmembers as $member)
				<form method="POST" action="{{ route('staffs.update',$member->id)}}" class="form-horizontal" enctype="multipart/form-data">
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
                            <label class="col-sm-2 label-on-left">Name</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="name"  value="{{ $member->name}}"class="form-control" value>
                                    <span class="help-block">Please enter Union name</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Phone</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="phone" value="{{$member->phone }}" class="form-control" value>
                                    <span class="help-block">Please enter First Phone of the user.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Facebook Link</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="fblink" value="{{ $member->fblink }}"  class="form-control" value>
                                    <span class="help-block">Please enter facebook link</span>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Twitter Link</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="twlink" value="{{ $member->twlink  }}"  class="form-control" value>
                                    <span class="help-block">Please enter twitter </span>
                                </div> 
                            </div>
                        </div>
                            <div class="row">
                            <label class="col-sm-2 label-on-left">instagram Link</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="instalink" value="{{ $member->instalink }}"  class="form-control" value>
                                    <span class="help-block">Please enter instagram link  </span>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Linkedin Link</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="linkedinlink" value="{{ $member->linkedinlink }}"  class="form-control" value>
                                    <span class="help-block">Please enter Linkedin link  </span>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">email</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" name="email" value="{{ $member->email }}"  class="form-control" value>
                                    <span class="help-block">email</span>
                                </div> 
                            </div>
                        </div>

                    

                       <div class="row">
                            <label class="col-sm-2 label-on-left">Photo</label>
                            <label class="btn btn-file ">

                                Browse <input type="file" name="photo" value="{{ $member->photo }}">

                            </label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Select Designation</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="position" id="nameid"  >
                                        
                                    	<span style="display: none;">{{ $olddesig =$member->position }} </span>
                                         @foreach($designations as $designation)
                                         <span style="display: none;">{{ $desig =$designation->id }} </span>
                                        <option value="{{$designation->id}}" {{  $olddesig== $desig  ? 'selected' : '' }} >{{$designation->designation}} </option>
                                        @endforeach
                                     
                                    </select>
                                    <span class="help-block">Please select designation of the user.</span>
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