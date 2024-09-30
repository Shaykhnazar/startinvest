<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $joinRequest->status->label() }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; color: #333; padding: 20px;">
<div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 24px; font-weight: bold; color: #1f2937; margin-bottom: 20px;">Salom, {{ $joinRequest->user->name }}!</h1>

    <p style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">
        Sizning <a href="{{ route('startups.show', $joinRequest->startup->id) }}" style="color: #3b82f6; text-decoration: none; font-weight: bold;">{{ $joinRequest->startup->title }}</a> startapini tark etish bo'yicha so'rovingiz loyiha egasi <strong style="color: #111827;">{{ $joinRequest->startup->owner->name }}</strong> tomonidan qabul qilindi.
    </p>

    <p style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">
        Siz endi ushbu startup jamoasining a'zosi emassiz. Loyiha uchun qilgan barcha hissangiz uchun rahmat!
    </p>

    <p style="font-size: 16px; color: #4b5563; margin-bottom: 20px;">
        Agar sizda qo'shimcha savollar yoki izohlar bo'lsa, loyiha egasi bilan bog'lanishingiz mumkin.
    </p>

    <p>
        <a href="{{ route('chat.cabinet', $joinRequest->startup->owner->id) }}" style="display: inline-block; padding: 12px 24px; background-color: #3b82f6; color: #ffffff; text-decoration: none; border-radius: 6px; font-size: 16px; font-weight: bold; text-align: center;">
            Chat orqali bog'lanish
        </a>
    </p>

    <p style="font-size: 16px; color: #4b5563; margin-top: 40px;">
        Rahmat, <br>
        <strong style="color: #111827;">{{ config('app.name') }}</strong>
    </p>
</div>
</body>
</html>
