<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
  <i class="fas fa-user mr-2"></i> Profile      
</a>

<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
  <i class="fas fa-cogs mr-2"></i> Settings    
</a>

<div class="dropdown-divider"></div>   
<a class="dropdown-item dropdown-footer" href="{{ route('doctor.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
<form action="{{ route('doctor.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>