@extends('admin.master')

@section('page_title')
   Add Warehouse
@endsection

@section('page_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Add Warehouse</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <a href="{{ route('all.warehouse') }}" class="btn btn-secondary">All Warehouse</a>
                                </ol>
                            </div>
                        </div>

                        <!-- Form Validation -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Add Warehouse Form</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                       <form action="{{ route('store.warehouse') }}" method="post" class="row g-3">
                                         @csrf
                                            <div class="col-md-6">
                                                <label for="validationDefault01" class="form-label">Warehouse Name</label>
                                                <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror >
                                                 @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationDefault01" class="form-label">Warehouse Email</label>
                                                <input type="email" @error('email') is-invalid @enderror name="email" class="form-control" id="validationDefault01" >
                                                 @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationDefault01" class="form-label">Phone No</label>
                                                <input type="text" @error('phone') is-invalid @enderror name="phone" class="form-control" id="validationDefault01" >
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationDefault01" class="form-label">Warehouse Address</label>
                                                <input type="text"  @error('city') is-invalid @enderror name="city" class="form-control" id="validationDefault01" >
                                                  @error('city')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->                         
                    </div> <!-- container-fluid -->
@endsection