@extends('app.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My Recipe</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Recipe</li>
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
                    <button id="btnAddRecipe" type="button" class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#modal-lg">Add Recipe</button>
                </section>
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recipes</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Ingredients</th>
                                    <th>Instructions</th>
                                    <th>Rating</th>
                                    <th>Cook Time</th>
                                    <th>Source</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recipes as $recipe)
                                    <tr>
                                        <td>{{$recipe->title}}</td>
                                        <td>{{$recipe->ingredients}}</td>
                                        <td>{{$recipe->instructions}}</td>
                                        <td>{{$recipe->rating}}</td>
                                        <td>{{$recipe->cook_time}}</td>
                                        <td>{{$recipe->source}}</td>
                                        <td>
                                            <form method="post" action="{{url('recipe/delete', $recipe->id)}}">
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
    @include('modal.modal-recipe-form')
@endsection

@section('script')
    <script type="text/javascript">
        $( document ).ready(function() {
            @if(count($errors) > 0)
            const subject = '{{ old('subject') }}';
            if(subject !== '') {
                $('#subject').val(subject);
            }
            $('#btnAddRecipe').trigger( "click" );
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
