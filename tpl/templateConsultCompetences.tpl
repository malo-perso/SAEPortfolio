{% extends "templateBase.tpl" %}

<h1> Competences </h1>

{% block contenu %}
    <div>
        <h2> Consultation des competences </h2>
        </br>

        <table>
            <thead>
                <tr>
                    <th> id </th>
                    <th> description </th>
                </tr>
            </thead>
        <tbody>

        {% for comp in tabCompetences %}
            <tr>
                <td> {{ comp.getIdComp()   }} </td>
                <td> {{ comp.getDescComp() }} </td>
            </tr>
        {% endfor %}

        </tbody>
    </table>

    </div>
{% endblock %}