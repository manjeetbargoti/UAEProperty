<html>
    <head>
        <title>A User Send an Enquiry about Property [{{ $prop_name }}]</title>
    </head>
    <body>
        <p>Hi Rapid Deals,</p>
        <table>
            <tr><td>Name</td><td>{{ $name }}</td></tr>
            <tr><td>Email</td><td>{{ $email }}</td></tr>
            <tr><td>Phone</td><td>{{ $phone }}</td></tr>
            <tr><td>Property</td><td>{{ $prop_name }}</td></tr>
            <tr><td>Link</td><td>{{ $prop_url }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Message</td><td>{{ $enquiry_message }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>{{ $name }}</td></tr>
        </table>
    </body>
</html>