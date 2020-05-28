<div class="sidebar open">
    <div class="text-white">
        <!-- <botton class="toggle" class="btn btn-primary" onclick="$('.sidebar').toggleClass('open')">
            &larr;
        </botton> -->
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ url('/logo.jpg')}}" alt="Logo" width="50px">
        </a>
        <span>Admin Dashboard</span>
    </div>
    <ul class="list-group text-white bg-dark">
        <li class="list-group-item secondary-background-color"> <a class="text-white text-decoration-none" href="{{ url('/admin/request_form') }}">Request Form</a></li>
        <li class="list-group-item secondary-background-color"> <a class="text-white text-decoration-none" href="{{ url('/admin/request_volunteer') }}">Request Volunteer</a></li>
        <li class="list-group-item secondary-background-color"> <a class="text-white text-decoration-none" href="{{ url('/admin/volunteer_form') }}">Volunteer</a></li>
    </ul>
</div>