
@extends('layouts/master')

@section('title','заказ')

@section('content')


<form method="POST" action="{{route('createAcc')}}">



    @csrf
    @error('name')
    <div class=" alert alert-danger"> {{$message}} </div>
    @enderror
    <div class="form-group row">

        <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{old('name',isset(Auth::User()->name)? Auth::User()->name :null)}}">

        </div>
    </div>

    @error('email')
    <div class=" alert alert-danger"> {{$message}} </div>
    @enderror
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control"
                   name="email" value="{{old('email',isset(Auth::User()->name)? Auth::User()->name :null)}}" >

        </div>
    </div>

    @error('phone')
    <div class=" alert alert-danger"> {{$message}} </div>
    @enderror
    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

        <div class="col-md-6">
            <input id="phone" type="phone" class="form-control"
                   name="phone" value="{{old('phone',isset(Auth::User()->name)? Auth::User()->name :null)}}" >

        </div>
    </div>


    @error('city')
    <div class=" alert alert-danger"> {{$message}} </div>
    @enderror
    <div class="form-group row">
        <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

        <div class="col-md-6">
            <input id="city" type="phone" class="form-control"
                   name="city" value="{{old('city',isset(Auth::User()->name)? Auth::User()->name :null)}}" >

        </div>
    </div>

    @error('street')
    <div class=" alert alert-danger"> {{$message}} </div>
    @enderror
    <div class="form-group row">
        <label for="street" class="col-md-4 col-form-label text-md-right">Адрес</label>

        <div class="col-md-6">
            <input id="street" type="street" class="form-control"
                   name="street" value="{{old('street',isset(Auth::User()->name)? Auth::User()->name :null)}}" >

        </div>
    </div>

    @error('mail_index')
    <div class=" alert alert-danger"> {{$message}} </div>
    @enderror
    <div class="form-group row">
        <label for="mail_index" class="col-md-4 col-form-label text-md-right">Почтовый индекс</label>

        <div class="col-md-6">
            <input id="mail_index" type="mail_index" class="form-control"
                   name="mail_index" value="{{old('mail_index',isset(Auth::User()->name)? Auth::User()->name :null)}}" >

        </div>
    </div>



    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Готово
            </button>
        </div>
    </div>


</form>

@endsection
