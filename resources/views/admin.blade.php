<html>
<head>

    <title>Admin page</title>
</head>
<body>
<div>
    <h1>Welcome, </h1>
</div>
<div>
    <h2>Create new season</h2>
    <form action="/season" method="POST">
        {{ csrf_field() }}
        <input type="text" name="seasonName" maxlength="100" />
        <input type="submit" value="Submit" />
    </form>

</div>
<div>
    <h2>Add game</h2>
    <form action="/game" method="POST">
        {{ csrf_field() }}
        <table border="0">
            <tr>
                <td>Youtube link:</td>
                <td><input type="text" name="youtubeLink" /></td>
            </tr>
            <tr>
                <td>Game date:</td>
                <td><input type="text" name="date" /></td>
            </tr>
            <tr>
                <td>Season:</td>
                <td>
                    <select name="season_id">
                        <option selected>Chose season</option>
                        @foreach($seasons as $season)
                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Team:</td>
                <td><input type="text" name="vsTeam" /></td>
            </tr>
            <tr>
                <td>Win/Loss:</td>
                <td>
                    <select name="winLoss">
                        <option value="W">W</option>
                        <option value="L">L</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Goals for:</td>
                <td><input type="number" name="goalsFor" /></td>
            </tr>
            <tr>
                <td>Goals against:</td>
                <td><input type="number" name="goalsAgainst" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>

</div>
<div>

</div>

</body>
</html>