@extends('layouts.index')

<x-app-layout>

    @if(!$user->familly_id)


        <div class="alert alert-light" role="alert" style="width: 50%; margin-left: auto; margin-right:auto; margin-top: 5%">
            It appears you are not a fazmilly member yet click here to create a new familly</p>
            <a href="{{route('famillies.create')}}" style="background-color: white" class="btn btn-info btn-sm">Create  Familly</a>
            <img style="float: right" class="circle-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTZBB8cQhkFBTE2OUpOsu8LwX6h4IaPLU2gw&usqp=CAU">
        </div>



    @else

        <div style="   " class="card text-center">
            <div style="background-color: #faf5e4" class="card-header">
                <p>  welcome to our familly  </p>
            </div>
            <div style="background-color: #faf5e4" class="card-body">

                <p class="card-text">familly members</p>

            </div>

        </div>


<form method="post">
<table class="table" style="width: 75%; margin-left: auto; margin-right:auto; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; background-color: white">
    <thead>

    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <th scope="col">{{$member->name}}</th>
            <th scope="col">{{$member->email}}</th>

          @if($user->id ==$member->id)
                <th>  <a href="{{route('famillies.kick',$member->id)}}" style="background-color: white" class="btn btn-outline-danger">Leave</a></th>
            @else

           <th>  <a href="{{route('famillies.kick',$member->id)}}" style="background-color: white" class="btn btn-outline-danger">kick</a></th>
                @endif
        </tr>
    @endforeach


    </tbody>
<tfoot>

<tr>

   <th>  <a href="{{route('famillies.addMember')}}" style="background-color: white" class="btn btn-info btn-sm">Add member</a></th>
    <th> <a href="{{ route('famillies.delete', $user->familly_id) }}" class="btn btn-danger"> destroy familly</a></th>

</tr>

</tfoot>


</table>
</form>
    @endif
</x-app-layout>
