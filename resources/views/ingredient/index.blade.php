@extends('app.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ingredients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ingredients</li>
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
                    <button id="btnAddIngredient" type="button"
                            class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#modal-lg">Add Ingredient</button>
                </section>
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Ingredients</h3></div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ingredients as $ingredient)
                                    <tr>
                                        <td>{{$ingredient->name}}</td>
                                        <td>{{$ingredient->amount}}</td>
                                        <td>{{$ingredient->unit}}</td>
                                        <td>
                                            <form method="post" action="{{url('ingredients/delete', $ingredient->id)}}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    {{--Question Modal--}}
    @include('modal.modal-ingredient-form')
@endsection

@section('script')
    <script type="text/javascript">
        $( document ).ready(function() {
            @if(count($errors) > 0)
            const subject = '{{ old('subject') }}';
            if(subject !== '') {
                $('#subject').val(subject);
            }
            $('#btnAddIngredient').trigger( "click" );
            @endif

            $("#modal-lg").on("hidden.bs.modal", function () {
                $(this).find('form').trigger('reset');
                $('#errorLabelQuestion').html('');
                $('#errorLabelAnswer').html('');
                $('#errorLabelOne').html('');
                $('#errorLabelTwo').html('');
                $('#errorLabelThree').html('');
                $('#errorLabelFour').html('');
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
