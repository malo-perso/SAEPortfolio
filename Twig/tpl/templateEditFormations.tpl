{% extends "templateBase.tpl" %}

{% block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%; margin-top:-0.5%;"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var result = getNav("editFormation.php", "edit");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div class="text-start">
    <section class="text-start" style="margin-left:15%; width:85%">
        <h2 class="text-center" style="color: var(--bs-body-color);padding-top: 5%;">Formations</h2>
        <div id="formations" style="display:grid; justify-content:center; margin-left:-10%;">
            <form method="POST" action="editFormation.php">
                {% for formation in tabFormations %}
                    <section style="margin: 0px 10px 10px 10px;margin-top: 34px;border-style: solid;border-color: var(--color-brown);width: 500px;padding: 22px 10px 10px 10px;margin-bottom: 14px;margin-right: 23px;padding-left: 51px;margin-left: 164px;">
                        <p class="index_nom_ville">{{ formation.getNomEtablissement() }} -&nbsp;{{ formation.getVilleEtablissement() }}</p>
                        <p class="diplome_domaine_dates">{{ formation.getDiplome() }} -&nbsp;{{ formation.getDomaine() }} -&nbsp;{{ formation.getDateDebut() }} |&nbsp;{{ formation.getDateFin() }}</p>

                        <button type="submit" value="{{ formation.getIdFormation() }}" name="supprimer" class="btn btn-primary float-none d-lg-flex" data-bss-hover-animate="pulse" style="margin-bottom: 15px;width: 23%;text-align: center;margin-top: 22px;color: var(--bs-body-bg);border-color: var(--color-brown);background: var(--color-brown);">Supprimer</button>
                    </section>
                {% endfor %}
            </form>
        </div>
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 60%;height: 40%;border: 1px solid; margin-top:5%;">
            <form method="POST" style="width:70%;">
                <div class="row profile-row" style="margin-right: -60%;padding-right: 48px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label form-label">Nom de l'établissement</label>
                                    <input class="form-control form-control form-control" type="text" name="etablissement" id="nomEtablissement">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label form-label">Ville</label>
                                    <input class="form-control form-control form-control" type="text" name="ville" id="villeEtablissement">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div><label class="form-label form-label form-label">Diplome</label>
                                    <select name="diplome" class="form-select" id="diplome">
                                        <optgroup label="Sélectionner">
                                            <option value="cap">CAP</option>
                                            <option value="bep">BEP</option>
                                            <option value="BAC" selected="">Baccalauréat</option>
                                            <option value="bacPro">Baccalauréat Professionnel</option>
                                            <option value="bts">BTS</option>
                                            <option value="but">BUT</option>
                                            <option value="deug">DEUG</option>
                                            <option value="deust">DEUST</option>
                                            <option value="dut">DUT</option>
                                            <option value="licence">Licence</option>
                                            <option value="licence1">Licence 1</option>
                                            <option value="licence2">Licence 2</option>
                                            <option value="licence3">Licence 3</option>
                                            <option value="bachelor">Bachelor</option>
                                            <option value="licencePro">Licence Professionnelle</option>
                                            <option value="master">Master</option>
                                            <option value="master1">Master 1</option>
                                            <option value="master2">Master 2</option>
                                            <option value="dess">DESS</option>
                                            <option value="dea">DEA</option>
                                            <option value="dipIngen">Diplome ingénieur</option>
                                            <option value="doctorat">Doctorat</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <label class="form-label form-label form-label">Domaine d'étude</label>
                                    <input class="form-control form-control form-control" type="text" id="domaine">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label form-label">Mention</label>
                                    <input class="form-control" type="text" id="mention">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date début</label>
                                <div class="d-lg-flex align-items-lg-center form-group mb-3">
                                <select class="form-select form-select form-select" style="width: 123.4px;margin-right: 10px;" id="moisDeb">
                                    <optgroup label="Mois">
                                        <option value="" selected="">Mois</option>
                                        <option value="1">Janvier</option>
                                        <option value="2">Février</option>
                                        <option value="3">Mars</option>
                                        <option value="4">Avril</option>
                                        <option value="5">Mai</option>
                                        <option value="6">Juin</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Août</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Novembre</option>
                                        <option value="12">Décembre</option>
                                    </optgroup>
                                </select>
                                <input class="form-control" type="number" min="1958" max="2033" value="2000" name="anneeDeb" style="width: 123px;" id="anneeDeb"></div>
                            </div>
                            <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date fin</label>
                                <div class="d-lg-flex align-items-lg-center form-group mb-3">
                                <select class="form-select form-select form-select" style="width: 123.4px;margin-right: 10px;" id="moisFin">
                                    <optgroup label="Mois" >
                                        <option value="" selected="">Mois</option>
                                        <option value="1">Janvier</option>
                                        <option value="2">Février</option>
                                        <option value="3">Mars</option>
                                        <option value="4">Avril</option>
                                        <option value="5">Mai</option>
                                        <option value="6">Juin</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Août</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Novembre</option>
                                        <option value="12">Décembre</option>
                                    </optgroup>
                                </select>
                                <input class="form-control" type="number" min="1958" max="2033" value="2000" name="anneeFin" style="width: 123px;" id="anneeFin"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-primary float-none d-lg-flex" data-bss-hover-animate="pulse" type="submit" style="margin-right: 15px;margin-left: 15px;margin-bottom: 15px;width: 194.5px;text-align: center;margin-top: 22px;color: var(--bs-body-bg);border-color: var(--color-brown);background: var(--color-brown);">Ajouter votre formation</button>
                            </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <div style="display:flex; justify-content: center;">
            <div class="btn-group" role="group" style="width:35%">
                <a href="editCoordonnee.php" style="color: var(--color-brown); margin:5%"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="order-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Précédent (coordonnées)</button></a>
                <a href="editExperience.php" style="color: var(--color-brown); margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style=" border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);">Suivant (expérience)</button></a>
        
            </div>
        </div>
    </section>
</div>

<script src="../assets/js/edit.js"></script>
<script>
    window.addEventListener("load", function () {
        this.document.getElementById("btnAjoutFormation").addEventListener("click", ajouterFormation);
    });
</script>

{% endblock %}