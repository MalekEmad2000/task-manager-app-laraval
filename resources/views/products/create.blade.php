@extends('layouts.index')

<form action="{{route('products.store')}}" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto" style="padding-top: 50px">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="enter you product name">
                </div>
                <div class="mb-3">
                    <label for="description " class="form-label">description</label>
                    <input type="text" class="form-control" id="description " name="description" placeholder="enter you description  name">
                </div>
                <div class="mb-3">
                    <label for="color " class="form-label">color</label>
                    <input type="text" class="form-control" id="color " name="color" placeholder="enter you description  name">
                </div>
                <div class="mb-3">
                    <label for="price " class="form-label">price</label>
                    <input type="number" class="form-control" id="price " name="price" placeholder="enter you price  ">
                </div>
                <div class="mb-3">
                    <label for="weight " class="form-label">weight</label>
                    <input type="number" class="form-control" id="weight " name="weight" placeholder="enter you weight  ">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
</form>
