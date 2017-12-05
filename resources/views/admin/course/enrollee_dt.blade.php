@extends('layouts.app')

@section('content')
      <div class="container" style='margin-top:100px; margin-bottom: 200px'>
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Course Enrollees: {{ $course->name }}</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(function() {
  $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! url('/admin/course/enrollees/data/'.$course->id) !!}',
      columns: [
          { data: 'id', name: 'id' },
          { data: 'name', name: 'name' },
          { data: 'meta_value', name: 'user_meta.meta_value' },
          {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
  });
});
</script>
@endpush
