<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	

</head>

<body onload="window.close()" style="display:none">

 
@if($Action=='Disable')
	<iframe src="{{ $ApiUser->Url.':9710/http/send-server-command?username='.$ApiUser->UserName.'&password='.$ApiUser->Password.'&command=stop-gateway&gateway='.$Gateway }}">

@elseif($Action=='Enable')
	</iframe><iframe src="{{ $ApiUser->Url.':9710/http/send-server-command?username='.$ApiUser->UserName.'&password='.$ApiUser->Password.'&command=start-gateway&gateway='.$Gateway }}">
	</iframe>

@endif


</body>
</html>
