<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PageCVCoord</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
    <style>
        .ce-block__content, 
        .ce-toolbar__content { 
            max-width: calc(100% - 100px) !important; 
        } 
        .cdx-block { 
            max-width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="text-start">

        <?php  

            include '../common/nav.inc.php';

            getNav("Accueil.php");

        ?>
        
        

        <div style="margin-left:15%; width:85%;">

            <h1 class="text-center" style="padding-top: 30px;">Page d'Accueil</h1>

            <div id=editorjs style="margin-top: 5%;margin-left:5%; margin-right:5%;"></div>

            <!-- bouton au milieu de la page -->
            <div style="display:flex; justify-content:center">
            <button id=save class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button>
            </div>

        </div>

        <script src="ckeditor/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/editorjs-text-color-plugin@2.0.2/dist/bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editorjs-paragraph-with-alignment@3.0.0"></script>

        <!-- Load Editor.js's Core -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

        <script> 

            var editor = new EditorJS({
                holder: 'editorjs',
                tools: {
                    // Liste des outils que vous souhaitez utiliser
                    header: {
                        class: Header,
                        inlineToolbar: true,
                    },

                    image: SimpleImage,

                    list: {
                        class: List,
                        inlineToolbar: true
                    },

                    Color: {
                        class: ColorPlugin, // if load from CDN, please try: window.ColorPlugin
                        config: {
                            colorCollections: ['#EC7878','#9C27B0','#673AB7','#3F51B5','#0070FF','#03A9F4','#00BCD4','#4CAF50','#8BC34A','#CDDC39', '#FFF'],
                            defaultColor: '#FF1300',
                            type: 'text', 
                            customPicker: true // add a button to allow selecting any colour  
                    }     
                    },
                    Marker: {
                        class: ColorPlugin, // if load from CDN, please try: window.ColorPlugin
                        config: {
                            defaultColor: '#FFBF00',
                            type: 'marker',
                            icon: `<svg fill="#000000" height="200px" width="200px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M17.6,6L6.9,16.7c-0.2,0.2-0.3,0.4-0.3,0.6L6,23.9c0,0.3,0.1,0.6,0.3,0.8C6.5,24.9,6.7,25,7,25c0,0,0.1,0,0.1,0l6.6-0.6 c0.2,0,0.5-0.1,0.6-0.3L25,13.4L17.6,6z"></path> <path d="M26.4,12l1.4-1.4c1.2-1.2,1.1-3.1-0.1-4.3l-3-3c-0.6-0.6-1.3-0.9-2.2-0.9c-0.8,0-1.6,0.3-2.2,0.9L19,4.6L26.4,12z"></path> </g> <g> <path d="M28,29H4c-0.6,0-1-0.4-1-1s0.4-1,1-1h24c0.6,0,1,0.4,1,1S28.6,29,28,29z"></path> </g> </g></svg>`
                            }       
                    },

                    checklist: {

                        class: Checklist,
                        inlineToolbar: true
                    },
                    
                    table: {
                        class: Table,
                        inlineToolbar: true,
                        },
                    
                    quote: {
                    class: Quote,
                    inlineToolbar: true,
                    config: {
                        quotePlaceholder: 'Enter a quote',
                        captionPlaceholder: 'Quote\'s author',
                    }
                    },

                }
            });

            //enregistrement du contenu de l'éditeur dans la base de données
            document.getElementById('save').addEventListener('click', function() 
            {
                editor.save().then((outputData) => 
                {
                    console.log('Article data: ', outputData);
                    var data = JSON.stringify(outputData);
                    console.log(data);

                }).catch((error) => {
                    console.log('Saving failed: ', error);
                });
            });



        </script>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
    
</body>

</html>