 @extends('dashboard.layouts.main')
@section('title')
  Home-Manage Events CEB UNION
@endsection
@section('content')


        
        <div class="content">
                <div class="container-fluid">
                         <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
    
            <div class="card-content">
                <h4 class="card-title">Event Details</h4>
                
                     <form action="/deleteallevents"  method="post">
                                @csrf
                                @method('DELETE')
                    <table id="datatables" class="table table-striped table-no-bordered table-hover"  cellspacing="0" width="100%" style="width:100%" style="border: 1px solid black; ">
                        <thead>
                            <tr >
                                <th scope="col">  <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes"   class="selectall" >
                                                        </label>
                                                    </div>
                                               </th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Heading</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($events as $event)
                                <tr>
                                        <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="ids[]"   class="selectbox" value="{{$event->id}}" >
                                                        </label>
                                                    </div> </td>
                                        <th scope="row">{{$event->id}}</th>
                                        <td>{{$event->header_title}}</td>
                                        <td>
                                            <img src="{{URL::to('/')}}/event/mainimg/{{$event->main_image}}" style="width:50px;height:20px;" alt="">
                                             @foreach (explode(",",$event->gallery_img) as $gallery_img)
                                                  
                                                   <img src="{{URL::to('/')}}/event/event_gallery_images/{{$gallery_img}}" style="width:50px;height:20px;" alt="">
                                                   
                                        @endforeach

                                        </td>
                                        <td>
                                            <p>{{$event->short_desc}}</p>
                                        </td>
                                        <td class="td-actions text-left">
                                                <a type="button" class="btn btn-info" href="{{route('event.show',$event->id)}}" ><i class="material-icons">person</i></a>
                                               <a href="{{action('EventController@edit',$event->id)}}" type="button"><i class="material-icons btn-primary">create</i></a>
                                              
                                                <a type="button" href="{{route('event.recycle',$event->id)}}" onclick="return confirm('Are you sure you want to Delete?')" ><i class="material-icons  btn btn-danger ">delete</i> </a>
                                         </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                      <button formaction="/recycleAllevents" class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete?')" >Delete All Selected </button>
                </form>
               
            </div>
        </div>
        
    </div>
    
    
    
    
    </div>
    
                </div>
            </div>


@endsection
