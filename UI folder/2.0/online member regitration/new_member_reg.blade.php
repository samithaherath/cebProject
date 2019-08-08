<!DOCTYPE html>
<html>
<head>
   <title></title>

<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script> 
<style type="text/css">
   
</style> 
</head>
<body>
   <section id="tr" class="" style="">
    <div class="main-content">
    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<legend style="text-align: center;font-weight: 700; ">Registration Form</legend>
<div class="form-group">
  <label class="col-md-4 control-label">Union ID</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-flag"></i></span>
  <input  name="first_name" placeholder="Enter Your Union ID" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Employee ID</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-flag"></i></span>
  <input  name="first_name" placeholder="Enter Your Employee ID" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="Enter Your First Name" class="form-control"  type="text">
    </div>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Enter Your Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >NIC Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Enter Your NIC Number" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Gender</label> 
    <div class="col-md-4 inputGroupContainer">
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
<div class="form-group">
  <label class="col-md-4 control-label" >Date of Birth</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-calendar"></i></span>
  <input name="last_name" placeholder="Enter your date of birth" class="form-control"  type="date">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-home"></i></span>
  <input name="last_name" placeholder="Enter your address" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Mobile Phone Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact_no" placeholder="Enter your mobile number" class="form-control" type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Home Phone Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact_no" placeholder="Enter your home phone number" class="form-control" type="text">
    </div>
  </div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Designation</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="department" class="form-control selectpicker">
      <option value="">Select your Designation</option>
      <option>Dummy 1</option>
      <option>Dummy 2</option>
      
    </select>
  </div>
</div>
</div>
 
  <div class="form-group"> 
  <label class="col-md-4 control-label">Work Place</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="department" class="form-control selectpicker">
      <option value="">Select your work place</option>
      <option>Dummy place 1</option>
      <option>Dummy place 2</option>
      
    </select>
  </div>
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Photo</label>
  <div class="col-md-4 inputGroupContainer">  
    <input class="input-group" type="file" name="" value="">
 </div>
</div>
   
<div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="user_name" placeholder="Username" class="form-control"  type="text">
    </div>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="user_password" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
   <button type="submit" class="btn btn-success" >
      Submit <span class="glyphicon glyphicon-send"></span>
   </button>
   <button class="btn btn-warning" >
      Reset <span class="glyphicon glyphicon-refresh"></span>
   </button>
   <button  class="btn btn-danger" >
      Back <span class="glyphicon glyphicon-remove"></span>
   </button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>
 </section>
</body>
</html>

      