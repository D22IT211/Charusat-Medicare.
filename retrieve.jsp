<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>
<%
String id = request.getParameter("userid")
String driver = "com.mysql.jdbc.Driver";
String connectionUrl = "jdbc:mysql://localhost:3306/";
String database = "appointment";
String tabledb = "appointment_table";
String userid = "root";
String password = "";
try{
    Class.forName(driver);
}
catch (ClassNotFoundException e)
{
    e.printStackTrack();
}
Connection connection = null;
Statement statement = null;
ResultSet resultSet = null;
%>

<html lang="en">
<body>
    <h1>Retrieve data from database in jsp</h1>
    <table border="1">
        <tr>
            <td>Name</td>
            <td>Phone</td>
            <td>Email</td>
        </tr>

        <%
        try{
            connection = DriverManager.getConnection(connectionUrl+database, userid, password);
            statement = connection.createStatement();
            String sql = "select * from appointment_table";
            ressultSet = statement.executeQuery(sql);
            while(resultSet.next())
            {
                %>
                <tr>
                    <td><%=resultSet.getString("Name") %></td>
                    <td><%=resultSet.getString("Phone") %></td>
                    <td><%=resultSet.getString("Email") %></td>
                </tr>
                <%
            }
            connection.close();
        }
        catch (Exception e){
            e.printStackTrack();
        }
        %>
    </table>
</body>
</html>