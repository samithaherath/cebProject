 @extends('dashboard.layouts.main')
@section('title')
  Home-Manage News CEB UNION
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
                <h4 class="card-title">News Details</h4>
               
                     <form action="/deleteallnews"  method="post">
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
                             @foreach($news as $new)
                                <tr>
                                     
                                        <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="ids[]"   class="selectbox" value="{{$new->id}}" >
                                                        </label>
                                                    </div> </td>
                                        <th scope="row">{{$new->id}}</th>
                                        <td>{{$new->header_title}}</td>
                                        <td>
                                            <img src="{{URL::to('/')}}/news/mainimg/{{$new->main_image}}" style="width:50px;height:20px;" alt="">
                                             @foreach (explode(",",$new->gallery_img) as $gallery_img)
                                                  
                                                   <img src="{{URL::to('/')}}/news/news_gallery_images/{{$gallery_img}}" style="width:50px;height:20px;" alt="">
                                                   
                                        @endforeach

                                        </td>
                                        <td>
                                            <p>{{$new->long_desc}}</p>
                                        </td>
                                        <td class="td-actions text-left">
                                              
                                               <a href="{{route('news.restore',$new->id)}}" onclick="return confirm('Are you sure you want to restore?')" type="button"><i class="material-icons btn-primary">restore_page</i></a>
                                             
                                              
                                                 <button type="submit" formaction="{{action('NewsController@destroy',$new->id)}}" onclick="return confirm('Are you sure you want to Delete?')" ><i class="material-icons  btn btn-danger ">delete</i> </button>
                                         </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                      <button formaction="/deleteallnews" class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete?')" >Delete All Selected </button>
                      <button formaction="/restoreallnews" class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Restore?')" >Restore All Selected </button>
                </form>

               
            </div>
        </div>
        
    </div>
    
    
    
    
    </div>
    
                </div>
            </div>


@endsection
