<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi foydalanuvchi ro'yxatdan o'tdi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; color: #333; padding: 20px;">
<div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">

    <!-- Salomlashuv (Greeting) -->
    <h1 style="font-size: 24px; font-weight: bold; color: #1f2937; margin-bottom: 20px;">Yangi foydalanuvchi ro'yxatdan o'tdi</h1>

    <!-- Kirish Qismi (Intro Lines) -->
    <p style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">Platformada yangi foydalanuvchi ro'yxatdan o'tdi:</p>

    <!-- Foydalanuvchi Ma'lumotlari (User Information) -->
    <ul style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">
        <li><strong>Ismi:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Ro'yxatdan o'tgan vaqti:</strong> {{ $user->created_at }}</li>
    </ul>

    <!-- Foydalanuvchi Profiliga Havoa (User Profile Link) -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('user.profile', $user->id) }}" style="background-color: #3490dc; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 16px;">
            Foydalanuvchi profilini ochish
        </a>
    </div>

    <!-- Xulosa Qismi (Outro Lines) -->
    <p style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">Iltimos, foydalanuvchi ma'lumotlarini ko'rib chiqing va kerakli choralarni ko'ring.</p>

    <!-- Xayrlashuv (Salutation) -->
    <p style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">Rahmat,<br>StartInvest jamoasi</p>
</div>
</body>
</html>
