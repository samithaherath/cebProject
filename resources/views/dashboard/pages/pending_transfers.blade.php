@extends('dashboard.layouts.main')
@section('title')
Pending Transfers CEBTU
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
                        <h4 class="card-title">Pending Transfers </h4>
                        <form method="post" enctype="multipart/form-data" action="{{route('import')}}">
                            @csrf
                            <div class="row">
                                <label class="btn btn-file btn-primary ">
                                    Select Excel Sheet
                                    <input type="file" name="select_file" class="btn btn-primary">
                                </label>
                                <input class="btn btn-success" type="submit" value="Upload" name="">
                            </div>
                        </form>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%" style="border: 1px solid black; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th scope="col">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" class="selectall">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">EPF NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="" class="selectbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{$value->epf_no}}</td>
                                    <td>{{$value->name}}</td>
                                    <td class="td-actions text-left">
                                        <a href="{{route('transfer.profile',$value->id)}}" type="button" class="btn btn-info"><i class="material-icons">person</i></a>
                                        <a href="{{route('transfer.transfer_profile',$value->id)}}" type="button"><i class="material-icons btn-primary">card_travel</i></a>
                                        <a type="button" class="btn btn-danger" href="" onclick="return confirm('Are you sure you want to Delete?')"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button formaction="" class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete?')">Delete All Selected</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByTagName('tr'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
    console.log(text);
    for (var i = 1, len = rows.length; i < len; i++) {
        rows[i].children[0][text] = i + rows[i].children[0][text];
    }

</script>
@endsection
