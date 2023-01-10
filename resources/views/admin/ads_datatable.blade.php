@extends('admin.layout')
@section('title','License Plate Ads')
@section('content')
    <div class="app-main__inner" id ="app">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                    </div>
                    <div> Posted Ads  </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        License Plate ADS
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <button class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">Add New</button>
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="card col-sm-12" v-if="adding">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3 mb-5">
                                    <label>Status</label>
                                    <select id="status" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3">
                                    <lable> &nbsp;</lable><br>
                                    <button class="btn-primary btn" id="filterTable">Filter</button>
                                </div>
                            </div>
                                <table id="example2" class=" table table-hover table-striped table-bordered" style="width:100%" aria-describedby="example_info">
                                    <thead>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" >Id</th>
                                        <th class="sorting" tabindex="1" aria-controls="example" rowspan="1" colspan="1" >License Number</th>
                                        <th class="sorting" tabindex="2" aria-controls="example" rowspan="1" colspan="1" >emirates</th>
                                        <th class="sorting" tabindex="3" aria-controls="example" rowspan="1" colspan="1" >Contact</th>
                                        <th class="sorting" tabindex="4" aria-controls="example" rowspan="1" colspan="1" >description</th>
                                        <th class="sorting" tabindex="5" aria-controls="example" rowspan="1" colspan="1" >Price</th>
                                        <th class="sorting" tabindex="6" aria-controls="example" rowspan="1" colspan="1">Status</th>
                                        <th class="sorting" tabindex="7" aria-controls="example" rowspan="1" colspan="1">Created at</th>
                                        <th tabindex="8" aria-controls="example" rowspan="1" colspan="1"> </th>
                                        <th  tabindex="9" aria-controls="example" rowspan="1" colspan="1"> </th>
                                        <th tabindex="10" aria-controls="example" rowspan="1" colspan="1"> </th>

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
        function deleteAd(id) {
            axios.post( "/admin/ads/delete/" + id, {id:id},{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    alert("Deleted")
                     $('#example2').DataTable().ajax.reload();
                })
                .catch(error => {
                    this.loading=false;
                    console.log(error)
                    alert(error)
                })
        }
        function approveAd(id) {
            axios.post( "/admin/ads/approve/" + id, {id:id},{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    alert("Approved")
                     $('#example2').DataTable().ajax.reload();
                })
                .catch(error => {
                    this.loading=false;
                    console.log(error)
                    alert(error)
                })
        }
        function rejectAd(id) {
            axios.post( "/admin/ads/reject/" + id, {id:id},{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    alert("Ad Rejected Successfully.")
                     $('#example2').DataTable().ajax.reload();
                })
                .catch(error => {
                    this.loading=false;
                    console.log(error)
                    alert(error)
                })
        }
        $(document).ready(function () {

            //let table = new DataTable('#example2', {
            var table =  $('#example2').dataTable({
                 processing: true,

                ajax: function (d, cb) {
                     let status= $("#status").val();

                    fetch('/admin/ads/datatable?status=' + status)
                        .then(response => response.json())
                        .then(data => cb(data));
                },
                columns: [
                    {data: 'id'},
                    {data: 'license_number'},
                    {data: 'emirates'},
                    {data: 'contact'},
                    {data: 'description'},
                    {data: 'price'},
                    {data: 'status'},
                    {data: 'created_at'},
                    {
                        data: 'id',
                        render: function (data, type,row) {
                            if(row.status !=="approved" && row.status!=="sold"){
                                 return '<button  onclick="approveAd(' + data + ')" class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-success"><i class="pe-7s-check btn-icon-wrapper"> </i>Approve</button>'
                            } else{
                                return ""
                            }

                        },
                    },
                    {
                        data: 'id',
                        render: function (data, type,row) {
                            if(row.status !=="rejected"  && row.status!=="sold"){
                                 return '<button  onclick="rejectAd(' + data + ')" class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-danger"><i class="pe-7s-close btn-icon-wrapper"> </i>Reject</button>'
                            } else{
                                return ""
                            }
                        },

                    },
                    {
                        data: 'id',
                        render: function (data) {
                          return '<button class="mb-2 mr-2 btn-icon btn btn-warning"  onclick="deleteAd(' + data + ')"><i class="pe-7s-trash btn-icon-wrapper"> </i>Delete</button>'
                        },
                    },
                ]
            });

            $('#filterTable').click(function () {
                console.log("refereshing")
                $('#example2').DataTable().ajax.reload();

            });
        })
    </script>
@endsection
