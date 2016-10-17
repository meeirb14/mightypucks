@extends('layouts.app')

@section('content')
<div>
    <h1>Welcome, {{ $user->firstName }}</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a season</div>
                <div class="panel-body">
                    <div>
                        <form action="/seasons" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="seasonName" maxlength="100" />
                            <input type="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Add a game</div>
                <div class="panel-body">
                    <form action="/games" method="POST">
                        {{ csrf_field() }}
                        <table border="0">
                            <tr>
                                <td>Youtube link:</td>
                                <td><input type="text" name="youtubeLink" /></td>
                            </tr>
                            <tr>
                                <td>Game date:</td>
                                <td><input id="date" type="text" name="date" /></td>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $( "#date" ).datepicker();
        });
    </script>
@endsection