<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 
    <title>Form-Bootstrap-Demo</title>
</head>
 
    <nav class="navbar navbar-expand-md bg-info mb-5">
        <a class="navbar-brand mx-4" href="#">Rubico</a>
        <div class="collapse navbar-collapse " id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://rubicotech.in/">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://rubicotech.in/">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://rubicotech.in/">contact us</a>
                </li>
            </ul>
        </div>
        <div class="justify-content-end mx-5">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="https://rubicotech.in/" target="_blank">Sign In</a>
                </li>
            </ul>
        </div>
    </nav>
<body>
        

    


    <h2 class="text-center">Personal Details</h2>
    <div class="container bg-warning border border-dark shadow p-5 mb-5 rounded">
      
         <form method = "POST" action = "{{route('store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <!-- Name -->
            <div class="form-outline mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="Name"
                    placeholder="Enter your name" name = "name" value = "{{old('name')}}">
                    <br>
                    <small id="showErrorName" class="text-danger">
                        @error('name')
                        {{$message}}
                        @enderror

                    </small>
            </div> 
             <div class="form-outline mb-3"> 
                <label for="userName" class="form-label">User Name:</label>
                <input type="text" class="form-control" id="userName"
                    placeholder="Enter your user_name" name = "username" value = "{{old('username')}}">
                    <br>
                    <small id="showErrorName" class="text-danger">
                        @error('username')
                        {{$message}}
                        @enderror

                    </small>
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="userEmail" class="form-label">Email address:</label>
                <input type="text" class="form-control" id="userEmail" aria-describedby="emailHelp" name = "email" value = "{{old('email')}}"
                    placeholder="Enter your email">
                    <br>
                    <small class="text-danger" id="showErrorEmail">
                        @error('email')
                        {{$message}}
                        @enderror
                    </small>
            </div>
            <!-- password -->
            <div class="mb-3">
                <label for="userPassword" class="form-label">Password:</label>
                <input type="password" class="form-control" id="userPassword" placeholder="Enter your passsword" name = "password">
                <br>
                <small id ="showErrorPassword" class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </small>
            </div>
            <!-- mobile -->
            <div class="mb-3">
                <label for="userMobile" class="form-label">Mobile no:</label>
                <input type="text" class="form-control" id="userMobile" placeholder="000-000-0000" name = "contact" vlaue = "{{old('contact')}}">
                <br>
                <small id="showErrorMobile" class="text-danger">
                    @error('contact')
                    {{$message}}
                    @enderror
                </small>
            </div>
            <!-- dob -->
            <div class="mb-3">
                <label for="userDob" class="form-label">Date of birth</label>
                <input type="date" class="form-control" id="userDob" name ="dob" value = "{{old('dob')}}">
                <br>
                <small id ="showErrorDob" class="text-danger">
                    @error('dob')
                    {{$message}}
                    @enderror
                </small>
            </div>
            {{-- profile --}}
            <div class="mb-3">
                <label for="formFile" class="form-label"> Profile Pic:</label>
                <input class="form-control" type="file" id="formFile" name = "profile">
                <br>
                 <small class="text-danger">
                    @error('profile')
                    {{$message}}
                    @enderror
                    </small> 
            </div>

            <!-- gender -->
            <div class="container">
                <h6>Gender:</h6>
                <div class="form-check">
                    <input class="form-check-input userGender" type="radio" name="gender" id="male" value = "male" {{ old('gender') == 'male' ? 'checked' : '' }} />
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input userGender" type="radio" name="gender" id="female" value = "female" {{ old('gender') == 'female' ? 'checked' : '' }} />
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <small class="text-danger" id="showErrorGender">
                    @error('gender')
                    {{$message}}
                    @enderror
                </small>
            </div>
               <!-- Courses -->
               <div class="container">
                <h6>Courses:</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="courses[]" value="B.tech" {{ in_array('B.tech', old('courses', [])) ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexCheckDefault">B.Tech</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input Mca" type="checkbox" id="flexCheckChecke" name="courses[]" value="Mca" {{ in_array('Mca', old('courses', [])) ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexCheckChecke">MCA</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input Bca" type="checkbox" id="flexCheckChecked" name="courses[]" value="Bca" {{ in_array('Bca', old('courses', [])) ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexCheckChecked" id="Bca">BCA</label>
                </div>
                <small id="errorCourse" class="text-danger">
                    @error('courses')
                    {{ $message }}
                    @enderror
                </small>
            </div>
            
            <!-- City Dropdown -->
            <h6 class="mx-3">City:</h6>
            <div class="btn-group mx-3 mb-3 ">
                <select class="border border-dark rounded p-1 bg-primary cities" aria-label="Default select example" id ="city" name ="city" >
                    <option value="0">Select your city</option>
                    <option value="haridwar" {{ old('city') == 'haridwar' ? 'selected' : '' }}>Haridwar</option>
                    <option value="roorkee"{{ old('city') == 'roorkee' ? 'selected' : '' }}>Roorkee</option>
                    <option value="meerut"{{ old('city') == 'meerut' ? 'selected' : '' }}>Meerut</option>
                    <option class= "line-break" value="other">Others</option>
                </select>
                <small class="text-danger" id="showErrorCity">
                    @error('city')
                    {{$message}}
                    @enderror
                </small>
            </div> 
            <button type="submit" class="btn btn-primary rounded-pill w-100 mb-1 p-1">Submit</button> 
        </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
<div id="includeFooter"></div>
<!-- Footer -->
    <!-- <iframe src="footer.html" width="100%" height="270px" frameborder="0"></iframe> -->
    <footer class="text-center text-lg-start bg-info text-white text-center">
        <div class="  text-center">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <p><i class="fas fa-home "></i>Sector 12 near pantagon mall</p>
            <p>
                <i class="fas fa-envelope "></i>
                info@rubico.com
            </p>
            <p><i class="fas fa-phone "></i> + 91 000 000 00</p>
            <p><i class="fas fa-print"></i> + 91 000 000 00</p>
        </div>
        </div>
        </div>
        </section>
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://rubicotech.in/">Rubico.in</a>
        </div>
    </footer>

</html>