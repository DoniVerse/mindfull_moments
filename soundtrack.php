<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soundtrack</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    background-color:#F1F0E8;
    color: #ffffff;
    font-family: 'Varela Round', sans-serif;
}
.container {
    flex-grow: 1;
    min-height: 72vh;
    background-color: #F1F0E8;
    color: black;
    font-family: 'Varela Round', sans-serif;
    margin: 23px auto;
    border-radius: 12px;
    padding: 34px;
}

.bottom {
    position: sticky;
    bottom: 0;
    height: 135px;
    background-color: black;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.songItemContainer {
    margin-top: 74px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 50px;
}

.songItem {
    height: 300px;
    width: 200px;
    display: flex;
    flex-direction: column;
    background-color: #89A8B2;
    color: black;
    margin: 12px 0;
    justify-content: center;
    align-items: center;
    border-radius: 15px;
    text-align: center;
}

.songItem img {
    width: 150px;
    margin: 16px 0;
    border-radius: 34px;
}

.songName {
    margin: 8px 0;
    color: white;
}

.timestamp {
    margin: 8px 0;
    color: white;
}

.timestamp i {
    cursor: pointer;
}

.songInfo {
    position: absolute;
    left: 10vw;
    font-family: 'Varela Round', sans-serif;
}

.songInfo img {
    opacity: 0;
    transition: opacity 0.4s ease-in;
}

@media only screen and (max-width: 1500px) {
    .songItemContainer {
        margin-top: 74px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 50px;
    }
}

@media only screen and (max-width: 1100px) {
    .songItemContainer {
        margin-top: 74px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
    }
}

@media only screen and (max-width: 600px) {
    .songItemContainer {
        margin-top: 74px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 50px;
    }
}


#masterSongName{
    font-size: 25px;
    font-weight: 600px;
}


    .songItem {
        display: flex;
        align-items: center;
        padding: 10px;
    }

    

    .songName {
        font-size: 20   px;
    }
</style>
</head>
<body>
<div class="container">
            <div class="songList">
                <h1 style="font-size:50px; font-weight:800;">Relaxing Sounds</h1>
                <div class="songItemContainer">
                    <div class="songItem">
                        <img src="./songIMG/1.jpg" alt="1">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">02:13 <i id="0" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/2.jpg" alt="2">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp">02:33 <i id="1" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/3.jpg" alt="3">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"><i id="2" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/4.jpg" alt="4">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"><i id="3" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/5.jpg" alt="5">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="4" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/6.jpg" alt="6">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="5" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/7.jpg" alt="7">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="6" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/8.jpg" alt="8">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="7" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/9.jpg" alt="9">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="8" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/10.jpg" alt="10">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="9" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/11.jpg" alt="11">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"><i id="10" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/12.jpg" alt="12">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="11" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/13.jpg" alt="13">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="12" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/14.jpg" alt="14">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="13" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/15.jpg" alt="15">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"> <i id="14" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                    <div class="songItem">
                        <img src="./songIMG/16.jpg" alt="16">
                        <span class="songName"> </span>
                        <span class="songlistplay"><span class="timestamp"><i id="15" class="far songItemPlay fa-play-circle"></i> </span></span>
                    </div>
                </div>
               
            </div>
            <div class="songBanner"></div>
        </div>
    </div>

    <div class="bottom">
        <input type="range" name="range" id="myProgressBar" min="0" value="0" max="100">
        <div class="icons">
            <i class="fas fa-3x fa-step-backward" id="previous"></i>
            <i class="far fa-3x fa-play-circle" id="masterPlay"></i>
            <i class="fas fa-3x fa-step-forward" id="next"></i>
        </div>
        <div class="songInfo">
            <img src="./playing.gif" width="42px" alt="" id="gif"> <span id="masterSongName">sound</span>
        </div>
    </div>
    <script src="javascript./sound.js"></script>
    <script src="https://kit.fontawesome.com/26504e4a1f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>