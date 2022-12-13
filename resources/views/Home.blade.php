<?php
	if (!isset($_POST[auth()->user()->email])) {
		return redirect(url('login'));
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Home</title>
</head>
<body>

<h1>Welcome&nbsp;{{auth()->user()->name}}</h1>
<a href="{{route('Logout')}}">Logout</a>
</body>
</html>