@extends('admin.layout')
@section('title','Users')
@section('content')
    <div class="app-main__inner" id ="app">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                    </div>
                    <div> Users </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                        Users
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                     </div>
                </div>
                <div class="no-gutters row">
                    <div class="card col-sm-12" v-if="adding">
                        <div class="card-body">
                                <table id="example2" class=" table table-hover table-striped table-bordered" style="width:100%" aria-describedby="example_info">
                                    <thead>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example"  aria-sort="descending" >Id</th>
                                        <th class="sorting" tabindex="1" aria-controls="example" >Name</th>
                                        <th class="sorting" tabindex="2" aria-controls="example"  >Email</th>
                                        <th class="sorting" tabindex="2" aria-controls="example" >mobile</th>
                                        <th class="sorting" tabindex="2" aria-controls="example"  >address</th>
                                        <th class="sorting" tabindex="3" aria-controls="example"  >Status</th>
                                        <th class="sorting" tabindex="4" aria-controls="example"  >Created at</th>
                                        <th tabindex="8" aria-controls="example" > </th>
                                        <th  tabindex="9" aria-controls="example" > </th>
                                        <th tabindex="10" aria-controls="example" > </th>

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
        function deleteuser(id) {
            axios.post( "/admin/users/delete/" + id, {id:id},{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    alert(response.data)
                     $('#example2').DataTable().ajax.reload();
                })
                .catch(error => {
                    this.loading=false;
                    console.log(error)
                    alert(error)
                })
        }
        function ban(id) {
            axios.post( "/admin/users/ban/" + id, {id:id},{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    alert(response.data)
                     $('#example2').DataTable().ajax.reload();
                })
                .catch(error => {
                    this.loading=false;
                    console.log(error)
                    alert(error)
                })
        }
        function unban(id) {
            axios.post( "/admin/users/unban/" + id, {id:id},{
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
        function makeAdmin(id) {
            axios.post( "/admin/users/makeAdmin/" + id, {id:id},{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    alert(response.data)
                     $('#example2').DataTable().ajax.reload();
                })
                .catch(error => {
                    this.loading=false;
                    console.log(error)
                    alert(error)
                })
        }
        $(document).ready(function () {

            let table = new DataTable('#example2', {
                "order": [[ 0, "desc" ]],
                 processing: true,

                ajax: function (d, cb) {
                    fetch('/admin/users/datatable')
                        .then(response => response.json())
                        .then(data => cb(data));
                },
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'mobile'},
                    {data: 'address'},
                    {data: 'status'},
                    {data: 'created_at'},
                    {
                        data: 'id',
                        render: function (data, type,row) {
                            if(row.status ===0){
                                 return '<button  onclick="unban(' + data + ')" class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-success"><i class="pe-7s-check btn-icon-wrapper"> </i>Un Ban</button>'
                            } else{
                                return '<button  onclick="ban(' + data + ')" class="mb-2 mr-2 btn-icon btn-pill btn btn-outline-danger"><i class="pe-7s-close btn-icon-wrapper"> </i>Ban</button>'
                            }

                        },
                    },
                    {
                        data: 'id',
                        render: function (data) {
                          return '<button class="mb-2 mr-2 btn-icon btn btn-warning"  onclick="deleteuser(' + data + ')"><i class="pe-7s-trash btn-icon-wrapper"> </i>Delete</button>'
                        },
                    },
                    {
                        data: 'id',
                        render: function (data) {
                          return '<button class="mb-2 mr-2 btn-icon btn btn-success"  onclick="makeAdmin(' + data + ')">make Admin</button>'
                        },
                    },
                ]
            });
        })
    </script>
@endsection
