import EditorJS from '@editorjs/editorjs'; 
import Header from '@editorjs/header';
import SimpleImage from '@editorjs/simple-image';
import List from '@editorjs/list';
import Checklist from '@editorjs/checklist';
import Quote from '@editorjs/quote';


var editor = new EditorJS({
    holder: "editorjs",
    tools: {
      // Liste des outils que vous souhaitez utiliser
      header: {
        class: Header,
        inlineToolbar: true
      },
      image: SimpleImage,
      list: {
        class: List,
        inlineToolbar: true
      },
        checklist: {
        class: Checklist,
        inlineToolbar: true
        },
        quote: {
        class: Quote,
        inlineToolbar: true,
        config: {
            quotePlaceholder: 'Enter a quote',
            captionPlaceholder: 'Quote\'s author',
        }
    }
  }
  });

