<!DOCTYPE html>
<html>
<head>
	<title>Enquiry Reminder Email</title>
</head>
<body>
	<table>
		<tr><td>Dear {{ $name }}!</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Enquiry Reminder </td></tr>
		<tr><td>Enquiry Details: </td></tr>
		<tr><td><b>{{ $customer_name }}<b> </td></tr>
		<tr><td>Reminder Note</td></tr>
		<tr><td><b>{{ $note }}</b> </td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thanks & Regards,</td></tr>
		<tr><td>YSO Team</td></tr>
	</table>
</body>
</html>