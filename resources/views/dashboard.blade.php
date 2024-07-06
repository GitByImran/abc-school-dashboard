<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Dashboard</title>
</head>

<body>

    <nav class="">
        <div class="container custom-navbar">
            <h2 class="logo">abc school</h2>
            <div class="user-info">
                <p class="logged-user"><i class="fas fa-user-gear"></i>
                    @if(Session::has('username'))
                    <span>{{ Session::get('username') }}</span>
                    @endif
                </p>
                <a href="#" class="logout-button">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container contents">
        <div class="left">
            <form action="{{ url('addOrUpdateStudentProcess') }}" method="POST" class="student-form" id="student-form">
                @csrf
                <input type="hidden" id="student_id" name="id" value="{{ isset($editStudent) ? $editStudent->id : '' }}">
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="number" id="class" name="class" required value="{{ isset($editStudent) ? $editStudent->class : '' }}">
                </div>
                <div class="form-group">
                    <label for="roll">Roll</label>
                    <input type="number" id="roll" name="roll" required value="{{ isset($editStudent) ? $editStudent->roll : '' }}">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required value="{{ isset($editStudent) ? $editStudent->name : '' }}">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" required value="{{ isset($editStudent) ? $editStudent->age : '' }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required value="{{ isset($editStudent) ? $editStudent->address : '' }}">
                </div>
                <button type="submit" class="submit-button">{{ isset($editStudent) ? 'Update Student' : 'Add Student +' }}</button>
                @if(isset($editStudent))
                <a href="{{ url('/') }}" class="cancel-button">Cancel</a>
                @endif
            </form>

            @if(Session::has('saveSuccess'))
            <h2 class="show-message">{{ Session::get('saveSuccess') }}</h2>
            @endif

            @if(Session::has('updateSuccess'))
            <h2 class="show-message">{{ Session::get('updateSuccess') }}</h2>
            @endif

        </div>
        <div class="right">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Class</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($students->count() > 0)
                    @foreach($students as $key=>$student)
                    <tr>
                        <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->roll }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <button class="edit-button"><a href="{{ url('editStudent/' . $student->id) }}"><i class="fas fa-pen-to-square"></i></a></button>
                            <button class="delete-button"><a href="{{ url('deleteStudent/' . $student->id) }}"><i class="fas fa-trash"></i></a></button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" class="no-data">No data added yet</td>
                    </tr>
                    @endif
                </tbody>
            </table>


            @if(Session::has('deleteSuccess'))
            <h2 class="show-message">{{ Session::get('deleteSuccess') }}</h2>
            @endif

            <div class="pagination-links">
                {{$students->links()}}
            </div>
        </div>
    </div>
</body>

</html>