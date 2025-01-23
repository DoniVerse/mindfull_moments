const players = Array.from({ length: 15 }, (_, index) => {
  return {
      audio: document.getElementById(`audio-${index + 1}`),
      playButton: document.getElementById(`play-${index + 1}`),
      pauseButton: document.getElementById(`pause-${index + 1}`),
      prevButton: document.getElementById(`prev-${index + 1}`),
      nextButton: document.getElementById(`next-${index + 1}`),
      progress: document.getElementById(`progress-${index + 1}`),
      volume: document.getElementById(`volume-${index + 1}`)
  };
});

// Play audio
players.forEach((player, index) => {
  player.playButton.addEventListener('click', () => {
      players.forEach(p => p.audio.pause()); // Pause all other players
      player.audio.play();
  });

  // Pause audio
  player.pauseButton.addEventListener('click', () => {
      player.audio.pause();
  });

  // Update progress bar
  player.audio.addEventListener('timeupdate', () => {
      const percent = (player.audio.currentTime / player.audio.duration) * 100;
      player.progress.value = percent;
  });

  // Seek audio
  player.progress.addEventListener('input', () => {
      const seekTime = (player.progress.value / 100) * player.audio.duration;
      player.audio.currentTime = seekTime;
  });

  // Change volume
  player.volume.addEventListener('input', () => {
      player.audio.volume = player.volume.value / 100;
  });

  // Next and Previous functionality (to be implemented)
  player.nextButton.addEventListener('click', () => {
    const nextIndex = (index + 1) % players.length; // Loop back to the first track
    players.forEach(p => p.audio.pause()); // Pause all players
    players[nextIndex].audio.play();
  });

  player.prevButton.addEventListener('click', () => {
    const prevIndex = (index - 1 + players.length) % players.length; // Loop back to the last track
    players.forEach(p => p.audio.pause()); // Pause all players
    players[prevIndex].audio.play();
  });
});
