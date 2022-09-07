@extends('layouts.index')

<form action="{{route('tasks.update',[ $task->id ,'personal'=>$personal])}}" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto" style="padding-top: 50px">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}" placeholder="enter you product name">
                </div>
                <div class="mb-3">
                    <label for="description " class="form-label">description</label>
                    <input type="text" class="form-control" id="description " value="{{$task->description}}" name="description" placeholder="enter you description  name">
                </div>
                <div class="mb-3">
                    <label for="date " class="form-label">date</label>
                    <input type="date" class="form-control" id="date " name="date" value="{{$task->due_date}}"  placeholder="enter due date  ">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
</form>
@if($errors->any())

    <div style="margin-top: 5%" class="alert alert-warning" role="alert">
        @foreach($errors->all() as $error)

            <li>{{$error}}</li>

        @endforeach
    </div>

@endif
