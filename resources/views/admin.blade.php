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
    <form>
        {{ csrf_field() }}
        <input type="text" name="season" value="" maxlength="100" />
        <input type="submit" value="Submit" />
    </form>

</div>
<div>
    <h2>Add game</h2>
    <form action="/addGame" method="POST">
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
                <select name="season">
                    <option selected>Chose season</option>
                    @foreach($seasons as $season)
                        <option val="{{ $season->id }}">{{ $season->name }}</option>
                    @endforeach
                </select>
            </tr>
            <tr>
                <td>Team:</td>
                <td><input type="text" name="vsTeam" /></td>
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