

<x-app-layout>


    @if(!$familly_id)


        <div class="card" style="width: 100%;">
            <div class="card-header" style="background-color: #e3e3e3">
                welcome to families
            </div>
            <div class="card-body" style="background-color: #fcf4d9;">

                <p  style="display:inline" class="card-text">connect with your familly and manage yout tasks together!!</p>
            </div>
        </div>

        <div class="alert alert-light" role="alert" style="width: 50%; margin-left: auto; margin-right:auto; margin-top: 5%">
            It appears you are not a fazmilly member yet click here to create a new familly</p>
            <a href="{{route('famillies.create')}}" style="background-color: white" class="btn btn-info btn-sm">Create  Familly</a>
            <img style="float: right" class="circle-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTZBB8cQhkFBTE2OUpOsu8LwX6h4IaPLU2gw&usqp=CAU">
        </div>

    @else


    <div class="card" style="width: 100%;">

        <div class="card-body">


            <h5 class="card-title">welcome to our familly   </h5>
            <p class="card-text">Familly tasks</p>

        </div>
    </div>
        @if($tasks->isEmpty() and $tasks1->isEmpty() and $tasks2->isEmpty())
            <div class="alert alert-light" role="alert" style="width: 50%; margin-left: auto; margin-right:auto; margin-top: 5%">
                It appears you have no tasks yet click here to create a new task</p>
                <a href="{{route('famillies.createTask')}}" style="background-color: white" class="btn btn-info btn-sm">add task</a>
                <img style="float: right" class="circle-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ0e7YVL5nBwg4e2hHHWqj6fH1SdvzcFMQLg&usqp=CAU">
            </div>

        @else
    <div class="card" style="width: 100%;background-color: linen">
        <div class="card-body">
            <h5 class="card-title">Familly Tasks</h5>
            <a href="{{route('famillies.createTask')}}" style="background-color: white" class="btn btn-info btn-sm">add task</a>
        </div>
    </div>
            <div style="   width: 33%;height: available ;float:left; /* add this */  ">
                <h2 style="margin-top: 20px; margin-left: 3%">Todays tasks</h2>
    @foreach($tasks as $task)

        <div class="card" style="width: 33%;float:left; display: flex;	flex-direction: column;	 border-color: coral; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;">
            <div class="card-body">
                <p class="card-title">  Title : {{$task->title}}</p>
                <p class="card-text">description : {{$task->description}}</p>
                <p class="card-text">due-date : {{$task->date}}</p>
                <a href="{{ route('tasks.edit',  [ $task->id ,'personal'=>0]) }}" class="btn btn-info btn-sm">edit</a>
                <a href="{{ route('tasks.delete',  [ $task->id ,'personal'=>0]) }}" class="btn btn-info btn-sm">delete</a>
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

                <h2 style="margin-top: 20px">Up coming tasks</h2>
                @foreach($tasks1 as $task)


                        <div class="card" style="width: auto;float:left; display: flex;	flex-direction: column;	 border-color: black; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;  ">
                            <div class="card-body">
                                <p class="card-title" style="">Title : {{$task->title}}</p>
                                <p class="card-text">description: {{$task->description}}</p>
                                <p class="card-text">due date {{$task->date}}</p>
                                <a href="{{ route('tasks.edit', [ $task->id ,'personal'=>0]) }}" class="btn btn-info btn-sm">edit</a>
                                <a href="{{ route('tasks.delete',  [ $task->id ,'personal'=>0]) }}" class="btn btn-info btn-sm">delete</a>
                            </div>
                        </div>

                @endforeach
                @if($tasks1->isEmpty())

                    <div style="margin-top: 30%;width: 75%;margin-left: auto; margin-right: auto;" class="alert alert-info" role="alert">
                        it appears u have no ucoming tasks!!
                    </div>
                @endif

            </div>
            <div style="width: 33%;  float: left; /* add this */">

                <h2 style="margin-top: 20px">overdue tasks</h2>
                @foreach($tasks2 as $task)


                        <div class="card" style="width: auto;float:left; display: flex;	flex-direction: column;	 border-color: black; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;  ">
                            <div class="card-body">
                                <p class="card-title" style="">Title : {{$task->title}}</p>
                                <p class="card-text">description: {{$task->description}}</p>
                                <p class="card-text">due date {{$task->date}}</p>
                                <a href="{{ route('tasks.edit', [ $task->id ,'personal'=>0]) }}" class="btn btn-info btn-sm">edit</a>
                                <a href="{{ route('tasks.delete',  [ $task->id ,'personal'=>0]) }}" class="btn btn-info btn-sm">delete</a>
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
    @endif

    <footer>
        <p>Copyright ⓒ2022 </p>
    </footer>
</x-app-layout>




