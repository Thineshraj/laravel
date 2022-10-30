<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Table</title>
</head>
<body>
    <h3>Total Students: {{ count($students) }}</h3>
    @foreach ($students as $student)
    <h1>{{$student->name}} | {{ $student->email }} | {{ $student->course }}</h1>
    @endforeach
</body>
</html>