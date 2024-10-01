<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; color: #333; padding: 20px;">
<div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">

    <!-- Salomlashuv (Greeting) -->
    <h1 style="font-size: 24px; color: #333;">
        {{ $greeting ?? ($level === 'error' ? 'Xatolik!' : 'Assalomu aleykum!') }}
    </h1>

    <!-- Kirish Qismi (Intro Lines) -->
    <div style="margin-bottom: 20px;">
        @foreach ($introLines as $line)
            <p style="font-size: 16px; color: #4b5563; margin-bottom: 10px;">
                {{ $line }}
            </p>
        @endforeach
    </div>

    <!-- Amal Tugmasi (Action Button) -->
    @isset($actionText)
            <?php
            $color = match ($level) {
                'success', 'error' => $level,
                default => 'primary',
            };
            $buttonColor = $color === 'error' ? '#e3342f' : ($color === 'success' ? '#38c172' : '#3490dc');
            ?>
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ $actionUrl }}" style="background-color: {{ $buttonColor }}; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                {{ $actionText }}
            </a>
        </div>
    @endisset

    <!-- Xulosa Qismi (Outro Lines) -->
    <div style="margin-bottom: 20px;">
        @foreach ($outroLines as $line)
            <p style="font-size: 16px; color: #4b5563; margin-bottom: 10px;">
                {{ $line }}
            </p>
        @endforeach
    </div>

    <!-- Xayrlashuv (Salutation) -->
    <div style="margin-bottom: 20px;">
        <p style="font-size: 16px; color: #4b5563;">
            {{ $salutation ?? 'Hurmat bilan,' }}<br>
            {{ config('app.name') }}
        </p>
    </div>

    <!-- Tugmani bosishda muammo bo'lsa (Subcopy) -->
    @isset($actionText)
        <div style="font-size: 14px; color: #6b7280; margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 20px;">
            <p>
                Agar "{{ $actionText }}" tugmasini bosishda muammo yuzaga kelsa, quyidagi URL manzilini veb-brauzeringizga ko‘chiring va joylashtiring:
            </p>
            <p style="word-break: break-all;">
                <a href="{{ $actionUrl }}" style="color: #3490dc;">{{ $displayableActionUrl }}</a>
            </p>
        </div>
    @endisset
</div>
</body>
</html>
