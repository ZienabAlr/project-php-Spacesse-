document.querySelector("#like").addEventListener("click", function(e){

    // alle data die we nodig hebben op het juist moment "op click" ophalen, in een form stoppen "#1" en doorsturen naar php "#2"
    console.log("we are liking ");
    e.preventDefault();

    let postId=e.target.dataset.postid;
    console.log(postId);

    let formData = new FormData();
        formData.append('postId', postId);
        fetch("ajax/saveLike.php", {
            method: 'POST',
            body: formData
            })
                .then(response => response.json())
                .then(result => {
                    console.log('Success:', result);
                    document.querySelector("#like").innerHTML ="❤️You liked this";

                })
                .catch(error => {
                    console.error('Error:', error);
                });
    

    
       
    });
