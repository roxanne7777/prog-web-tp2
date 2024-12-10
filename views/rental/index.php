{{ include ('layouts/header.php', {title:'Rentals'}) }}
    <h1>Rentals</h1>
    <table>
        <tr>
            <th>Client</th>
            <th>Instrument</th>
            <th>Rental Duration (days)</th>
            <th>Total Cost</th>
            <th>Rental Date</th>
        </tr>
        {% for rental in rentals %}
        <tr>
            <td><a href="{{base}}/client/show?id={{rental.client_id}}">{{rental.client_name}}</a></td>
            <td><a href="{{base}}/instrument/show?id={{rental.instrument_id}}">{{rental.instrument_name}}</a></td>
            <td>{{rental.rental_duration}}</td>
            <td>{{rental.rental_cost}} $</td>
            <td>{{rental.rental_date}}</td>
        </tr>
        {% endfor %}
    </table>
    <br><br>
    <a href="{{base}}/rental/create" class="btn">New Rental</a>
{{ include ('layouts/footer.php') }}