<!DOCTYPE html>
<html lang="en" data-theme="fantasy">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NESASTECH</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @if (session('success'))
        <div class="toast toast-top toast-end">
            <div class="alert bg-[#1c68bb] text-white">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    <main class="w-full h-screen bg-[#fafafa] text-[#222831]">
        {{ $slot }}
    </main>
</body>

</html>
