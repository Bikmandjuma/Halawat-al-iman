<!DOCTYPE html>
<html>
<head>
    <title>New app</title>
</head>
<body>

<h1>Login here !</h1>

<table>

    @if(session('loginfialed'))
        <span style="color:red;">
            {{session('loginfialed')}}
        </span>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li><span style="color: red;">{{$error}}</span></li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('userlogin')}}" method="POST">
    @csrf

    <tr>
        <td><label>Email</label></td>
        <td><input type="email" name="email" placeholder="enter email" value="{{old('email')}}"></td>
    </tr>
    <tr>
        <td><label>Password</label></td>
        <td><input type="password" name="password" placeholder="enter password"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button name="submit" type="submit">Submit</button>
        </td>
    </tr>
        
    </form>
</table>
<a href="{{url('/')}}">Already have account</a>
</body>
</html>