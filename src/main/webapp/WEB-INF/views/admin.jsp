<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@ taglib prefix="spring" uri="http://www.springframework.org/tags"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ page session="false" %>
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
		<input type="text" name="season" value="" maxlength="100" />
		<input type="submit" value="Submit" />
	</form>
	
</div>
<div>
	<h2>Add game</h2>
	<form:form action="/mightypucks/admin/addGame" method="post" commandName="gameForm">
            <table border="0">
                <tr>
                    <td colspan="2" align="center"><h2>Spring MVC Form Demo - Registration</h2></td>
                </tr>
                <tr>
                    <td>Youtube link:</td>
                    <td><form:input path="youtubeLink" /></td>
                </tr>
                <tr>
                    <td>Game date:</td>
                    <td><form:input path="date" /></td>
                </tr>
                <tr>
                    <td>Season:</td>
                    
                </tr>
                <tr>
                    <td>Team:</td>
                    <td><form:input path="vsTeam" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Submit" /></td>
                </tr>
            </table>
        </form:form>
	
</div>
<div>

</div>

</body>
</html>