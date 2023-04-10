{% extends "templateBase.tpl" %}

{% block contenu %}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

    <script>
            window.addEventListener('DOMContentLoaded', function() 
            {
                var para = window.location.search;
                var result = getNav("editProjets.php"+para, "edit");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        <div style="margin-left:15%; width:85%;">

            <h1 class="text-center" style="padding-top: 30px;">Page de Projets</h1>

            <div id=editorjs style="margin-top: 5%;margin-left:5%; margin-right:5%;">{{ projets.getContenu() }}</div>

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
                editor.save().then((output) => {

                    var contenu = JSON.stringify(output.blocks);
                    $.ajax({
                        type : 'POST',
                        url : 'editProjets.php',
                        data : {contenu: contenu},
                        success: function(response) {
                            alert(response);
                        }
                    });
                }).catch((error) => {
                    console.log('Saving failed: ', error)
                });
            });



        </script>
    </div>
{% endblock %}