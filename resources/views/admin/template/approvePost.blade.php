<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        .header, .footer {
            background: #f4f4f4;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>[Thông báo]</h1>
        </div>
        <div class="content">
            <p>Dear {{$post->user->name}},</p></br>
            <strong>Bài viết: {{$post->name}}</strong></br>
            <p>Nhận xét của biên tập viên về bài viết của bạn: {{$comment}}</p></br>
            <p style="color:red;">{{$notice}}</p></br>
           
        </div>
        <div class="footer">
            <p>&copy; 2024 [Your Company]. All rights reserved.</p>
        </div>
    </div>
</body>
</html>