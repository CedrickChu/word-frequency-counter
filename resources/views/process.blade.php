<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Results</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>Word Frequency Results</h1>

    @if($results)
        <table class="table table-info table-striped">
            <thead>
                <tr>
                    <th>Word</th>
                    <th>Frequency</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result['word'] }}</td>
                        <td>{{ $result['frequency'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Form not submitted.</p>
    @endif

    <p><a href="{{ route('home') }}">Back to Word Frequency Counter</a></p>
</body>
</html>
