{{ include ('layouts/header.php', {title:'Client'})}}
    <h1>Client</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        {% for client in clients %}
        <tr>
            <td><a href="{{base}}/client/show?id={{client.id}}">{{client.name}}</a></td>
            <td>{{client.address}}</td>
            <td>{{client.phone}}</td>
            <td>{{client.email}}</td>
        </tr>
        {% endfor %}
    </table>
    <br><br>
    <a href="{{base}}/client/create" class="btn">New Client</a>
{{ include ('layouts/footer.php')}}