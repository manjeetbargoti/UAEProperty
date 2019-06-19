<html>
    <head>
        <title>List User Property [{{ $title }}]</title>
    </head>
    <body>
        <p>Hi Rapid Deals,</p>
        <table>
            <tr><td>Name:</td><td>{{ $name }}</td></tr>
            <tr><td>Email:</td><td>{{ $email }}</td></tr>
            <tr><td>Phone:</td><td>{{ $phone }}</td></tr>
            <tr><td>Property Title:</td><td>{{ $title }}</td></tr>
            <tr><td>Property For:</td><td>{{ $property_for }}</td></tr>
            <tr><td>Property Type:</td><td>{{ $property_type }}</td></tr>
            <tr><td>Property Price:</td><td>{{ $property_price }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Description:</td><td>{!! $description !!}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Commercial/Non-Commercial:</td><td>{{ $commercial }}</td></tr>
            <tr><td>Property Area:</td><td>{{ $property_area }}</td></tr>
            <tr><td>Property Facing:</td><td>{{ $property_facing }}</td></tr>
            <tr><td>Furnish Type:</td><td>{{ $furnish_type }}</td></tr>
            <tr><td>Transection Type:</td><td>{{ $transection_type }}</td></tr>
            <tr><td>Construction Status:</td><td>{{ $construction_status }}</td></tr>
            <tr><td>Rooms:</td><td>{{ $rooms }}</td></tr>
            <tr><td>Bedrooms:</td><td>{{ $bedrooms }}</td></tr>
            <tr><td>Bathrooms:</td><td>{{ $bathrooms }}</td></tr>
            <tr><td>Parking:</td><td>{{ $parking }}</td></tr>
            <tr><td>Personal Washroom:</td><td>{{ $p_washroom }}</td></tr>
            <tr><td>Cafeteria:</td><td>{{ $cafeteria }}</td></tr>
            <tr><td>Property Age:</td><td>{{ $property_age }}</td></tr>
            <tr><td>Address Line 1:</td><td>{{ $address1 }}</td></tr>
            <tr><td>Address Line 2:</td><td>{{ $address2 }}</td></tr>
            <tr><td>Country:</td><td>{{ $country }}</td></tr>
            <tr><td>State:</td><td>{{ $state }}</td></tr>
            <tr><td>City:</td><td>{{ $city }}</td></tr>
            <tr><td>Unit no:</td><td>{{ $unit_no }}</td></tr>
            <tr><td>Locality:</td><td>{{ $locality }}</td></tr>
            <tr><td>P.O.Box:</td><td>{{ $zipcode }}</td></tr>
            <tr><td>Amenity:</td><td>{{ $amenity }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>{{ $name }}</td></tr>
        </table>
    </body>
</html>