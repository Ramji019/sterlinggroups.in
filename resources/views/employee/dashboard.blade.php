<h1>Welcome Employee!</h1>
            
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
