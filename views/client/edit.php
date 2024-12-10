{{ include ('layouts/header.php', {title:'Client Edit'})}}
        <div class="container">
        <form method="post">
            <h2>Edit Client</h2>
            <label>Name
                <input type="text" name="name" value="{{ inputs.name }}">
            </label>
            {% if errors.name is defined %}
                <span class="error">{{ errors.name }}</span>
            {% endif %}
            <label>Address
                <input type="text" name="address" value="{{ inputs.address }}">
            </label>
            {% if errors.address is defined %}
                <span class="error">{{ errors.address }}</span>
            {% endif %}
            <label>Phone
                <input type="text" name="phone" value="{{ inputs.phone }}">
            </label>
            {% if errors.phone is defined %}
                <span class="error">{{ errors.phone }}</span>
            {% endif %}
            <label>Zip Code
                <input type="text" name="zip_code" value="{{ inputs.zip_code }}">
            </label>
            {% if errors.zip_code is defined %}
                <span class="error">{{ errors.zip_code }}</span>
            {% endif %}
            <label>Email
                <input type="email" name="email" value="{{ inputs.email }}">
            </label>
            {% if errors.email is defined %}
                <span class="error">{{ errors.email }}</span>
            {% endif %}
            <input type="submit" class="btn" value="Update">
        </form>
        </div>
{{ include ('layouts/footer.php')}}