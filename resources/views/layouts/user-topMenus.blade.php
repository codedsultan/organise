<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
  <i class="fas fa-user mr-2"></i> Profile      
</a>

<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
  <i class="fas fa-cog mr-2"></i> Settings    
</a>

<div class="dropdown-divider"></div>   
{{-- <a href="#" class="dropdown-item dropdown-footer">Logout</a> --}}
<a class="dropdown-item dropdown-footer" href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
<form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>