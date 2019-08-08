 @extends('dashboard.layouts.main')
@section('title')
  Home-Dashboard CEB Union
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
                            <p style="color: black;" class="category">Members</p>
                            <h3 class="card-title"><?php $members= DB::select('select * from users');
                            $membercount= count($members);
                            ?><?php echo $membercount;?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-success">touch_app</i> <a href="{{route('member.members')}}">View...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="rose">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="card-content">
                            <p style="color: black;" class="category">News Items</p>
                            <h3 class="card-title"><?php $news= DB::select('select * from news');
                            $newscount= count($news);
                            ?><?php echo $newscount;?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-success">touch_app</i> <a href="{{route('news.newses')}}">View...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">outlined_flag</i>
                        </div>
                        <div class="card-content">
                            <p style="color: black;" class="category">Events</p>
                            <h3 class="card-title"><?php $events= DB::select('select * from events');
                            $eventcount= count($events);
                            ?><?php echo $eventcount;?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-success">touch_app</i> <a href="{{route('event.events')}}">View...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                             <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="card-content">
                            <p style="color: black;" class="category"> Groups</p>
                            <h3 class="card-title"><?php $groups= DB::select('select * from groups');
                            $groupscount= count($groups);
                            ?><?php echo $groupscount;?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-success">touch_app</i> <a href="{{route('group.groups')}}">View...</a>
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





</div>
@endsection