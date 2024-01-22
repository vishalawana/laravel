
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>
<body class= "">
    <div style="color:blue;font-size:46px; display: flex;
    justify-content: space-between;">
    <nav class="navbar navbar-light " >
        <form class="form-inline ">
        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="post">
                @csrf
                
                <button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit" href="{{ route('logout') }}">
                    Logout</button>
            </form>
          <a href = "{{route('form.edit',['id'=>$user->id])}}"><button class="btn btn-sm btn-outline-secondary" type="button">Edit</button></a>
        </form>
      </nav>
    </div>
    <div class="container  mx-auto">
        <h3 class="d-flex justify-content-center">Welcome to Dashboard!</h3>

        <table class="table bg-dark">
            <thead class= "bg-prinary">
                <tr> 
                    <!-- <th scope="col">User Id</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Dob</th>
                    <th scope="col">gender</th>
                    <th scope="col">courses</th>
                    <th scope="col">city</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                
               
            </thead>
            <tbody>
                <tr>
                    {{-- <td id="userId"></td>  --}}
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->userDetail->contact}}</td>
                    <td >{{$user->userDetail->dob}}</td>
                    <td >{{$user->userDetail->gender}}</td>
                    <td >
                        @foreach($courses as $course)
                        {{$course->course}}
                        @endforeach
                    </td>
                    <td >{{$user->userDetail->city}}</td>
                    <td >{{$user->UserDetail->created_at}}</td>
                    <td >{{$user->UserDetail->updated_at}}</td>
                </tr>
            </tbody>
        </table>
{{-- {{$user->userDetail->image}} --}}
<div style="width: 20%; height: 20%; margin: 0 auto; text-align: center;">
    <span id="Image" style="width: 50%; border: none;">
        <img src="{{ asset('/storage/images/' . $user->userDetail->image) }}" alt="Image" style="width: 100%; height: auto;">
    </span>
</div>

{{-- <img src="{{ asset('/storage/images/' . $user->userDetail->image) }}" alt="Image"> --}}
</body>

</html>