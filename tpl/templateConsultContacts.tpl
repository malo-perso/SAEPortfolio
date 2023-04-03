{% extends "templateBase.tpl" %}

{% block contenu %}
    <div>
        <h2> Consultation des contacts </h2>
        </br>

        <table>
            <thead>
                <tr>
                    <th> id </th>
                    <th> nom </th>
                    <th> description </th>
                </tr>
            </thead>
        <tbody>

        {% for contact in tabContacts %}
            <tr>
                <td> {{ contact.getIdContact  () }} </td>
                <td> {{ contact.getNomContact () }} </td>
                <td> {{ contact.getDescContact() }} </td>
            </tr>
        {% endfor %}

        </tbody>
    </table>

    </div>
{% endblock %}