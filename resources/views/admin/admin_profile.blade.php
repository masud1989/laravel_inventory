@extends('admin.master')



@section('page_title')
    Admin | Profile
@endsection

@section('page_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <div class="container-xxl">
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ (!empty($editData->photo)) ? url('upload/admin_images/'.$editData->photo) : url('upload/no-image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
            
                                                <div class="overflow-hidden ms-4">
                                                    <h4 class="m-0 text-dark fs-20">{{ $editData->name }}</h4>
                                                    <p class="my-1 text-muted fs-16">{{ $editData->email }}</p>
                                                    {{-- <span class="fs-15"><i class="mdi mdi-message me-2 align-middle"></i>Speaks: <span>English <span class="badge bg-primary-subtle text-primary px-2 py-1 fs-13 fw-normal">native</span> , Bitish, Turkish </span></span> --}}
                                                </div>
                                            </div>
                                        </div>

                                            <div class="tab-pane active show pt-4" id="profile_about" role="tabpanel">
                                               
                                            </div><!-- end Experience -->

                                                <div class="row">

                                                    <div class="row">
                                                        <div class="col-lg-6 col-xl-6">
                                                            <div class="card border mb-0">

                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">                      
                                                                            <h4 class="card-title mb-0">Personal Information</h4>                      
                                                                        </div><!--end col-->                                                       
                                                                    </div>
                                                                </div>

                                                         {{-- <form method="post" action="#" enctype="multipart/form-data"> --}}
                                                         <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                                            @csrf
                                                                <div class="card-body">
                                                                    <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" class="form-control" type="text"  value="{{ $editData-> name }}" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

              {{-- <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="text" value="{{ $editData-> email }}"  id="example-text-input">
                </div>
            </div> --}}
            <!-- end row -->


              {{-- <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">UserName</label>
                <div class="col-sm-10">
                    <input name="username" class="form-control" type="text"  value="{{ $editData-> name }}"  id="example-text-input">
                </div>
            </div> --}}
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Contact No</label>
                <div class="col-sm-10">
                    <input name="phone" class="form-control" type="text"  id="phone" value="{{ $editData->phone }}">
                </div>
            </div>

             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input name="address" class="form-control" type="text"  id="address" value="{{ $editData->address }}">
                </div>
            </div>


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                <div class="col-sm-10">
       <input name="photo" class="form-control" type="file"  id="image">
                </div>
            </div>



              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->photo))? url('upload/admin_images/'.$editData->photo):url('upload/no-image.jpg') }}" alt="Card image cap">
                </div>
            </div>

                                                                     <div class="form-group row">
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <button type="submit" class="btn btn-primary">Update Changes</button>
                                                                            
                                                                        </div>
                                                                    </div>

                                                                </div><!--end card-body-->
                                                                

                                                         </form>    
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-xl-6">
                                                            <div class="card border mb-0">

                                                                <div class="card-header">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">                      
                                                                            <h4 class="card-title mb-0">Change Password</h4>                      
                                                                        </div><!--end col-->                                                       
                                                                    </div>
                                                                </div>


                                                                <form method="post" action="{{ route('update.password') }}" >
                                                                @csrf
                                                                    <div class="card-body mb-0">
                                                                    <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                    <input name="oldpassword" class="form-control" type="password"   id="oldpassword">
                </div>
            </div>
            <!-- end row -->


             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                <input name="newpassword" class="form-control" type="password"  id="newpassword">
                </div>
            </div>
            <!-- end row -->



             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                </div>
            </div>
            <!-- end row -->

                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                                                            {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                                                        </div>
                                                                    </div>

                                                                </div><!--end card-body-->
                                                                </form>



                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!-- end education -->

                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> 

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
