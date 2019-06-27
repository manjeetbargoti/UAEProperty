<html>
    <head>
        <title>List User Property [{{ $fname }} {{ $lname }}]</title>
    </head>
    <body>
        <p>Hi Rapid Deals,</p>
        <table>
            <tr><td>Name:</td><td>{{ $prefix }} {{ $fname }} {{ $lname }}</td></tr>
            <tr><td>Office Location:</td><td>{{ $office_location }}</td></tr>
            <tr><td>Email:</td><td>{{ $email }}</td></tr>
            <tr><td>Phone:</td><td>{{ $phone }}</td></tr>
            <tr><td>Bulilding Number:</td><td>{{ $building_no }}</td></tr>
            <tr><td>Building Name:</td><td>{{ $building_name }}</td></tr>
            <tr><td>Community:</td><td>{{ $community }}</td></tr>
            <tr><td>Emirate:</td><td>{{ $emirate }}</td></tr>
            <tr><td>Property Type:</td><td>{{ $property_type }}</td></tr>
            <tr><td>Bedrooms:</td><td>{{ $bedrooms }}</td></tr>
            <tr><td>Property Area:</td><td>{{ $property_area }}</td></tr>
            <tr><td>Property For:</td><td>{{ $considering_for }}</td></tr>
            <tr><td>Term & Condition:</td><td>{{ $term_condition }}</td></tr>
            <tr><td>Privacy:</td><td>{{ $privacy }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>{{ $fname }} {{ $lname }}</td></tr>
        </table>
    </body>
</html>