<!-- resources/views/emails/email_template.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">

        <h2>Email Receive From :- {{ $fromEmail }}</h2>
        <h4>Name of the Visiter :- {{ $name }}</h4>
        <h4>Regarding the mail is :- {{ $subject }}</h4>
        <p>Message is :- {{ $mailMessage }} </p>
        <div class="footer">
            <p>Regards,<br>{{ $name }}</p>
        </div>
    </div>
</body>

</html>
