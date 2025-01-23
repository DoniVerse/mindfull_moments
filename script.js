document.addEventListener('DOMContentLoaded', () => {
    // Select all labels
    const labels = document.querySelectorAll('.label');

    labels.forEach(label => {
        label.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior
            const activityCard = event.target.closest('.activity-card');
            const videoSrc = activityCard.getAttribute('data-video');
            const mainVideo = document.getElementById('mainVideo');

            // Change the source of the main video
            mainVideo.src = videoSrc;
            mainVideo.play(); // Play the new video
        });
    });
});