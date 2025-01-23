let songIndex = 0;
let audioElement = new Audio("songs/song1.mp3");
let gif = document.getElementById("gif");
let songItem = Array.from(document.getElementsByClassName("songItem"));
let masterSongName = document.getElementById("masterSongName");
let uploadSong = document.getElementById("uploadSong");
let uploadImage = document.getElementById("uploadImage");
let songNameInput = document.getElementById("songNameInput");

let songs = [
  {
    songName: "emotional piano music",
    filePath: "songs/song1.mp3",
    coverPath: "songIMG/img1.jpg",
  },
  {
    songName: "Tibet",
    filePath: "songs/song3.mp3",
    coverPath: "songIMG/img2.jpg",
  },
  {
    songName: "Leberchmus",
    filePath: "songs/song4.mp3",
    coverPath: "songIMG/img3.jpg",
  },
  {
    songName: "Sedative",
    filePath: "songs/song5.mp3",
    coverPath: "songIMG/img4.jpg",
  },
  {
    songName: "DayNightMorning",
    filePath: "songs/song6.mp3",
    coverPath: "songIMG/img5.jpg",
  },
  {
    songName: "The Craddle of your soul",
    filePath: "songs/song7.mp3",
    coverPath: "songIMG/img6.jpg",
  },
  {
    songName: "perfect beauty",
    filePath: "songs/song8.mp3",
    coverPath: "songIMG/img7.jpg",
  },
  {
    songName: "December Memories",
    filePath: "songs/song9.mp3",
    coverPath: "songIMG/img8.jpg",
  },
  {
    songName: "Night street",
    filePath: "songs/song10.mp3",
    coverPath: "songIMG/img9.jpg",
  },
  {
    songName: "Sigma",
    filePath: "songs/song11.mp3",
    coverPath: "songIMG/img10.jpg",
  },
  {
    songName: "Aura",
    filePath: "songs/song12.mp3",
    coverPath: "songIMG/img11.jpg",
  },
  {
    songName: "Whisper",
    filePath: "songs/song13.mp3",
    coverPath: "songIMG/img12.jpg",
  },
  {
    songName: "Morning Garden",
    filePath: "songs/song14.mp3",
    coverPath: "songIMG/img13.jpg",
  },
  {
    songName: "Smoke",
    filePath: "songs/song15.mp3",
    coverPath: "songIMG/img14.jpg",
  },
];

songItem.forEach((element, i) => {
  element.getElementsByTagName("img")[0].src = songs[i].coverPath;
  element.getElementsByClassName("songName")[0].innerText = songs[i].songName;
});

masterPlay.addEventListener("click", () => {
  console.log("Play button clicked");
  if (audioElement.paused || audioElement.currentTime <= 0) {
    audioElement.play().then(() => {
      console.log("Audio is playing");
    }).catch((error) => {
      console.error("Error playing audio:", error);
    });
    masterPlay.classList.remove("fa-play-circle");
    masterPlay.classList.add("fa-pause-circle");
    gif.style.opacity = 1;
  } else {
    audioElement.pause();
    console.log("Audio is paused");
    masterPlay.classList.remove("fa-pause-circle");
    masterPlay.classList.add("fa-play-circle");
    gif.style.opacity = 0;
  }
});

audioElement.addEventListener("timeupdate", () => {
  let prog = parseInt((audioElement.currentTime / audioElement.duration) * 100);
  myProgressBar.value = prog;
});

myProgressBar.addEventListener("change", () => {
  audioElement.currentTime =
    (myProgressBar.value * audioElement.duration) / 100;
});

const makeAllPlays = () => {
  Array.from(document.getElementsByClassName("songItemPlay")).forEach(
    (element) => {
      element.classList.remove("fa-pause-circle");
      element.classList.add("fa-play-circle");
    }
  );
};

Array.from(document.getElementsByClassName("songItemPlay")).forEach(
  (element) => {
    element.addEventListener("click", (e) => {
      makeAllPlays();
      songIndex = parseInt(e.target.id);
      e.target.classList.remove("fa-play-circle");
      e.target.classList.add("fa-pause-circle");
      audioElement.src = `songs/${songIndex + 1}.mp3`;
      masterSongName.innerText = songs[songIndex].songName;
      audioElement.currentTime = 0;
      audioElement.play().then(() => {
        console.log("Audio is playing");
      }).catch((error) => {
        console.error("Error playing audio:", error);
      });
      gif.style.opacity = 1;
      masterPlay.classList.remove("fa-play-circle");
      masterPlay.classList.add("fa-pause-circle");
    });
  }
);

document.getElementById("next").addEventListener("click", () => {
  if (songIndex >= songs.length - 1) {
    songIndex = 0;
  } else {
    songIndex += 1;
  }
  audioElement.src = `songs/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play().then(() => {
    console.log("Audio is playing");
  }).catch((error) => {
    console.error("Error playing audio:", error);
  });
  masterPlay.classList.remove("fa-play-circle");
  masterPlay.classList.add("fa-pause-circle");
});

document.getElementById("previous").addEventListener("click", () => {
  if (songIndex <= 0) {
    songIndex = 0;
  } else {
    songIndex -= 1;
  }
  audioElement.src = `songs/${songIndex + 1}.mp3`;
  masterSongName.innerText = songs[songIndex].songName;
  audioElement.currentTime = 0;
  audioElement.play().then(() => {
    console.log("Audio is playing");
  }).catch((error) => {
    console.error("Error playing audio:", error);
  });
  masterPlay.classList.remove("fa-play-circle");
  masterPlay.classList.add("fa-pause-circle");
});

searchButton.addEventListener("click", () => {
  let query = searchInput.value.toLowerCase();
  let filteredSongs = songs.filter((song) =>
    song.songName.toLowerCase().includes(query)
  );

  if (filteredSongs.length > 0) {
    songItem.forEach((element, i) => {
      if (i < filteredSongs.length) {
        element.style.display = "flex";
        element.getElementsByTagName("img")[0].src = filteredSongs[i].coverPath;
        element.getElementsByClassName("songName")[0].innerText =
          filteredSongs[i].songName;
        element.getElementsByClassName("songItemPlay")[0].id = songs.indexOf(
          filteredSongs[i]
        );
      } else {
        element.style.display = "none";
      }
    });
  } else {
    songItem.forEach((element) => {
      element.style.display = "none";
    });
  }
});

addSongButton.addEventListener("click", () => {
  const songFile = uploadSong.files[0];
  const imageFile = uploadImage.files[0];
  const songName = songNameInput.value;

  if (songFile && songName) {
    const songUrl = URL.createObjectURL(songFile);
    const imageUrl = imageFile ? URL.createObjectURL(imageFile) : "./songIMG/default.jpg";

    const newSong = {
      songName: songName,
      filePath: songUrl,
      coverPath: imageUrl,
    };
    songs.push(newSong);

    const newElement = document.createElement("div");
    newElement.classList.add("songItem");
    newElement.innerHTML = `
            <img src="${newSong.coverPath}" alt="cover">
            <span class="songName">${newSong.songName}</span>
            <span class="songlistplay">
                <span class="timestamp">00:00 <i class="far songItemPlay fa-play-circle"></i> </span>
            </span>`;

    document.querySelector(".songItemContainer").appendChild(newElement);
    songItem.push(newElement);

    newElement.querySelector(".songItemPlay").addEventListener("click", (e) => {
      makeAllPlays();
      songIndex = songs.length - 1;
      e.target.classList.remove("fa-play-circle");
      e.target.classList.add("fa-pause-circle");
      audioElement.src = newSong.filePath;
      masterSongName.innerText = newSong.songName;
      audioElement.currentTime = 0;
      audioElement.play().then(() => {
        console.log("Audio is playing");
      }).catch((error) => {
        console.error("Error playing audio:", error);
      });
      gif.style.opacity = 1;
      masterPlay.classList.remove("fa-play-circle");
      masterPlay.classList.add("fa-pause-circle");
    });
  }
});
