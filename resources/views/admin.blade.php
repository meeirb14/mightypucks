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
            <div class="row">
                <div class="col-md-6">
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
                                </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add goals to game</div>
                        <div class="panel-body">
                                <table border="0">
                                    <tr>

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
                                </table>
                                <input type="submit" value="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add a user</div>
                        <div class="panel-body">
                            <div>
                                <form action="/users" method="POST">
                                    {{ csrf_field() }}
                                    <table border="0">
                                        <tr>
                                            <td>E-mail:</td>
                                            <td><input type="email" name="email" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="password" name="password" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>First Name:</td>
                                            <td><input type="text" name="firstName" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td><input type="text" name="lastName" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td>
                                                <select name="role">
                                                    <option selected disabled>Chose role</option>
                                                    <option val="admin">Admin</option>
                                                    <option val="user">User</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sysadmin password:</td>
                                            <td><input type="password" name="sysadminPassword" /></td>
                                        </tr>
                                    </table>
                                    <input type="submit" value="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>
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