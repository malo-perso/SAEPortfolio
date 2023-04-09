{% block contenu %}
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>CV {{coordonnees.getPrenom()}}&nbsp;{{coordonnees.getNom()}} </title>
        <link rel="stylesheet" href="TemplateCV1.css">
    </head>
    <body>
        <div id="cv-t1">
            <div id="div-gauche-t1">
                <div id="div-photo-t1">
                    <img src={{coordonnees.getPhoto()}}>
                </div>
                <div id="div-nom-t1">
                    <h1>{{coordonnees.getPrenom()}} &nbsp; {{coordonnees.getNom()}}</h1>
                    <h3>{{ coordonnees.getNomPoste() }}</h3>
                </div>
                <h4>A propos de moi</h4>
                <p id="resume-t1"> {{ coordonnees.getPhraseAccroche() }}  </p>
                <h4>Compétences</h4>
                <p>Soft skills</p>
                <ul>
                    {% for competence in softSkills %}
                        <li>{{ competence.getNomComp() }}</li>
                    {% endfor %}
                </ul>
                <p>Hard skills</p>
                <ul>
                    {% for competence in hardSkills %}
                        <li>{{ competence.getNomComp() }}</li>
                    {% endfor %}
                </ul>
                <h4>Langues</h4>
                <ul>
                    {% for langue in langues %}
                        <li>{{ langue.getNomLangue() }} -&nbsp;{{ langue.getNiveauLangue() }}</li>
                    {% endfor %}
                </ul>
            </div>
            <div id="div-haut-t1">
                
                <h4 class="cadre-t1">Contacts</h4>
                <p><span class="span-t1">Adresse</span> :{{ coordonnees.getVille() }}</p>
                <p><span class="span-t1">Téléphone</span> : {{ coordonnees.getTelephone() }} </p>
                <p><span class="span-t1">Email</span> : {{ coordonnees.getEmail() }} </p>
                
            </div>
            
            <div id="div-milieu-t1">
                <div id="formation-t1">
                    <h4 class="cadre-t1">Formation</h4>
                        {% for formation in tabFormations %}
                            <p><span class="span-t1">{{ formation.getDateDebut() }} -&nbsp;{{ formation.getDateFin() }} </span> :{{ formation.getDiplome() }} ,&nbsp; {{ formation.getDomaine() }} ,&nbsp; {{ formation.getNomEtablissement() }} -&nbsp;{{ formation.getVilleEtablissement() }}</p>
                        {% endfor %}
                </div>
                
                <div id="experience-t1">
                    <h4 class="cadre-t1">Expérience professionnelle</h4>
                        {% for exp in tabExperiences %}
                            <p><span class="span-t1">{{ exp.getDateDebut() }} -&nbsp;{{ exp.getDateFin() }}</span> :{{ exp.getTypeContrat() }}&nbsp;{{ exp.getIntitulePoste() }} -&nbsp;{{ exp.getNomEmployeur() }} ,&nbsp;{{ exp.getVilleEmployeur() }}</p>
                            <p><span class="tab-t1 span-t1">Missions : </span>
                            <ul>
                                <li>{{exp.getMission()}}</li>
                            </ul>
                        {% endfor %}
                </div>
                <p id="footer-t1">© ARAM - Portfolio - Template CV</p>
            </div>    
        </div>
    </body>
</html>
{% endblock %}