@extends('layouts.index')

<form action="{{route('famillies.insertMember')}}" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto" style="padding-top: 50px">
                <div class="mb-3">
                    <label for="name" class="form-label">enter member email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="enter member emailk">
                </div>



                <div class="col-12">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
</form>
@if($errors->any())

    <div style="margin-top: 5%" class="alert alert-warning" role="alert">
        @foreach($errors->all() as $error)

            <li>{{$error}}</li>

        @endforeach
    </div>

@endif
