<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <title>Admin - @yield('title')</title>
</head>

<body>
    <div class="row mx-0 px-0 parent-overlay">
        <div class="col-md-12 mx-0 px-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
                <a class="navbar-brand" href="{{ route('home') }}">BMDC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home')}}">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('doctor.index')}}">Doctor</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Medicine
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('medicine.index')}}">Medicine</a>
                                <a class="dropdown-item" href="{{ route('medAlert.index')}}">Medicine Alert</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('generic.index')}}">Generic</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prescription.index')}}">Prescription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('complain.index')}}">Complain</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Authorization
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('application.doctorApplicationIndex') }}">Doctor
                                    Applications</a>
                                <a class="dropdown-item" href="{{ route('doctorModify.index') }}">Doctor Profile Change
                                    Requests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="{{ route('application.medicineApplicationIndex') }}">Medicine
                                    Applications</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button id="notification-btn" class="btn mx-auto text-light" type="button">
                                <span class="nofification-text fa-stack fa-1x">
                                    <i class="fa fa-bell fa-stack-2x"></i>
                                    <i id="notification-circle" class="calendar-text fa fa-circle fa-stack-1x"></i>
                                </span>Notifications
                            </button>
                        </li>

                        <li class="nav-item active mb-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn text-white" type="submit">Logout,
                                    {{ auth()->user()->username }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="col-md-3 ml-auto">
            <div id="notification-card" style="display:none" class="card shadow rounded card-overlay">
                <div id="notification-body" class="card-body">

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 pt-3">
        @yield('content')
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        getNotification();

        $('#notification-btn').click(function() {
            $('#notification-card').fadeToggle("fast", "linear");
            getNotification();
        });

        function getNotification() {
            $.ajax({
                url: "{{route('ajax.getNotification')}}",
                method: "GET",
                dataType: "json",
                success: function(result) {
                    console.log(result);

                    var html =
                        "<div class='h3 ml-3 mt-3 card-title text-secondary'>Notifications</div>";
                    html += "<ul class='scrollable notification-ul'>";
                    var flag = false;
                    result.forEach(notification => {

                        html +=
                            `<li class='notification-li'> <a href="/admin/notification/read/${notification.id}/${notification.route_name}/${notification.route_id}">`;
                        if (notification.read_at == null) {
                            html += `<div class="text-success">${notification.data}</div>`;
                            flag = true;
                        } else {
                            html +=
                                `<div class="text-secondary">${notification.data}</div>`;
                        }
                        html +=
                            `<small class="text-primary">${notification.created_at}</small>`;
                        html += `</a> </li>`;

                    });

                    html += "</ul>";

                    $('#notification-card').html(html);

                    if(flag)
                    {
                        $('#notification-circle').show();
                    }else{
                        $('#notification-circle').hide();
                    }
                }
            });
        }
    });
    </script>

</body>

</html>