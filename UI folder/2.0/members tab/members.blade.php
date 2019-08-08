@extends('frontend.layouts.front')
@section('title')
Members
@endsection
@section('content')
         <!--Sub Header Start-->
         <section>
               <div class="subh">
                 
                     <img src="{{URL::asset('assets/images/subheaderbg.jpg')}}" >
                     <div class="top-left">
                        <h2>Members</h2>
                     </div>
               </div>
         </section>
         <!--Sub Header End--> 
         <!--Main Content Start-->
      
        
   <section id="" class="wf100 p80 h2-news-articles" style="padding-top: 0px;">
      <div id="" class="main-content pagebg p80">
            
            <div class="team-grid official-members">
               <div class="container">
                <div id="staff_data">
				


                  <div class="row">
                     <!--User Box Start-->
                 
                     <div class="col-md-4 col-sm-6">
                        <div class="h3-team-box">
                           <div class="team-info">
                              <h5>Name</h5>
                              <span style="display: none;"></span>
                              <span style="display: none;">Designation</span>
                              <strong class="dep">Designation:Designation
                              </strong>
                              <p>Telephone:xxxxxxxxxxxx<br></p>
                           </div>
                           <img style="height:410px;width:340px;" src="{{URL::asset('assets/images/author.jpg')}}" alt=""> 
                        </div>
                     </div>
               
                     <!--Team Box End--> 

                     <div class="col-md-4 col-sm-6">
                        <div class="h3-team-box">
                           <div class="team-info">
                              <h5>Name</h5>
                              <span style="display: none;"></span>
                              <span style="display: none;">Designation</span>
                              <strong class="dep">Designation:Designation
                              </strong>
                              <p>Telephone:xxxxxxxxxxxx<br></p>
                           </div>
                           <img style="height:410px;width:340px;" src="{{URL::asset('assets/images/author.jpg')}}" alt=""> 
                        </div>
                     </div>
                     <!--Team Box Start-->
                        
                     <div class="col-md-4 col-sm-6">
                        <div class="h3-team-box">
                           <div class="team-info">
                              <h5>Name</h5>
                              <span style="display: none;"></span>
                              <span style="display: none;">Designation</span>
                              <strong class="dep">Designation:Designation
                              </strong>
                              <p>Telephone:xxxxxxxxxxxx<br></p>
                           </div>
                           <img style="height:410px;width:340px;" src="{{URL::asset('assets/images/author.jpg')}}" alt=""> 
                        </div>
                     </div>
                     <!--Team Box End--> 
                     <!--Team Box Start-->
                  
                     <!--Team Box End--> 
                    
                     <div class="site-pagination">
                        
                     </div>
                  </div>
            


				   </div>
               </div>
               <!--Team End--> 
            </div>
            <!--Main Content End--> 
      </div>
   </section>
         @endsection    