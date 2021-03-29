<?php
    $title = 'Add Recipe'
?>
@extends('modal.modal-base')
@section('modal-content')
    <!-- form start -->
    <form id="recipeForm" action="{{url('recipe/post')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{--Title--}}
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ old('title') }}" type="text" class="form-control" id="title" placeholder="Enter Recipe Title" name="title">
        </div>
        @if ($errors->has('title'))
            <label id="errorLabelTitle" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('title') }}</label>
        @endif
        {{--Ingredients List--}}
        <div class="form-group">
            <label class="w-100" for="ingredients">Ingredients</label>
            <input value="{{ old('ingredients') }}" type="text" class="form-control" id="ingredients" placeholder="Enter Ingredients" name="ingredients" data-role="tagsinput">
        </div>
        @if ($errors->has('ingredients'))
            <label id="errorLabelIngredients" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('ingredients') }}</label>
        @endif

        {{--Instructions--}}
        <div class="form-group">
            <label for="instructions">Instructions</label>
            <input value="{{ old('instructions') }}" type="text" class="form-control" id="instructions" placeholder="Enter Instructions" name="instructions">
        </div>
        @if ($errors->has('instructions'))
            <label id="errorLabelInstructions" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('instructions') }}</label>
        @endif


        <div class="form-row">
            <div class="col">
                {{--Cook Time--}}
                <div class="form-group">
                    <label for="cookTime">Cook Time</label>
                    <input value="{{ old('cookTime') }}" type="text" class="form-control" id="cookTime" placeholder="Enter Cook Time" name="cookTime">
                </div>
                @if ($errors->has('cookTime'))
                    <label id="errorLabelCookTime" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('cookTime') }}</label>
                @endif
            </div>

            <div class="col">
                {{--Cook Time Type--}}
                <div class="form-group">
                    <label for="cookTimeType">Select Cook Time Type</label>
                    <select id="cookTimeType" class="form-control" name="cookTimeType">
                        <option value="HR">Hours</option>
                        <option value="MIN">Minutes</option>
                        <option value="SEC">Seconds</option>
                    </select>
                </div>
            </div>
        </div>

        {{--Source--}}
        <div class="form-group">
            <label for="optionThree">Source</label>
            <input value="{{ old('source') }}" type="text" class="form-control" id="source" placeholder="Enter source" name="source">
        </div>
        @if ($errors->has('source'))
            <label id="errorLabelSource" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('source') }}</label>
        @endif

        <div class="form-row">
            <div class="col">
                {{--Upload Image--}}
                <div class="form-group">
                    <label for="imgSrc">Upload recipe image file</label>
                    <input type="file" class="form-control-file" name="imgSrc" id="imgSrc">
                </div>
                @if ($errors->has('imgSrc'))
                    <label id="errorLabelImgSrc" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('imgSrc') }}</label>
                @endif
            </div>

            <div class="col">
                <div class="form-group">
                    <div class="icheck-primary">
                        <input type="checkbox" id="private" name="private">
                        <label for="private">
                            Make private
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('modal-button')
    <button type="submit" class="btn btn-primary" form="recipeForm">Submit</button>
@endsection
