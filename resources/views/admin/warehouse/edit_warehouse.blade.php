@extends('admin.master')

@section('page_title')
   Edit Brand
@endsection

@section('page_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Edit Brand</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <a href="{{ route('all.brand') }}" class="btn btn-secondary">All Brand</a>
                                </ol>
                            </div>
                        </div>

                        <!-- Form Validation -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">V Brand Form</h5>
                                    </div><!-- end card header -->
        
                                    <<div class="card-body">
    <form action="{{ route('update.warehouse') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $warehouse->id }}">

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">WareHouse Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $warehouse->name }}" >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">WareHouse Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $warehouse->email }}"  >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">WareHouse Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ $warehouse->phone }}" >
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationDefault01" class="form-label">WareHouse City</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $warehouse->city }}">
            @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 
            
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Save Change</button>
        </div>
    </form>
</div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->                         
                    </div> <!-- container-fluid -->

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#image').change(function(e){
                                var reader = new FileReader();
                                reader.onload = function(e){
                                    $('#showImage').attr('src',e.target.result);
                                }
                                reader.readAsDataURL(e.target.files['0']);
                            });
                        });
                    </script>

@endsection