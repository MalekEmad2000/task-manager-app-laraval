

<x-app-layout >

    <div class="card" style="width: 100%; ">
        <div class="card-header" style="background-color: #e3e3e3">
            Manage personal tasks
        </div>
        <div class="card-body" style="background-color: #fcf4d9;">
            <h5 style="" class="card-title">welcome back {!! $name->name !!}  </h5>
            <p  style="display:inline" class="card-text">your task are waiting</p>
        </div>
    </div>




    @if($tasks->isEmpty())
        <div class="alert alert-light" role="alert" style="width: 50%; margin-left: auto; margin-right:auto; margin-top: 5%">
            It appears you have no tasks yet click here to create a new task</p>
            <a href="{{route('tasks.create')}}" style="background-color: white" class="btn btn-info btn-sm">add task</a>
            <img style="float: right" class="circle-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn-yWDriVYFzCH-BrdOtV79uO0izSr2GJvjQ&usqp=CAU">
        </div>

    @else
        <div class="card" style="background-image:  width:100%;background-color: #fcfefe">
            <div class="card-body">
                <h5 style="display: inline" class="card-title">My Tasks</h5>
                <a href="{{route('tasks.create')}}" style="background-color: white;margin-left: 70%" class="btn btn-info btn-sm">add task</a>
            </div>

        </div>

    @foreach($tasks as $task)
        <div class="card" style="width: auto;float:left; display: flex;	flex-direction: column;	 border-color: black; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;  ">
            <div class="card-body">
                <p class="card-title" style="">Title : {{$task->title}}</p>
                <p class="card-text">description: {{$task->description}}</p>
                <p class="card-text">due date {{$task->date}}</p>
                <a href="{{ route('tasks.edit',  $task->id) }}" class="btn btn-info btn-sm">edit</a>
                <a href="{{ route('tasks.delete',  $task->id) }}" class="btn btn-info btn-sm">delete</a>
            </div>
        </div>
    @endforeach
    @endif
    <footer>
        <p>Copyright ⓒ </p>
    </footer>
</x-app-layout>




