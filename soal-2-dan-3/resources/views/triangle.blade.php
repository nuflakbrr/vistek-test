<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle</title>
    <style>
        .triangle-container {
            font-family: monospace;
            line-height: 1.5;
        }

        .triangle-container .outer {
            color: red;
        }

        .triangle-container .inner {
            color: black;
        }
    </style>
</head>

<body>
    <div class="triangle-container">
        @foreach ($triangle as $index => $line)
            @for ($i = 0; $i < strlen($line); $i++)
                @if ($i === 0 || $i === strlen($line) - 1 || $index === count($triangle) - 1)
                    <span class="outer">o</span>
                @else
                    <span class="inner">o</span>
                @endif
            @endfor
            <br>
        @endforeach
    </div>
</body>

</html>
