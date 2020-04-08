<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js" integrity="sha256-3Iu0zFU6cPS92RSC3Pe4DBwjIV/9XKyzYTqKZzly6A8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>SignUp</title>
    <style>
        body {
            font-family: 'SiyamRupali', Arial, sans-serif !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
             <div class=" shadow-lg p-3 mb-5 bg-blue rounded" style="opacity:0.9;background:white">
                 <div class="card-header py-3">
                     <center><h5>List</h5></center>
                 </div>
             <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-striped" id="myTable">
                     <thead class="thead-light" align="center">
                       <tr>
                         <th scope="col">Id</th>
                         <th scope="col">User Name</th>
                         <th scope="col">Serial Number</th>
                         <th scope="col">Gender</th>
                         <th scope="col">Email</th>
                         <th scope="col">FingerPrint Id</th>
                       </tr>
                     </thead>
                     <tbody align="center">
                             @foreach($data as $res)
                             <tr class="bg-light">
                                 <td>{{$res->username}}</td>
                                 <td>{{$res->serialnumber}}</td>
                                 <td>{{$res->gender}}</td>
                                 <td>{{$res->gender}}</td>
                                 <td>{{$res->email}}</td>
                                 <td>{{$res->fingerprint_id}}</td>
                             </tr>
                             @endforeach
                     </tbody>
                   </table>
                 </div>
             </div>
             </div>  
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
</body>
</html>