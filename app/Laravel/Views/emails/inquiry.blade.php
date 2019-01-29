<!DOCTYPE html>
<html>
<head>
	<title>Waveone : New Inquiry!</title>
</head>
<body>
	<p>You have a new inquiry, see details below :</p>
	<p>
		Name: <b>{{ $mail['name'] }}</b> <br>
		Email: <b>{{ $mail['email'] }}</b> <br>
		Contact: <b>{{ $mail['contact'] }}</b> <br>
		Inquiring for: <b>{{ $mail['subject'] }}</b> <br>
	</p>
	<p style="font-style: italic; font-size: 12px;">{{ $mail['message'] }}</p>
</body>
</html>