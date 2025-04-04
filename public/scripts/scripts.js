const loadScriptButton = document.getElementById('loadScriptButton')

function loadExternalScript() {
    const script = document.createElement('script')
    script.src = 'public/scripts/apiRest.js'
    script.type = 'text/javascript'

    document.body.appendChild(script)

    script.onerror = function() {
        console.error('Erreur lors du chargement du script');
    };
}

loadScriptButton.addEventListener('click', loadExternalScript);
