$( document ).ready(init);

function init(){
        getProfile();
        $('#editBtn').click(function(event) {
            editProfile(event);
            getProfile();
        });
}


function setEditInfo(){
        var name = $("#nameInput").val();
        var description = $("#descriptionInput").val();
        var image = $("#userImage");
        var userImage = image[0].files[0];
        
        // console.log(image, image);
        
        var data = new FormData();
        data.append('userImage', userImage);
        data.append('name', name);
        data.append('description', description);
         
        
        console.log("Name: ", name, ". description: ", description, ". image: " , userImage);
       return data;
}

function editProfile(event){
        event.preventDefault();
        
        $.ajax({
                url: "https://web-10-2-grigorita.c9users.io/api/users/update",
                method: "POST",
                data: setEditInfo(),
                processData: false,
                contentType: false,
                success: function(result){
                        console.log(result);
                },
                error: function(XHR, textStatus, error){
                        console.log("edit user data not working! ", error);
                },
                complete: function(XHR, testStatus){
                        
                },
        });
}

function getProfile(){
    $.ajax ({
        url: 'https://web10-2-lazarnicku.c9users.io/api/users/profile',
        method: 'POST',
        data: {
            
        },
        success: function (result){
            $("#nameInput").val(result[0].name);
            $("#descriptionInput").val(result[0].description);
            var imgSource =  "../" + result[0].image;
            $("#myImage").attr("src", imgSource);
            console.log(result);
        },
        error: function (XHR, status, error){
            alert ("Unable to get article.");
        },
        complete: function( XHR, status) {},
    })
}