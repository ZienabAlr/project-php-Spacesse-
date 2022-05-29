document.querySelector("#btnAddComment").addEventListener("click", function(){

    console.log("clicked");
    
    let postId = this.dataset.postid;
    let text = document.querySelector("#commentText").value;
    
    
    
    // post naar database (AJAX)
    let formData = new FormData();
    
    formData.append("text", text);
    formData.append("postId", postId);
    
    
    fetch("AJAX/savecomment.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(result => {
      // create element. But! Element is not shown on page (Front-end)
     let newElement =  document.createElement("li"); // <li></li>
     newElement.innerHTML = result.body; // <li>This is a comment</li>
    
     // Place & show element in the correct place (ul.post__comments__list)
     let selectedElemnt =  document.querySelector(".post__comments__list"); // selected (ul) element
     selectedElemnt.appendChild(newElement); // put new comment as a child in the list (ul)
    })
    .catch(error => {
      console.error("Error:", error);
    });
    
    // antwoord ok? toon comment onderaan
    });