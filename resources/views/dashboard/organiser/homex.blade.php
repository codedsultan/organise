<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organiser Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 45px">
                 <h4>Organiser Dashboard</h4><hr>
                 <table class="table table-striped table-inverse table-responsive">
                     <thead class="thead-inverse">
                         <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <!-- <th>Organisation</th> -->
                             <th>Action</th>
                         </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td scope="row">{{ Auth::guard('organiser')->user()->name }}</td>
                                 <td>{{ Auth::guard('organiser')->user()->email }}</td>
                                 <!-- <td>{{ Auth::guard('organiser')->user()->organisation }}</td> -->
                                 <td>
                                     <a href="{{ route('organiser.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('organiser.logout') }}" id="logout-form" method="post">@csrf</form>
                                 </td>
                             </tr>
                         </tbody>
                 </table>
            </div>
        </div>
    </div>

</body>
</html>
