<% @page contentType="html/text" pageEncoding="UTF-8" %>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JSP page</title>
    </head>
    <body>
    </html>
    <% 
        int java = Integer.parseInt(request.getParameter("Java"));
        int NMA = Integer.parseInt(request.getParameter("NMA"));
        int MCAD = Integer.parseInt(request.getParameter("MCAD"));
        int PPUD = Integer.parseInt(request.getParameter("PPUD"));
        int Project = Integer.parseInt(request.getParameter("Project"));

        int c = java+NMA+MCAD+PPUD+Project;
        double avg = c/5;

        if(avg>90)
        {
            System.out.println("Your Grade is A");
        }
        else if(avg>=80)
        {
            System.out.println("Your Grade is B");
        }
        else if(avg>=70)
        {
            System.out.println("Your Grade is C");
        } 
        else if(avg>=60)
        {
            System.out.println("Your Grade is D");
        }
        else
        {
            System.out.println("Your Grade is E");
        }
    %>
    <html>
    </body>
</html>