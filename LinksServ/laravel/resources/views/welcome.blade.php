<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Link List</title>
</head>
<body>
    <h1>Links</h1>
    <ul>
        @foreach ($links as $link)
            <li>
                <a href="{{ $link->url }}">{{ $link->title }}</a> - {{ $link->description }}
            </li>
        @endforeach
    </ul>
</body>
</html>
