{% extends "templateBase.tpl" %}

{% block contenu %}

<div class="text-start">
    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%;  margin-top:55px;"> </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() 
        {
            var result = getNav("editCoordonnees.php", "edit");
            var id = document.getElementById("nav");
            id.innerHTML = result;
        });
    </script>

    <section class="text-start" style="margin-left:15%; width:85%;">
        <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Coordonnées</h2>
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 70%;height: 40%;border: 1px solid; margin-top:5%;">
            <form method="POST" style="padding:5%;">
                <div class="row profile-row">
                    <div class="col-md-4 relative">
                        <div class="avatar">
                            <div class="avatar-bg center" style="width: 150px;height: 150px;"></div>
                        </div><input class="form-control form-control form-control" type="file" name="avatar-file" style="margin-top: 8px;">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label">Prénom</label>
                                    <input class="form-control form-control" type="text" name="prenom" value="{{ coordonnees.getPrenom() }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label">Nom</label>
                                    <input class="form-control form-control" type="text" name="nom" value="{{ coordonnees.getNom() }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label class="form-label form-label">Intitulé du Poste</label>
                                    <input class="form-control form-control" name="intitulePoste" type="text" value="{{ coordonnees.getNomPoste() }}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <label class="form-label form-label">Adresse</label>
                                    <input class="form-control form-control" name="adr" type="text" value="{{ coordonnees.getAdresse() }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label">Code Postal</label>
                                    <input class="form-control form-control" name="codePostal" type="number" value="{{ coordonnees.getCodePostal() }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label">Ville</label>
                                    <input class="form-control form-control" name="ville" type="text" value="{{ coordonnees.getVille() }}"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label class="form-label form-label">Téléphone</label>
                                    <input class="form-control form-control" name="tel" type="tel" value="{{ coordonnees.getTelephone() }}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <label class="form-label form-label">Adresse e-mail</label>
                                    <input class="form-control form-control" name="mail" type="email" value="{{ coordonnees.getEmail() }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <h4 class="text-center" style="margin:2%;" >Ajoutez une phrase d'accroche</h4>
        <!--mettre le textarea dans un div pour pouvoir le centrer-->
        <div style="width: 50%;height: 60%;border: 1px solid;margin-left:25%; margin-right:25%; margin-bottom:5%;">
            <textarea name="accroche" class="form-control" readonly>{{ coordonnees.getPhraseAccroche() }}</textarea> 
        </div>
        
        <div style="display:flex; justify-content: center;">
            <div class="btn-group" role="group" style="width:50%">
                <a href="CVResume.php" style="color: var(--color-brown); margin:5%"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="order-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Précédent (résumé)</button></a>
                <a href="#" style="margin:10%;"></a>
                <a href="consultFormation.php" style="color: var(--color-brown); margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style=" border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);">Suivant (Formations)</button></a>
            </div>
        </div>
    </section>
</div>

{% endblock %}