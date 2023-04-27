<!DOCTYPE html>
<html>
<head>
	<title>New Password Email</title>
</head>
<body>
	<table>
		<tr><td>Dear {{ $name }}!</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Your password has been successfully updated. <br>
		Your login information is as below with new password :</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Email: {{ $email }}</td></tr>
		<tr><td>New Password: {{ $password }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thanks & Regards,</td></tr>
		<tr><td>YSO Team</td></tr>
	</table>
</body>
</html>