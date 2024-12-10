{{ include ('layouts/header.php', {title:'Instruments'}) }}
    <h1>Instruments</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Price per Day</th>
            <th>Availability</th>
        </tr>
        {% for instrument in instruments %}
        <tr>
            <td><a href="{{base}}/instrument/show?id={{instrument.id}}">{{instrument.name}}</a></td>
            <td>{{instrument.type}}</td>
            <td>{{instrument.price_per_day}} €</td>
            <td>{{'Available' if instrument.availability else 'Not Available'}}</td>
        </tr>
        {% endfor %}
    </table>
    
{{ include ('layouts/footer.php') }}