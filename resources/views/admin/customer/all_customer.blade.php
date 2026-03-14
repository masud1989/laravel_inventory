@extends('admin.master')

@section('page_title')
   All Customer
@endsection


@section('page_content')

 <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Customer Page</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                   <a href="{{ route('add.customer') }}" class="btn btn-secondary">Add Customer</a>
                </ol>
            </div>
        </div>

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Customer List</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Account No</th>
                                <th>Customer Name</th>
                                {{-- <th>Customer Email</th> --}}
                                <th>Customer Phone</th>
                                <th>Customer Address</th>
                                {{-- <th>Comment</th> --}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($customer as $key=> $item)
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->account_no  }}</td>
                                    <td>{{ $item->name }}</td>
                                    {{-- <td>{{ $item->email }}</td> --}}
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    {{-- <td>{{ $item->comment }}</td> --}}
                                    <td>
                                        <a href="{{ route('edit.customer', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href={{ route('delete.customer', $item->id) }} class="btn btn-danger btn-sm" id="delete">Delete</a>
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