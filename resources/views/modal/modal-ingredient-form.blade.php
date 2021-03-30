<?php
$title = 'Add Ingredient'
?>
@extends('modal.modal-base')
@section('modal-content')
    <!-- form start -->
    <form id="ingredientForm" action="{{url('ingredients/post')}}" method="POST">
        {{ csrf_field() }}
        {{--Ingredient Name--}}
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Enter Ingredient Name" name="name">
        </div>
        @if ($errors->has('name'))
            <label id="errorLabelName" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</label>
        @endif
        <div class="form-row">
            <div class="col">
                {{--Amount--}}
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input value="{{ old('amount') }}" type="text" class="form-control" id="amount" placeholder="Hou Much Amount Need?" name="amount">
                </div>
                @if ($errors->has('amount'))
                    <label id="errorLabelAmount" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('amount') }}</label>
                @endif
            </div>

            <div class="col">
                {{--Unit--}}
                <div class="form-group">
                    <label for="unit">Select Unit</label>
                    <select id="unit" class="form-control" name="unit">
                        <option value="TBSP">Tablespoon(s)</option>
                        <option value="TSP">Teaspoon(s)</option>
                        <option value="LARGE">Large</option>
                        <option value="STICK">Stick(s)</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('modal-button')
    <button type="submit" class="btn btn-primary" form="ingredientForm">Submit</button>
@endsection
