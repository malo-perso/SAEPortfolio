{% block contenu %}
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>CV &nbsp;{{coordonnees.getPrenom()}}&nbsp;{{coordonnees.getNom()}}</title>
        <link rel="stylesheet" href="../TemplatesCV/TemplateCV2.css">
        <style>
            .h4-t2{
                background-color: {{couleur}};
            }

            .span-t2{
                color: {{couleur}};
            }
        </style>
    </head>
    <body>
        <div id="cv-t2" style="background-color: {{couleur}};">
            <div id="div-nom-t2">
                <h1>{{coordonnees.getPrenom()}} &nbsp; {{coordonnees.getNom()}}</h1>
                <h3>{{ coordonnees.getNomPoste() }}</h3>
            </div>
            <div id="div-gauche-t2" style="background-color:{{couleur}};">
                <h4 class="h4-t2">A propos de moi</h4>
                <p id="resume-t2">{{ coordonnees.getPhraseAccroche() }} </p>
                
                <h4 class="h4-t2">Compétences</h4>
                <p>Soft skills</p>
                <ul>
                    {% for competence in softskills %}
                        <li>{{ competence }}</li>
                    {% endfor %}
                </ul>
                <p>Hard skills</p>
                <ul>
                    {% for competence in hardskills %}
                        <li>{{ competence}}</li>
                    {% endfor %}
                </ul>
                
                <h4 class="h4-t2">Langues</h4>
                <ul>
                    {% for langue in langue %}
                        <li>{{ langue.getNomLangue() }} -&nbsp;{{ langue.getNiveauLangue() }}</li>
                    {% endfor %}
                </ul>


                <h4 class="h4-t2">Contacts</h4>
                <p><span class="span-t1">Adresse</span> :&nbsp;{{ coordonnees.getVille() }}</p>
                <p><span class="span-t1">Téléphone</span> : &nbsp;{{ coordonnees.getTelephone() }} </p>
                <p><span class="span-t1">Email</span> : &nbsp;{{ coordonnees.getEmail() }} </p>

            </div>
            <div id="div-milieu-t2">
                
                <div id="formation-t2">
                    <h4 class="h4-t2 cadre-t2">Formation</h4>
                    {% for formation in formations %}
                        <p><span class="span-t2">{{ formation.getDateDebutAnnee() }} -&nbsp;{{ formation.getDateFinAnnee() }} </span> :&nbsp;{{ formation.getDiplome() }} ,&nbsp; {{ formation.getDomaine() }} ,&nbsp; {{ formation.getNomEtablissement() }} -&nbsp;{{ formation.getVilleEtablissement() }}</p>
                    {% endfor %}
                </div>
                <div id="experience">
                    <h4 class="h4-t2 cadre">Expérience</h4>
                    {% for exp in experiences %}
                        <p><span class="span-t2">{{ exp.getDateDebutAnnee() }} -&nbsp;{{ exp.getDateFinAnnee() }}</span> :&nbsp;{{ exp.getTypeContrat() }}&nbsp;{{ exp.getIntitulePoste() }} -&nbsp;{{ exp.getNomEmployeur() }} ,&nbsp;{{ exp.getVilleEmployeur() }}</p>
                        <p><span class="tab-t2 span-t2">Missions : </span>
                        <ul>
                            <li>{{exp.getMission()}}</li>
                        </ul>
                    {% endfor %}
                </div>
                <p id="footer-t2">© ARAM - Portfolio - Template CV</p>
            </div>    
        </div>
    </body>
</html>
{% endblock %}