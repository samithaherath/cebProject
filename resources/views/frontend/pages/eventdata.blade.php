
                  <div class="row">
                      @foreach($events as $event)
                     <!--Event Start-->
                     <div class="col-md-4 col-sm-6">
                        <div class="event-post">
                           <div class="thumb"> 
							   <a href="{{route('eventfront.show',$event->id)}}">
								   <i class="fas fa-link"></i>
							   </a> 
							   <img style="width:auto; height:50vh;" src="{{URL::to('/')}}/event/mainimg/{{$event->main_image}}" alt="">
							</div>
                           <div class="event-post-content">
                              <div class="event-post-txt">
								  <div style="height: 80px;">
                                 <h5 style="font-size:16px;color:black;"><a href="{{route('eventfront.show',$event->id)}}">{{$event->header_title}}</a></h5>
								  </div>
                                 <ul class="event-meta">
                                    <li><i class="far fa-calendar-alt"></i>Date &nbsp;&nbsp; <?php $date = strtotime($event->e_date);
										$newdate = date('d-F-Y',$date); 
										echo $newdate;?></li>
                                    <li><i class="far fa-clock"></i>Time&nbsp;&nbsp;{{$event->e_time}}</li>
									  <li><i class="far fa-map-marker-alt"></i>Venue &nbsp;&nbsp;{{$event->e_venue}}</li>
                                 </ul>
                                 <textarea style="background-color:white;" rows="8" class="form-control" disabled>
                                 {{$event->short_desc}}
                              </textarea>
                              </div>
                              <div class="event-post-loc"> <i class="fas fa-user"></i> {{$event->orgnizer}}<a href="{{route('eventfront.show',$event->id)}}"><i class="fas fa-arrow-right"></i></a> </div>
                           </div>
                        </div>
                     </div>
                     <!--Event End--> 
                   @endforeach
					  <div class="site-pagination">
						
                        {{$events->links('vendor.pagination.custom') }}
                     </div>
                  </div>
                 
