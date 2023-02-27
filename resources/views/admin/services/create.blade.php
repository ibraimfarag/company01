@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Create Service</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/services/store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <hr/>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <input type="hidden" name="content" value="">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content Bottom</label>
                                            <input type="hidden" name="content_bottom" value="">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>
                                <h3>Items</h3>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="item[0][title]" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Photo</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image[0]"  value="" class="form-control" multiple >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <input type="hidden" name="item[0][content]" value="">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="item[1][title]" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Photo</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image[1]"  value="" class="form-control" multiple >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <input type="hidden" name="item[1][content]" value="">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="item[2][title]" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Photo</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image[2]"  value="" class="form-control" multiple >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <input type="hidden" name="item[2][content]" value="">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn-success" value="Save">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
