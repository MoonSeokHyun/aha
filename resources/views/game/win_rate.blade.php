<!-- resources/views/win_rate.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Win Rate</title>
</head>
<body>
    <h1>Win Rate</h1>
    <table border="1">
        <tr>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Wins</th>
            <th>Total Games</th>
            <th>Win Rate</th>
        </tr>
        @foreach($results as $result)
        <tr>
            <td>{{ $result->trimmed_team1 }}</td>
            <td>{{ $result->trimmed_team2 }}</td>
            <td>{{ $result->wins }}</td>
            <td>{{ $result->total_games }}</td>
            <td>{{ $result->win_rate }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
