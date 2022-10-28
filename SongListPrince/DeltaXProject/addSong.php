
<?php
// including menu.php for menu on the page
  include('menu.php');
  
?>

<div class="addSong">

    <form action="saveSong.php" method="POST" id="submitSong" name="mySong"  enctype="multipart/form-data">
        <div class="form-group row" style="padding: 15px;">
            <label for="SongName_lbl" class="col-sm-2 col-form-label">Song Name</label>
            <div class="col-sm-3">
                <input class="form-control" name="songName" >
                <!-- <p id="fillSong"style="color:red; display:none">Song Name must be filled out</p> -->
            </div>
        </div>
        <div class="form-group row" style="padding: 15px;">
            <label for="DateReleased_lbl3" class="col-sm-2 col-form-label">Date Released</label>
            <div class="col-sm-3">
                <input class="form-control" type="date" name="releasedDate">
                <!-- <p >id="fillDate" style="color:red; display:none;">Song Name must be filled out</p> -->
            </div>
        </div>

        <div class="form-group" style="padding: 15px;">
            <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Artwork</label>
            <div class="col-sm-3" style="margin: auto;display: contents;">
                <input type="file" class="form-control-file" placeholder="Upload Image" name="uploadImage">
                    <!-- <p id="fillFile" style="color:red; display:none;">Song Name must be filled out</p> -->
            </div>

        </div>
        <div class="form-group" style="padding: 15px;float:left; width:100%; display:inline-flex;">
            <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Artists</label>
            <div class="demo-example" id="artList">

                <!-- this code is responsible for fetching the artist data in the drop down on page load -->

                    <!-- <p id="fillArtist" style="color:red; display:none;">Song Name must be filled out</p> -->
                    <p id="addArtist" style="color:red; display:none;">Artist Added</p>
            </div>

            <!-- this button will display the artist form and section to insert or save the data -->
            <div class="openBtn" style="height:100px; width:40%; display:table">
                <button style="margin:0px 160px 10px 0px; float:right" onclick="openForm()" id="addArtistbtn" 
                type="button" class="btn btn-primary">AddArtist</button>
            </div>

        </div>



        


        <div class="container h-100" id="popupForm" class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11" style=" box-shadow: 0px 5px 10px 0px black;">
                <div class="card text-black">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example1c">Artist Name</label>
                                        <input type="text" name="artName" id="artistName" class="form-control" />
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example3c">Date Of Birth</label>
                                        <input type="date" name="artDob" id="artistDob" class="form-control"  />
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="form3Example4c">Bio</label>
                                        <textarea type="text"name="artBio" id="artistBio" class="form-control" ></textarea>
                                        
                                    </div>
                                </div>



                                <div class="btnCont" >

                                <!-- this button is to save the artist data using ajax without the page load
                                     after saving it will close the popup -->

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="button" onclick="closeForm()" id="saveArtist" class="btn btn-primary btn-lg" >Save Artist</button>
                                    </div>
                                    <!-- this cancel button will close the artist section or popup -->
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="button" onclick="closeForm()" id="cancelArtist"
                                            class="btn btn-primary btn-lg">Cancel</button>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="songSubmit" style="padding: 15px;">

            <div class="form-group row">
            <!-- this button is responsile for saving the song data in the data base -->
            <div class="col-sm-15">
                <button type="submit" name="saveSong" form="submitSong" class="btn btn-primary">Save Song</button>
            </div>
            
        </div>
        <div class="form-group row">
                <!-- this button is responsile for refreshing the page -->
                <div class="col-sm-5">
                    <button type="button" onClick="loadOnCancel()" class="btn btn-primary">Cancel</button>
                </div>

            </div>
            
        </div>


    </form>

</div>


<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/jquery.multi-select.js"></script>

<!-- to validate form jquery files -->
<script type="text/javascript" src="js/script.js"></script>


 </body>

</html>