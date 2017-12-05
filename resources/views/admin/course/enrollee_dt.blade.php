@extends('layouts.app')

@section('content')
    <div class="container" style='margin-top:100px; margin-bottom: 200px'>
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Course</div>
                    <div class="panel-body">
                      <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Profesi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                      @stop

                      @push('scripts')
                      <script>
                      $(function() {
                        $('#datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{!! url('/admin/course/enrollees/data/'.$courseid) !!}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'name' },
                            ]
                        });
                      });
                      </script>
                      @endpush

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
