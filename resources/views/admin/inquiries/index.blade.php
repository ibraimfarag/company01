@extends('admin.partials.master')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5>Inquiries</h5><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <tr>
                                        <th onclick="sortTable(0)">IP</th>
                                        <th onclick="sortTable(0)">Date</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($entries as $item)
                                        <tr>
                                            <td>{{ $item->ip }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ URL('admin/contacts/view/'.$item['id']) }}">View</a>
                                                |
                                                <a href="{{ URL('admin/contacts/delete/'.$item['id']) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card pagi">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
