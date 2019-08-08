 @extends('dashboard.layouts.main')
@section('title')
  Home-Manage Depo CEB UNION
@endsection
@section('content')

<div class="col-md-12">
  <div class="col-md-12">
     
      <div class="card">
        <h4 align="center">Edit Depo</h4>
            <form method="post" action="" class="form-horizontal">
        <div class="card-content">

            <div class="row">
                            <label style="color: black;" class="col-sm-2 label-on-left">Select WorkPlace</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control" name="group_id" id="">
                                        <option value="">Select WorkPlace </option>
                                        <option value="">test 1</option>
                                        <option value="">test 2</option>
                                        <option value="">test 3</option>
                                    </select>
                                   
                                </div>
                            </div>
                        </div>
            <div class="row">
                <label style="color: black;" class="col-sm-2 label-on-left">Depo Name</label>

                <div class="col-sm-10">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label"></label>
                        <input type="text" name="place_name" class="form-control" value="">
                        <span class="help-block">Please enter depo.</span>
                    </div>
                </div>
            </div>
            <a href="" class="btn btn-danger pull-right" >Cancel</a>
            <input class="btn btn-success pull-right" type="submit" value="Update">
            
        </div>
    </form>
</div>

</div>
</div>

@endsection