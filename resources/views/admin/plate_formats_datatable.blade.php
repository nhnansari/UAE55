@extends('admin.layout')
@section('title','Plate Formats')
@section('content')
    <div class="app-main__inner" id ="app">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                    </div>
                    <div> Plate Formats  </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        License Plate Formats
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <button class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">Add New</button>
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="card col-sm-12" v-if="adding">
                        <div class="card-body">
                                <table id="example2" class=" table table-hover table-striped table-bordered" style="width:100%" aria-describedby="example_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"   style="width: 94px;">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  style="width: 124.375px;">Print Letter</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 96.7375px;">Print Contact</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  style="width: 87.0625px;">Emirates</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 141px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100.975px;">Created at</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 100.975px;"> </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

            </div>
        </div>
    </div>
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script>
       function deleteFormat(id) {
           axios.post( "/admin/plates/delete/" + id, {id:id},{
               headers: {
                   'Content-Type': 'multipart/form-data'
               }
           })
               .then(response => {
                   alert(response.data)
                   $('#example2').DataTable().ajax.reload();
               })
               .catch(error => {
                    console.log(error)
                   alert(error)
               })
       }
   </script>
    <script>

            let table = new DataTable('#example2', {
                ajax: function (d, cb) {
                    fetch('/admin/plates/datatable')
                        .then(response => response.json())
                        .then(data => cb(data));
                },
                columns: [
                    { data: 'title' },
                    { data: 'supports_letter' },
                    { data: 'print_contact' },
                    { data: 'emirates' },
                    { data: 'status' },
                    { data: 'created_at' },
                    {
                        data: 'id',
                        render: function (data, type,row) {
                            return '<button  onclick="deleteFormat(' + data + ')" class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i>Delete</button>'
                        },
                    },
                ]
            } );

    </script>
@endsection
