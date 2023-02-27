@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>Home Page Icons</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form class="forms-sample" action="{{ url('admin/home/icons/update') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">

                <?php $x = 1; ?>
                @foreach($data as $item)
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Icon {{ $x }} Content</label>
                                            <input type="text" class="form-control" name="pageData[{{ $item->id }}][content]"  value="{{ $item->content }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Icon {{ $x }} Image</label><br/>
                                            <img src="{{ asset('public/'.$item->photo) }}" width="100"><br/><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="pageData[{{$item->id}}][photo]"  value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Icon {{ $x }} Image</label><br/>
                                            <img src="{{ asset('public/'.$item->photo_active) }}" width="100" style="background-color: #000"><br/><br/>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" name="pageData[{{$item->id}}][photo_active]"  value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $x++; ?>
                @endforeach

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
