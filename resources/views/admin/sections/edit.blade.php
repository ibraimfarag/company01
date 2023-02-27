@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $pageSlug }} Contents</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form class="forms-sample" action="{{ url('admin/sections/update') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                <input type="hidden" value="{{ $pageSlug }}" name="page">

                @foreach($data as $item)

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                    @if($item['type']=='text')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }} </label>
                                <input type="text" class="form-control" name="pageData[{{ $item['slug'] }}][content]"  value="{{ $item['content'] }}">
                            </div>
                        </div>
                    @elseif($item['type']=='image')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ isset($item['name']) ? $item['name'] : $item['slug'] }} </label><br/>
                                <img src="{{ asset('public/'.$item['content']) }}" width="200"><br/><br/>
                                <input type="file" accept="image/x-png,image/gif,image/jpeg" name="pageData[{{$item['slug']}}][content]"  value="" class="form-control">
                            </div>
                        </div>
                    @elseif($item['type']=='video')
                        <div class="col-md-12">
                            <video width="320" height="240" controls>
                                <source src="{{ asset(''.$item['en']) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <br/>
                            <br/>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }}</label><br/>
                                <input type="file" accept="video/mp4" name="pageData[{{$item['slug']}}][content]"  value="" class="form-control">
                            </div>
                        </div>
                    @elseif($item['type']=='external_video')
                        <div class="col-md-12">
                            <iframe height="480" width="500"
                                    src="{{ $item['content'] }}">
                            </iframe>
                            <br/>
                            <br/>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }}</label><br/>
                                <input type="text" name="pageData[{{$item['slug']}}][content]"  value="{{$item['content']}}" class="form-control">
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ isset($item['title']) ? $item['title'] : $item['slug'] }}</label>
                                <input type="hidden" name="pageData[{{$item['slug']}}][content]"  value="{{$item['content']}}">
                                <div class="summernote">
                                    {!! $item['content'] !!}
                                </div>
                            </div>
                        </div>
                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
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
