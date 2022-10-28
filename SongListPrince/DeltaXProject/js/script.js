




// this script is for display the artist section and close the artist section on button click 

    function openForm() {
        document.getElementById("popupForm").style.display = "block";
        document.getElementById("popupForm").style.opacity = 1;
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
        document.getElementById("popupForm").style.opacity = 0;
    }
    
    
    function loadOnCancel() {
    window.location.href="http://localhost/DeltaXProject/addSong.php";  
    }



// Validation for submission of song fields 


// $("#submitSong").submit(function (e) {
//     var validationFailed = false;
//     var song=document.mySong.songName.value;
//     var releaseDate=document.mySong.releasedDate.value;
//     var uploadImage=document.mySong.uploadImage.value;
//     var artistName=document.mySong.artistName.value;

//     if(song==null||song=="")
//     {
//         document.getElementById("fillSong").style.display = "block";
//         var validationFailed = false;
//     }
//     else if(releaseDate==null||releaseDate=="")
//     {
//         document.getElementById("fillDate").style.display = "block";
//         var validationFailed = false;
        
//     }
//     else if(uploadImage==null||uploadImage=="")
//     {
//         document.getElementById("fillFile").style.display = "block";
//         var validationFailed = false;
        
//     }
//     else if(artistName==null||artistName=="")
//     {
//         document.getElementById("fillArtist").style.display = "block";
//         var validationFailed = false;
        
//     }
    
//     if (validationFailed) {
//        e.preventDefault();
//        return false;
//     }
    
//  }); 





//this script file is for multiselect artist 

            // multiselect will work on id people using jquery
        $(function() {
            $('#people').multiSelect();
        });
    

    //using ajax multiselect of Artist will load on page load 
    

            $(document).ready(function(){
                function loadArtist(){
                    $.ajax({
                        url:"loadArtist.php",
                        type:"POST",
                        success:function(data){
                            $("#artList").html(data);
                        }
                    });
                }
                loadArtist();

            });


        // live search song 
            $(document).ready(function(){
               
               
                $("#searchSongbtn").on("keyup",function(){

                    var search_term=$(this).val();

                    $.ajax({
                        url:"searchLiveSong.php",
                        type:"POST",
                        data:{search:search_term},
                        success:function(data)
                        {
                            $("#searchBox").html(data);
                        }

                    });
                });

            });
    
        

    


// using ajax multislect of Artist data will send for saving the new artist 

$(document).ready(function(){
    $("#saveArtist").on("click",function(e){
        e.preventDefault();
        var artName=$("#artistName").val();
        var artDob=$("#artistDob").val();
        var artBio=$("#artistBio").val();
        // this ajax will save the artist into the database without page load 
        $.ajax({
            url:"addArtist.php",
            type:"POST",
            data:{art_name:artName,art_dob:artDob,art_bio:artBio},
            success:function(data){
                if(data==1)
                {
                    document.getElementById("addArtist").style.display = "block";
                    
                }
                else{
                }
                
            }
        });

        
    });
});



// it will load ARTIST in multiselect from the database
$(document).ready(function(){
$("#saveArtist").on("click",function(e){
    e.preventDefault();
    $.ajax({
                url:"loadArtist.php",
                type:"POST",
                success:function(data){
                    $("#artList").html(data);
                }
            });
        });
    });
           


//star rating jquery and Ajax for storing the rate of stars 
           
