@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Service</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/services/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="{{ $data->name }}" required>
                                        </div>
                                    </div>
                                </div>

                                <hr/>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <input type="hidden" name="content" value="{{ $data->content }}">
                                            <div class="summernote">
                                                {!! $data->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content Bottom</label>
                                            <input type="hidden" name="content_bottom" value="{{ $data->content_bottom }}">
                                            <div class="summernote">
                                                {!! $data->content_bottom !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>
                                <h3>Update an item</h3>
                                @foreach($data->items as $item)
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Title</label>
                                                <input type="text" name="item[{{$item->id}}][title]" class="form-control" id="exampleInputName1" placeholder="" value="{{$item->title}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Photo</label><br/>
                                                <img src="{{ asset('public/'.$item->image) }}" width="100">
                                                <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image[{{$item->id}}]"  value="" class="form-control" multiple >
                                            </div>

                                            <div class="form-group">
                                                <a href="{{ url('admin/services/delete-item/'.$item->id) }}">Delete this item</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Content</label>
                                                <input type="hidden" name="item[{{$item->id}}][content]" value="{{$item->content}}">
                                                <div class="summernote">
                                                    {!! $item->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <h3>Add a new item</h3>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" name="new_item[0][title]" class="form-control" id="exampleInputName1" placeholder="" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Photo</label><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="new_image[0]"  value="" class="form-control" multiple >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Content</label>
                                            <input type="hidden" name="new_item[0][content]" value="">
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
