@extends('layouts.app')

@section('content')
    <div class="container" style='margin-top:100px; margin-bottom: 200px'>
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">User</div>
                    <div class="panel-body">
                        <!-- <a href="{{ url('/admin/user/create') }}" class="btn btn-success btn-sm" title="Add New user">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/user', 'class' => 'navbar-form', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Email</th><th>Profession</th><th>Status</th><th>Role</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->profession }}</td><td>{{ $item->status }}</td><td>{{ $item->role }}</td>
                                        <td>
                                            <input class="change-status" type="checkbox" data-size="small" data-on-color="success" <?= ($item->status == 'active')?"checked":""; ?> data-toggle="toggle" >
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $user->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".change-status").bootstrapSwitch();

        $(".change-status").click(function(){
            console.log('aaaa')
        });
    </script>
@endsection
