<?php

    $modalId = 'modalUserForm';
?>
@extends('modal.modal-base')
@section('modal-content')
    <!-- form start -->
    <form id="userForm" action="{{url('user/post')}}" method="POST">
        {{ csrf_field() }}
        @csrf

        {{--User ID--}}
        <input type="hidden" name="id" id="userId">

        {{--Name--}}
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
        </div>
        @if ($errors->has('name'))
            <label id="errorLabelName" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</label>
        @endif
        {{--Email--}}
        <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ old('email') }}" type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
        </div>
        @if ($errors->has('email'))
            <label id="errorLabelEmail" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('email') }}</label>
        @endif
        {{--Password--}}
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
        </div>
        @if ($errors->has('password'))
            <label id="errorLabelPassword" class="text-red mb-3"><i class="fa fa-info-circle"></i> {{ $errors->first('password') }}</label>
        @endif
        {{--Type--}}
        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" class="form-control" name="type">
                <option value="ADMIN">Admin</option>
                <option value="EDITOR">Editor</option>
            </select>
        </div>
    </form>
@endsection

@section('modal-button')
    <button type="submit" class="btn btn-primary" form="userForm">Submit</button>
@endsection
