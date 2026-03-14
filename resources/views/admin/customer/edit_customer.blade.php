@extends('admin.master')

@section('page_title')
   Edit Customer
@endsection

@section('page_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Edit Customer</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <a href="{{ route('all.customer') }}" class="btn btn-secondary">All Customer</a>
                                </ol>
                            </div>
                        </div>

                        <!-- Form Validation -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Edit Customer Form</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
    <form action="{{ route('update.customer') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $customer->id }}">

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Customer Account No</label>
            <input type="text" class="form-control @error('account_no') is-invalid @enderror" name="account_no" value="{{ $customer->account_no }}" >
            @error('account_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Customer Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $customer->name }}" >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Customer Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $customer->email }}"  >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Customer Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ $customer->phone }}" >
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Customer Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $customer->address }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 
        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">Comment</label>
            <input type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ $customer->comment }}">
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 
            
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
</div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->                         
                    </div> <!-- container-fluid -->

@endsection