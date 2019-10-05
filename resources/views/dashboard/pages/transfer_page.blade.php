 @extends('dashboard.layouts.main')
 @section('title')
 Profile -Pending Transfers CEBTU
 @endsection
 @section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-12">

             <div class="card">
                 <h4 align="center">Transfer Details</h4>
                 <form method="" action="view_mem" class="form-horizontal">
                     <div class="card-content">
                         <div class="row">
                             <label class="col-sm-2 label-on-left">EPF No</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" value="{{$user->epf_no}}" class="form-control" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left"> Name</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" class="form-control" value="{{$user->name}}" disabled>

                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <label class="col-sm-2 label-on-left">Date Of Birth</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" class="form-control" value="{{$user->dob}}" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">Present Work Station</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" class="form-control" value="{{$user->present_work_station}}" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">Marrital Status</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" class="form-control" value="{{$user->maritial_status}}" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">Reported Date to Current Work Station</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" class="form-control" value="{{$user->reported_date}}" disabled>

                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <label class="col-sm-2 label-on-left">Years</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" value="{{$user->years}}" class="form-control" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">1st Preference</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" value="{{$user->first_pref}}" class="form-control" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">2nd Preference</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" value="{{$user->second_pref != '' ? $user->second_pref : 'N/A'}}" class="form-control" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">3rd Preference</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" value="{{$user->third_pref != '' ? $user->third_pref : 'N/A'}}" class="form-control" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">Reason for Transfer</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" value="{{$user->reason}}" class="form-control" disabled>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <label class="col-sm-2 label-on-left">Address</label>

                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <input type="text" class="form-control" value="{{$user->address}}" disabled>

                                 </div>
                             </div>
                             </div>
                            <div class="row">
                               <label class="col-sm-2 label-on-left">Transfer Id</label>

                               <div class="col-sm-10">
                                   <div class="form-group label-floating is-empty">
                                       <input type="text" class="form-control" >
                                   </div>
                               </div>

                             </div>
                            <div class="row">
                               <label class="col-sm-2 label-on-left">Transfer to</label>

                               <div class="col-sm-10">
                                   <div class="form-group label-floating is-empty">
                                       <input type="text" class="form-control" >
                                   </div>
                               </div>

                             </div>
                             <a href="{{route('transfer.index')}}"  class="btn btn-danger pull-right">Back</a>

                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>


 @endsection
