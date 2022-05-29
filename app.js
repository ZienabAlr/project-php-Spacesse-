document.querySelector("#like").addEventListener("click", function(e){

    // alle data die we nodig hebben op het juist moment "op click" ophalen, in een form stoppen "#1" en doorsturen naar php "#2"
    console.log("we are liking ");
    e.preventDefault();


    // let postId = this.data.postId;
    let postId=e.target.dataset.postid;
    console.log(postId);


    // post naar database (AJAX)
    // json zit puur in javascript en json kent geen php variabelen 
    // fetch biedt een jevescript-interface voor de toegeng tot http en het manipuleren van 
    // van delen  van de HTTP HTTP-pijplijn, zoals verzoeken en antwoorden. Het biedt ook een 
    //globale fetch()-methode die een gemakkelijke, logische manier biedt om bronnen asynchroon over het netwerk op te halen.
    // Anynchronous het script stuurt een verzoek naar de server en zet de uitvoering voort zonder op het antwoord te wachten.
    // De communicatie kan gebeuren met een timer (Gmail), wachten op een klik,
    //delen van een webpagina bij te werken, zonder de hele pagina opnieuw laden.

    const formData = new FormData();
        formData.append('postId', postId);
        fetch("8888/project-php-Spacesse-/saveLike.php", {
            method: 'POST',
            body: formData
            })
                .then(response => response.json())
                .then(result => {
                    console.log('Success:', result);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
    
    
        // postid ?
    
        
    
    
    
        // antwoord ok? toon like
    
       
    });
