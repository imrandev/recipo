@extends('app.index')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <section class="col-sm-12 col-md-10"></section>
            <section class="col-sm-12 col-md-2">
                <button id="btnUserForm" type="button" class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#modalUserForm">Add User</button>
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <form class="form-inline" method="post" action="{{url('user/search')}}" role="search">
                                    @csrf
                                    <input type="text" id="searchQuery" name="query" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button id="btnSearch" type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->type}}</td>
                                        <td>
                                            @if($user->active)
                                                <span class="tag tag-success">Active</span>
                                            @else
                                                <span class="tag tag-success">Blocked</span>
                                            @endif
                                        </td>
                                        <td><strong>{{$user->balance}}</strong> coins</td>
                                        <td>
                                            <div class="form-inline">
                                                <div class="mr-2">
                                                    <button type="submit" class="btn btn-primary"
                                                            data-toggle="modal" data-target-object="{{$user}}"
                                                            data-target="#modalUserForm">Update</button>
                                                </div>
                                                @if(Auth::user()->id != $user->id)
                                                    <form method="post" action="{{url('user/delete', $user->id)}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

{{--User Modal--}}
@include('modal.modal-user-form')
@endsection

@section('script')
<script type="text/javascript">
    let user;
    $(document).ready(function () {

        @if(count($errors) > 0)
            const type = '{{ old('type') }}';
            if(type !== '') {
                $('#type').val(type);
            }
            $('#btnUserForm').trigger( "click" );

            user = findObjectInCookie('update');
            $('#modalTitle').html(user != null ? "Update User" : "Add User");
            if (user != null){
                $('#userId').val(user.id);
                $('#name').val(user.name);
                $('#email').val(user.email);
                $('#password').val(user.password);
                $('#type').val(user.type);

                clearCookieObject('update');
                user = null;
            }
        @endif

        $("#modalUserForm").on("show.bs.modal", function (e) {
            user = $(e.relatedTarget).data('target-object');
            $('#modalTitle').html(user != null ? "Update User" : "Add User");
            if (user != null){
                setObjectInCookie('update', user);
                $('#userId').val(user.id);
                $('#name').val(user.name);
                $('#email').val(user.email);
                $('#password').val(user.password);
                $('#type').val(user.type);
            }
        });

        $("#modalUserForm").on("hidden.bs.modal", function () {
            user = null;
            clearCookieObject('update');
            $(this).find('form').trigger('reset');
            $('#errorLabelPassword').html('');
            $('#errorLabelName').html('');
            $('#errorLabelEmail').html('');
        });
    });

    document.getElementById("searchQuery").addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.key === 'Enter') {
            $('#btnSearch').trigger( "click" );
        }
    });
</script>
@endsection
