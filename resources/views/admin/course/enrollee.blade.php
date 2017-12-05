@extends('layouts.app')

@section('content')
    <div class="container" style='margin-top:100px; margin-bottom: 200px'>
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Course Enrollees</div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama</th><th>Profesi</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enrollee as $item)
                                    <!-- {{ $item }} -->
                                    <tr>
                                        <td>{{ $item->users->name }}</td><td>{{ get_user_profesi($item->users->id) }}</td>
                                        <td>
                                          <a href="https://www.qureta.com/profile/edit/{{ $item->users->id }}" title="Edit Profile"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile </button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $enrollee->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
