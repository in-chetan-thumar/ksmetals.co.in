<!DOCTYPE html>

<html>

<head>

    <title>Enquiry notification mail</title>

</head>

<body>

    <h3>{{ $mailData['subject'] }}</h3>

    <p>Hello Team, <br/><br/><br/>
        You received an inquiry from {{ $mailData['first_name'] }}. <br/><br/>
        Name: {{ $mailData['first_name'] }}<br/><br/>
        Email Address: {{ $mailData['email'] }}<br/><br/>
        Product Interested: {{ $mailData['products'] }}<br/><br/>
        Message: {{ $mailData['message'] }}<br/><br/>
        Date and Time: {{date('d-m-Y H:i:s')}}<br/><br/><br/>
        
    <p>Kind regards, <br>
        {{config('constants.APP_NAME')}}</p>

</body>

</html>