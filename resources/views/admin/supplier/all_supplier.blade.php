@extends('admin.master')

@section('page_title')
   All Supplier
@endsection


@section('page_content')

 <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Supplier Page</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                   <a href="{{ route('add.supplier') }}" class="btn btn-secondary">Add Supplier</a>
                </ol>
            </div>
        </div>

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Supplier List</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Supplier Name</th>
                                <th>Supplier Email</th>
                                <th>SupplierPhone</th>
                                <th>Supplier Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($supplier as $key=> $item)
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        {{-- <a href="{{ route('edit.supplier', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href={{ route('delete.supplier', $item->id) }} class="btn btn-danger btn-sm" id="delete">Delete</a> --}}
                                    </td>
                                </tr>   
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->

@endsection