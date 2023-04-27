<!DOCTYPE html>
<html>
<head>
	<title>Enquiry Assign</title>
</head>
<body>
	<table>
		<tr><td>Hello {{$name}},</td></tr>
		<tr><td>You have assigned new enquiry.</td></tr>
		<tr><td>Enquiry - </td></tr>
		<tr><td>Customer Name: <b>{{$customer_name}}</b></td></tr>
		<tr><td><a href="{{url('view-enquiry-logs')}}"><button>View Enquiry</button></a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thanks & Regards,</td></tr>
		<tr><td>YSO Team</td></tr>
	</table>
</body>
</html>