var app = document.getElementById('app');
    
    var typewriter = new Typewriter(app, {
        loop: false
    });
    
    typewriter.typeString('The Aulab Post')
        .start();