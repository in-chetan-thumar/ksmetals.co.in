<!DOCTYPE html>

<html>

<head>

    <title>Enquiry notification mail</title>

</head>

<body>

    <h3>{{ $mailData['title'] }}</h3>

    <p>{{ $mailData['body'] }}</p>

  

    <p>Thank you <br>
        {{config('constants.APP_NAME')}}</p>

</body>

</html>