<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Message</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 5px; }
        .header { background-color: #007bff; padding: 10px; color: white; text-align: center; border-radius: 5px 5px 0 0; }
        .content { margin-top: 20px; }
        .footer { margin-top: 30px; font-size: 12px; color: #777; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <p><strong>Message:</strong></p>
            
        </div>
        <div class="footer">
            <p>This notification is from {{ config('app.name') }} contact form.</p>
        </div>
    </div>
</body>
</html>

