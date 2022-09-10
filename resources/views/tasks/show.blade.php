

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




    @if($tasks->isEmpty() and $tasks1->isEmpty() and $tasks2->isEmpty())
        <div class="alert alert-light" role="alert" style="width: 50%; margin-left: auto; margin-right:auto; margin-top: 5%">
            It appears you have no tasks yet click here to create a new task</p>
            <a href="{{route('tasks.create')}}" style="background-color: white" class="btn btn-info btn-sm">add task</a>
            <img style="float: right" class="circle-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn-yWDriVYFzCH-BrdOtV79uO0izSr2GJvjQ&usqp=CAU">
        </div>

    @else
        <div class="card" style="background-image:  width:100%;background-color: #fcfefe">
            <div style="" class="card-body">
                <h5 style="display: inline; margin-right: 20%" class="card-title" >My Tasks</h5>
                <a href="{{route('tasks.create')}}" style="background-color: white;margin-right: 50%" class="btn btn-info btn-sm">add task</a>


            </div>

        </div>

<div style="   width: 33%;height: available ;float:left; /* add this */  ">
    <h2 style="margin-top: 20px;margin-left: 3%;font-family: cursive">  Todays tasks </h2>
    @foreach($tasks as $task)



        <div class="card" style="width: auto;float:left; display: flex;	flex-direction: column;	 border-color: black; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;  ">
            <div class="card-body">
                <p class="card-title" style="">Title : {{$task->title}}</p>
                <p class="card-text">description: {{$task->description}}</p>
                <p class="card-text">due date {{$task->date}}</p>
                <a href="{{ route('tasks.edit', [ $task->id ,'personal'=>1]) }}" class="btn btn-info btn-sm">edit</a>
                <a href="{{ route('tasks.delete',  [ $task->id ,'personal'=>1]) }}" class="btn btn-info btn-sm">delete</a>
            </div>
        </div>

    @endforeach
    @if($tasks->isEmpty())

        <div style="margin-top: 30%;width: 75%;margin-left: auto; margin-right: auto;" class="alert alert-danger" role="alert">
            it appears u have no tasks today!!
        </div>
    @endif

</div>

<div style="width: 33%;   float: left; /* add this */">

    <h2 style="margin-top: 20px; font-family: cursive">Up coming tasks</h2>
    @foreach($tasks1 as $task)

            <div class="card" style="width: auto;float:left; display: flex;	flex-direction: column;	 border-color: black; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;  ">
                <div class="card-body">
                    <p class="card-title" style="">Title : {{$task->title}}</p>
                    <p class="card-text">description: {{$task->description}}</p>
                    <p class="card-text">due date {{$task->date}}</p>
                    <a href="{{ route('tasks.edit', [ $task->id ,'personal'=>1]) }}" class="btn btn-info btn-sm">edit</a>
                    <a href="{{ route('tasks.delete',  [ $task->id ,'personal'=>1]) }}" class="btn btn-info btn-sm">delete</a>
                </div>
            </div>

    @endforeach
    @if($tasks1->isEmpty())

        <div style="margin-top: 30%;width: 75%;margin-left: auto; margin-right: auto;" class="alert alert-info" role="alert">
            it appears u have no ucoming tasks!!
        </div>
    @endif

</div>
        <div style="width: 33%;height: max-content  ;float: left; /* add this */">
<article style="">
            <h2 style="margin-top: 20px;font-family: cursive;">overdue tasks</h2>
</article>
            @foreach($tasks2 as $task)


                    <div class="card" style="width: auto;float:left; display: flex;	flex-direction: column;	 border-color: black; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;  ">
                        <div class="card-body">
                            <p class="card-title" style="">Title : {{$task->title}}</p>
                            <p class="card-text">description: {{$task->description}}</p>
                            <p class="card-text">due date {{$task->date}}</p>
                            <a href="{{ route('tasks.edit', [ $task->id ,'personal'=>1]) }}" class="btn btn-info btn-sm">edit</a>
                            <a href="{{ route('tasks.delete',  [ $task->id ,'personal'=>1]) }}" class="btn btn-info btn-sm">delete</a>
                        </div>
                    </div>

            @endforeach
@if($tasks2->isEmpty())

                <div style="margin-top: 30%;width: 75%;margin-left: auto; margin-right: auto;" class="alert alert-info" role="alert">
                    it appears u have no over due tasks!!
                </div>
    @endif

        </div>


    @endif

    <footer>
        <p>Copyright ⓒ2022 </p>
    </footer>
</x-app-layout>




