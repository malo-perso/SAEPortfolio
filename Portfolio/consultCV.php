<?php
    ini_set('display_errors', 1);
    require ("../common/DB.inc.php");


    require_once( "../Twig/lib/Twig/Autoloader.php" );

        Twig_Autoloader::register();
       
        $twig = new Twig_Environment( new Twig_Loader_Filesystem("../TemplatesCV"));    

   
        //récuperration des données du CV
        $db = DB::getInstance();
       
        if ($db == null) {
            echo "Impossible de se connecter à la base de données !\n";
        }
        else 
        {
            
            $CV = $db->getPage("CV",$_GET['idPortfolio']);

            $contenu = json_decode($CV->getContenu(), true);
            $CV_courant = new CV();
            $CV_courant->tabToCV($contenu);

            $coordonnees = $CV_courant->getCoordonnees();
            $formations = $CV_courant->getTabFormations();
            $experiences = $CV_courant->getTabExperiences();
            $competence = $CV_courant->getCompetences();
            $softskills = $competence->getSoftSkills();
            $hardskills = $competence->getHardSkills();
            $langue = $CV_courant->getTabLangues();
            $couleur = $CV_courant->getCouleur();
            $template = $CV_courant->getTemplate();

            $tpl = $twig->loadTemplate( $template );
           
        }

    
        echo $tpl->render(array(
            'coordonnees' => $coordonnees,
            'formations' => $formations,
            'experiences' => $experiences,
            'softskills' => $softskills,
            'hardskills' => $hardskills,
            'langue' => $langue,
            'couleur' => $couleur
        ));

        /*echo $tpl->render(array(
            'coordonnees' => new Coordonnees("", "Mimi", "Anaelle", "stagiaire","Le Havre", "76600","Le Havre", "06 58 47 24 89", "anaelle@mail.com", "Lorem Ispume dolor es uohgvzrighrz ghrzgihoeirgh uhgfozr hgurghuqhurtgr uyi uqysh iuyr iugtyqepuygerouygerouygh eirugyeuryguyerguyu uyq rtiy tiur iutqy turity eiruyteprtuyeq iurter."),
            'formations' => array( new Formation( "Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013"),
            new Formation("Iut du Havre", "Le Havre", "BUT", "Informatique", "09/2010", "06/2013"),
            new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013")
        ),
            'experiences' => array(new Experience ("1","vendeuse", "Le Havre", "Carrefour", "CDD","Septembre", "2012", "Novembre", "2013", "freigfhreig uorheo ughsquhr guheri guhre^gur eghier uhgre gerhguh rg gerç erhgzh i."),
            new Experience ("1","vendeuse", "Le Havre", "Carrefour", "CDD","Septembre", "2012", "Novembre", "2013", "freigfhreig uorheo ughsquhr guheri guhre^gur eghier uhgre gerhguh rg gerç erhgzh i."),
            new Experience ("1","vendeuse", "Le Havre", "Carrefour", "CDD","Septembre", "2012", "Novembre", "2013", "freigfhreig uorheo ughsquhr guheri guhre^gur eghier uhgre gerhguh rg gerç erhgzh i.")),
            'softskills' => array("Sociable", "Autonome", "Rigoureuse"),
            'hardskills' => array("Java", "C++", "PHP"),
            'langue' => array(new Langue("Anglais", "Courant"), new Langue("Espagnol", "Courant"), new Langue("Italien", "Courant")),
            'couleur' => $couleur
    ));*/


?>