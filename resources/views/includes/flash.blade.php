@if(Session::has('success'))
<p class="mt-4  alert alert-success">{{ Session::get('success') }}</p>
@elseif(Session::has('warning'))
<p class="mt-4 alert alert-warning">{{ Session::get('warning') }}</p>
@elseif(Session::has('error'))
<p class="mt-4 alert alert-danger">{{ Session::get('error') }}</p>
@endif