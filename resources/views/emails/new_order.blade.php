<!DOCTYPE html>
<html>
<head>
	<title>Enquiry Assign</title>
</head>
<body>
	<table>
		<tr><td>Hello {{$name}},</td></tr>
		<tr><td>New order added successfully.</td></tr>
		<tr><td>Client Name: <b>{{$customer_name}}</b></td></tr>
		<tr><td><a href="{{url('view-orders/In%20Process')}}"><button>View Orders</button></a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thanks & Regards,</td></tr>
		<tr><td>YSO Team</td></tr>
	</table>
</body>
</html>