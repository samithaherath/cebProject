  @extends('dashboard.layouts.main')
@section('title')
  Home-Manage Contact Persons CEB UNION
@endsection
@section('content')
            <div class="container-fluid">
                                     <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                         <div class="card-content">
                            <h4 class="card-title">Contacts</h4>
                           
                              <form action=""  method="post">
                        
                                <button formaction="" class="btn btn-danger" type="submit" >Delete All Selected </button>
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"  cellspacing="0" width="100%" style="width:100%" style="border: 1px solid black; ">
                                    <thead>
                                        <tr >
                                            <th scope="col">  <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes"   class="selectall" >
                                                        </label>
                                                    </div>
                                               </th>
                                            <th scope="col">No</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name </th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Contact No</th>
                                                <th scope="col">Contact No 2</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                             <td> <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name=""class="selectbox" value="{" >
                                                </label>
                                            </div> 
                                        </td>
                                            <td>1</td>
                                            <td>
                                                <img class="memphoto" style="width:30px;height:30px;"  src="" alt="" border=3></img>
                                            </td>
                                            <td>Test First</td>
                                            <td>Test Last</td>
                                            <td>Test Address</td>
                                            <td>1234567890</td>
                                            <td>9999999999</td>
                                            <td>description</td>
                                            <td class="td-actions text-left">
                                               
                                                <a href="" type="button"><i class="material-icons btn-success">person</i></a>
                                                 <a href="" type="button"><i class="material-icons btn-primary">create</i></a>
                                                 <a href="" onclick="return confirm('Are you sure you want to Delete?')" type="button"><i class="material-icons btn-danger">delete</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            
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
            @endsection
        
