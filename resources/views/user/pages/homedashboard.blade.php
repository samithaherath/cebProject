 @extends('user.layouts.main')
@section('title')
  Home- User Dashboard CEB Union
@endsection
@section('content')
 <div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">donut_small</i>
                </div>
                <div class="card-content">
                <h4 class="card-title">Quick View</h4>
                    <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Members</p>
                            <h3 class="card-title">
								 <?php 
                                          $members= DB::select('select * from users');
                                          $membercount= count($members);
                                       ?>
                                       <?php 
                                          echo $membercount;
                                       ?>
							</h3>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="rose">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="card-content">
                            <p class="category">News Items</p>
                            <h3 class="card-title">
								<?php 
                                          $events=DB::select('select * from news');
                                          $event_count=count($events);
                                          echo $event_count;
                                       ?>
							</h3>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Events</p>
                            <h3 class="card-title">
								<?php 
                                          $events=DB::select('select * from events');
                                          $event_count=count($events);
                                          echo $event_count;
                                       ?>
							</h3>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="card-content">
                            <p class="category"> Groups</p>
                            <h3 class="card-title">
								 <?php 
                                          $groups=DB::select('select * from groups');
                                          $group_count=count($groups);
                                          echo $group_count;
                                       ?>
							
							</h3>
                        </div>
                        <div class="card-footer">
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
   </div>

   
</div>
</div>
</div>





</div>
@endsection