@extends('frontend.layouts.front')
@section('content')
      

         <!--Sub Header Start-->
         <section>
               <div class="subh">
                 
                        <img src="{{URL::asset('assets/images/subheaderbg.jpg')}}" >
                        <div class="top-left">
                           <h2>Search Results</h2>
                        </div>
                 
                  
                  
               </div>
            </section>
         <!--Sub Header End--> 
         <!--Main Content Start-->
         <div class="main-content">
            <!--Contact Us Start-->
            <div class="contact-details-two graybg p80">
               <div class="container">
                  <div class="row">
                     <!-- Address Box Start -->
                     <div class="row">
                            
                             @if(isset($details))
                               @foreach($details as $member )
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons"></i>
                                    </div>
                                   
                                    <div class="card-content">
                                        <h4 class="card-title"></h4>
                                        <form method="#" action="#">
                                            <div class="form-group label-floating">
                                                       
                                                        <picture>
                                                            <img src="{{URL::asset('assets/images/suser.jpg')}}" alt="" style="width:250px;height: 250px;" disabled>
                                                          </picture>
                                             </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" value="{{$member->name}}">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">EMP No</label>
                                                <input type="text" class="form-control" value="{{$member->employee_id}}">
                                            </div>
                                         
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                             @endforeach

                            @endif
                            
                  </div>
               </div>
            </div>
         </div>
        
         @endsection    
      