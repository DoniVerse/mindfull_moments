const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')
const sideprofile = document.getElementById('profilePic')
const profileMenu = document.getElementById('profileMenu')

function toggleSidebar(){
  sideprofile.classList.toggle('close')
  profileMenu.classList.toggle('close')
  sidebar.classList.toggle('close')
  toggleButton.classList.toggle('rotate')

  closeAllSubMenus()
}

function toggleSubMenu(button){

  if(!button.nextElementSibling.classList.contains('show')){
    closeAllSubMenus()
  }

  button.nextElementSibling.classList.toggle('show')
  button.classList.toggle('rotate')

  if(sidebar.classList.contains('close')){
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')
  }
}

function closeAllSubMenus(){
  Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
    ul.classList.remove('show')
    ul.previousElementSibling.classList.remove('rotate')
  })
}
function previewImage(event) {
  // Get the selected file from the input
  const file = event.target.files[0]; 
  
  // Check if a file was selected
  if (file) {
      // Get the <img> element by its ID
      const preview = document.getElementById('profilePreview');
      
      // Create a URL for the selected file and set it as the <img> source
      preview.src = URL.createObjectURL(file); 
  }
}
// Toggle Sidebar
function toggleSidebar() {
  sidebar.classList.toggle("close");
}

// Toggle Profile Menu
function toggleProfileMenu() {
  const profileMenu = document.getElementById("profileMenu");
  profileMenu.classList.toggle("show");
}
// function toggleProfileMenu() {
//   const profileMenu = document.getElementById("profileMenu");
//   profileMenu.classList.toggle("hidden");
// }