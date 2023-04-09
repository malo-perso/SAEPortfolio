{% extends "templateBase.tpl" %}

<h1> Projets </h1>

{% block contenu %}
    <div>
        <h2> Consultation des projets </h2>
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

        {% for projet in tabProjets %}
            <tr>
                <td> {{ projet.getIdProjet  () }} </td>
                <td> {{ projet.getNomProjet () }} </td>
                <td> {{ projet.getDescriptionProjet () }} </td>
            </tr>
        {% endfor %}

        </tbody>
    </table>

    </div>
{% endblock %}