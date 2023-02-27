@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Client</h3>
                            <br/>
                            <br/>
                            <form action="{{ url('admin/clients/update') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="{{ $data->name }}">
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">URL</label>
                                            <input type="text" name="url" class="form-control" id="exampleInputName1" placeholder="" value="{{ $data->url }}">
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Photo</label><br/>
                                            @if($data->photo)
                                                <img src="{{ asset('public/'.$data->photo) }}" width="100">
                                            @endif
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="photo"  value="" class="form-control" multiple required>
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Category</label><br/>
                                            <select class="form-control" name="client_category_id">
                                                @foreach($cats as $cat)
                                                    <option {{ $data->client_category_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

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
