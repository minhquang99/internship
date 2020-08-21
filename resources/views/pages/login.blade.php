<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
	background-image: url("https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	min-height: 450px;
	position: relative;}
form {border: 3px solid #f1f1f1;
	width: 36%;
	margin: 0 auto;
	margin-top:90px;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #ff8800;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

#success{
	text-align: center;
	color: green;
	font-size: 16px;
}

#fails{
	text-align: center;
	color: red;
	font-size: 16px;
}

.hero-image {
  
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
@if(isset($success))
	<div id="success"><br>{{$success}}</div>
	@endif
	@if(isset($fails))
	<div id="fails"><br>{{$fails}}</div>
	@endif
<form action="{{URL::to('/home')}}" method="post">
<h2 style="text-align:center; color: #ff8800">LOG IN</h2>
{{ csrf_field() }}
  <div class="container">
    <input type="text" placeholder="Enter Email" id="useremail" name="emaillogin" required>
	@error('emaillogin')
		<span id="fails">{{$message}}</span>
	@enderror
    <input type="password" placeholder="Enter Password" id="userpassword" name="passwordlogin" required>
	@error('passwordlogin')
		<span id="fails">{{$message}}</span>
	@enderror   
    <button type="submit">SIGN IN</button>
	<p style="text-align:center; color: white" >Don't have account? <a href="{{URL::to('/register')}}" id="btn-register">Sign Up!</a></p>
  </div>
</form>
</body>
</html>

	
		
