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
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add a game</div>
                        <div class="panel-body">
                            <div class="col-md-6">
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
                                        <td><input id="vsTeam" type="text" name="vsTeam" /></td>
                                    </tr>
                                    <tr>
                                        <td>Win/Loss:</td>
                                        <td>
                                            <select name="winLoss">
                                                <option value="W">W</option>
                                                <option value="L">L</option>
                                                <option value="T">T</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Goals for:</td>
                                        <td><input id="goalsFor" type="number" name="goalsFor" /></td>
                                    </tr>
                                    <tr>
                                        <td>Goals against:</td>
                                        <td><input id="goalsAgainst" type="number" name="goalsAgainst" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <h4 id="teamHeader">Mighty Pucks</h4>
                                <ul id="teamList"  class="list-group">
                                    <li class="list-group-item">
                                        <div class="input-group">
                                            <input type="text" class="form-control">
                                        </div><!-- /input-group -->
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <h4 id="vsTeamHeader">vs Team</h4>
                                <ul id="vsTeamList" class="list-group">
                                    <li class="list-group-item">
                                        <div class="input-group">
                                            <input type="text" class="form-control">
                                        </div><!-- /input-group -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-footer"><input class="btn btn-info" type="submit" value="Submit" /></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add a user</div>
                        <div class="panel-body">
                            <div class="col-md-6">
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
                                </form>
                            </div>
                        </div>
                        <div class="panel-footer"><input class="btn btn-danger" type="submit" value="Submit" /></div>
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

            var pucksGoals = 0;
            var vsTeamGoals = 0;
            var vsTeamName = "";


            $( "#date" ).datepicker();


            //on input change, if number, add the number of boxes to the right for away and home team
            $("#goalsFor").change(function(){
                if(this.value >= 0 && this.value <= 99){
                    items = "";
                    pucksGoals = parseInt(this.value); //get goals value
                    $("#teamHeader").empty();
                    $("#teamHeader").append("Mighty Pucks <span class='badge'>"+ pucksGoals +'</span>'); //add badge to table header team name
                    for(i = 0; i < pucksGoals; i++){ //create string for adding dynamic amount of inputs for goal times
                        items += '<li class="list-group-item">' +
                                    '<div class="input-group">' +
                                    '<input type="text" class="form-control">' +
                                    '</div>' +
                                    '</li>';
                    }
                    $("#teamList").empty();
                    $("#teamList").append(items);
                }

            });

            $("#goalsAgainst").change(function(){
                if(this.value >= 0 && this.value <= 99){
                    vsTeamGoals = parseInt(this.value);
                    items = "";
                    $("#vsTeamHeader").empty();
                    $("#vsTeamHeader").append(vsTeamName + " <span class='badge'>"+ vsTeamGoals +'</span>'); //add badge to table header team name
                    for(i = 0; i < pucksGoals; i++){ //create string for adding dynamic amount of inputs for goal times
                        items += '<li class="list-group-item">' +
                                '<div class="input-group">' +
                                '<input type="text" class="form-control">' +
                                '</div>' +
                                '</li>';
                    }
                    console.log("test");
                    $("#vsTeamList").empty();
                    $("#vsTeamList").append(items);
                }

            });

            $("#vsTeam").change(function(){
                vsTeamName = this.value;
                $("#vsTeamHeader").html(vsTeamName + " ");
            });



        });
    </script>
@endsection