 @extends('dashboard.layouts.main')
@section('title')
  Home-View Depo CEB UNION
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
                <h4 class="card-title">(Work place name) </h4>
                     <form action=""  method="post">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover"  cellspacing="0" width="100%" style="width:100%" style="border: 1px solid black; ">
                        <thead>
                            <tr >
								<th>No</th>
                                <th scope="col">  <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes"   class="selectall" >
                                                        </label>
                                                    </div>
                                               </th>
                                    <th scope="col">Depo Name</th>
                                    <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                                <tr>
									<td></td>
                                        <td> <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name=""   class="selectbox" value="" >
                                                        </label>
                                                    </div> </td>
                                        <td>test</td>
                                        <td class="td-actions text-left">
                                              
                                               <a href="edit_dep" type="button"><i class="material-icons btn-primary">create</i></a>
                                              
                                                 <button type="submit" formaction="" onclick="return confirm('Are you sure you want to Delete?')" ><i class="material-icons  btn btn-danger ">delete</i> </button>
                                         </td>
                                </tr>
                         
                        </tbody>
                    </table>
                      <button formaction="" class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete?')" >Delete All Selected </button>
                </form>
                
            </div>
        </div>
        
    </div>
    
    
    
    
    </div>
    
                </div>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
            language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on( 'click', '.edit', function () {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
        } );

        // Delete a record
        table.on( 'click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        } );

        //Like record
        table.on( 'click', '.like', function () {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });

    </script>
<script type="text/javascript">
            
          var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByTagName('tr'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
      console.log(text);
        for (var i = 1, len = rows.length; i < len; i++){
            rows[i].children[0][text] = i + rows[i].children[0][text];
        }
        </script>
@endsection
