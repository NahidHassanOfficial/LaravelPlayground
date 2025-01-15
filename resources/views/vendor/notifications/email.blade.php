<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Hello</h2>

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        <p>{{ $line }}</p>
    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
        <p>
            <a href="{{ $actionUrl }}"
                style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #007BFF; text-decoration: none; border-radius: 5px;">
                {{ $actionText }}
            </a>
        </p>
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        <p>{{ $line }}</p>
    @endforeach

    {{-- Salutation --}}
    <p>
        {{ $salutation ?? 'Regards,' }}<br>
        {{ config('app.name') }}
    </p>

    {{-- Subcopy --}}
    @isset($actionText)
        <p style="font-size: 0.9em; color: #666;">
            If you're having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below into your web
            browser: <br>
            <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
        </p>
    @endisset
</body>

</html>
