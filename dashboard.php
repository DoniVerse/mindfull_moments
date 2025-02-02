<?php

session_start();

require_once 'includes/autoloader.inc.php';


// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = htmlspecialchars($_SESSION['username']);  
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindful Moments</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/landing.css">
  <script type="text/javascript" src="javascript/landing.js" defer></script>
</head>
<body>
    
  
  <nav id="sidebar">
    


  <ul id="profileMenu" class="profile-menu">
      <li>
          <span class="profile-username" id="usernameDisplay"><?php echo $username?></span>
      </li>
     
  </ul>
    <ul>
      <li>
        <span class="logo">Mindful Moments</span>
        <button onclick=toggleSidebar() id="toggle-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="m313-480 155 156q11 11 11.5 27.5T468-268q-11 11-28 11t-28-11L228-452q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l184-184q11-11 27.5-11.5T468-692q11 11 11 28t-11 28L313-480Zm264 0 155 156q11 11 11.5 27.5T732-268q-11 11-28 11t-28-11L492-452q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l184-184q11-11 27.5-11.5T732-692q11 11 11 28t-11 28L577-480Z"/></svg>
        </button>
        </li>
        <li>
            <a href="dashboard.php">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"fill="rgb(0, 11, 14)"><path d="M520-640v-160q0-17 11.5-28.5T560-840h240q17 0 28.5 11.5T840-800v160q0 17-11.5 28.5T800-600H560q-17 0-28.5-11.5T520-640ZM120-480v-320q0-17 11.5-28.5T160-840h240q17 0 28.5 11.5T440-800v320q0 17-11.5 28.5T400-440H160q-17 0-28.5-11.5T120-480Zm400 320v-320q0-17 11.5-28.5T560-520h240q17 0 28.5 11.5T840-480v320q0 17-11.5 28.5T800-120H560q-17 0-28.5-11.5T520-160Zm-400 0v-160q0-17 11.5-28.5T160-360h240q17 0 28.5 11.5T440-320v160q0 17-11.5 28.5T400-120H160q-17 0-28.5-11.5T120-160Zm80-360h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="mood tracker.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="M620-40q-104 0-183.5-62T331-260q45 2 89-9t84-31h164q1-11 1.5-21.5t.5-21.5q0-9-.5-18.5T668-380h-59q16-18 29.5-38t24.5-42h141q-20-30-48-52.5T693-547q5-20 6.5-41t.5-41q96 26 158 105.5T920-340q0 125-87.5 212.5T620-40Zm-95-102q-7-20-12.5-39t-9.5-39h-67q17 25 39.5 45t49.5 33Zm95 14q12-22 20.5-45t14.5-47h-70q6 24 15 47t20 45Zm95-14q27-13 49.5-33t39.5-45h-67q-5 20-10 39t-12 39Zm33-158h88q2-10 3-19.5t1-20.5q0-11-1-20.5t-3-19.5h-88q1 9 1.5 18.5t.5 18.5q0 11-.5 21.5T748-300Zm-408-20q-125 0-212.5-87.5T40-620q0-125 87.5-212.5T340-920q125 0 212.5 87.5T640-620q0 125-87.5 212.5T340-320Zm0-80q91 0 155.5-64.5T560-620q0-91-64.5-155.5T340-840q-91 0-155.5 64.5T120-620q0 91 64.5 155.5T340-400ZM240-640q17 0 28.5-11.5T280-680q0-17-11.5-28.5T240-720q-17 0-28.5 11.5T200-680q0 17 11.5 28.5T240-640Zm100 176q48 0 85.5-27t54.5-69H200q17 42 54.5 69t85.5 27Zm100-176q17 0 28.5-11.5T480-680q0-17-11.5-28.5T440-720q-17 0-28.5 11.5T400-680q0 17 11.5 28.5T440-640Zm-100 20Z"/></svg>
              <span>Mood Tracker</span>
            </a>
          </li>
          
          <li>
            <a href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"fill="rgb(0, 11, 14)"><path d="M160-400v-80h280v80H160Zm0-160v-80h440v80H160Zm0-160v-80h440v80H160Zm360 560v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>


              <span>Gratitude journal</span>
            </a>
          </li>
          
          <li>
          <li>
            <a href="exercise.html">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="m536-84-56-56 142-142-340-340-142 142-56-56 56-58-56-56 84-84-56-58 56-56 58 56 84-84 56 56 58-56 56 56-142 142 340 340 142-142 56 56-56 58 56 56-84 84 56 58-56 56-58-56-84 84-56-56-58 56Z"/></svg>
              <span>Exercice</span>
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="M480-361q-8 0-15-2.5t-13-8.5L268-556q-11-11-11-28t11-28q11-11 28-11t28 11l156 156 156-156q11-11 28-11t28 11q11 11 11 28t-11 28L508-372q-6 6-13 8.5t-15 2.5Z"/></svg>
              </a>

            <ul class="sub-menu">
              <div>
                <li><a href="yoga.html">Yoga</a></li>
                <li><a href="Pilates.html">Pilates</a></li>
                <li><a href="meditation.html">Meditation</a></li>
              </div>
            </ul>
          </li>
         
              <li>
                        <a href="soundtrack.html">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="M360-120H200q-33 0-56.5-23.5T120-200v-280q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480v280q0 33-23.5 56.5T760-120H600v-320h160v-40q0-117-81.5-198.5T480-760q-117 0-198.5 81.5T200-480v40h160v320Zm-80-240h-80v160h80v-160Zm400 0v160h80v-160h-80Zm-400 0h-80 80Zm400 0h80-80Z"/></svg>
                           
                    
                          <span>Sound Tracks</span>
                        </a>
                      </li>
                    <a href="quiz.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="M560-360q17 0 29.5-12.5T602-402q0-17-12.5-29.5T560-444q-17 0-29.5 12.5T518-402q0 17 12.5 29.5T560-360Zm-30-128h60q0-29 6-42.5t28-35.5q30-30 40-48.5t10-43.5q0-45-31.5-73.5T560-760q-41 0-71.5 23T446-676l54 22q9-25 24.5-37.5T560-704q24 0 39 13.5t15 36.5q0 14-8 26.5T578-596q-33 29-40.5 45.5T530-488ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>

                      <span>quiz</span>
                    </a>
                  </li>

                     <li>
                        <a href="conditions.html">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="m80-280 150-400h86l150 400h-82l-34-96H196l-32 96H80Zm140-164h104l-48-150h-6l-50 150Zm328 164v-76l202-252H556v-72h282v76L638-352h202v72H548ZM360-760l120-120 120 120H360ZM480-80 360-200h240L480-80Z"/></svg>
                          <span>conditions</span>
                        </a>
                      </li>
              
                  </li>
                  <li>
                    <a href="logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 11, 14)"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>

        
                      <span>log out</span>
                    </a>
                  </li>
                  </nav>
                  <main>
                    <div class="container">
                      <h2>Mood tracker</h2>
                      <p>Log your daily emotions and track your mood trends over the past week.</p>
                    </div>
                    <div class="container">
                      <h2> Daily promt</h2>
                      <p>Engage in mindfulness exercises with new prompts every day</p>
                    </div>
                    <div class="container">
                      <h2>Mental health conditions</h2>
                      <p>Access articles and information about mental health conditions and coping strategies.</p>
                    </div>
                    <div class="container">
                        <h2>self assesement</h2>
                        <p>Our journey began with a simple idea: to create a space where people can reconnect with themselves through intentional movement and daily practices. We saw the need for a calm, accessible approach to wellness that fits into modern life.</p>
                        <button class="styled-button">
                            <a href="quiz.php" >start</a>
                        </button>
                        <style>
                            .styled-button {
    background-color: #89A8B2; 
    color: white;
    padding: 10px 20px; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer;
    font-size: 16px; 
    font-weight: bold; 
    text-transform: uppercase; 
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); 
    transition: all 0.3s ease; 
   
}
.styled-button a{
     text-decoration: none;
}
.styled-button:hover {
    background-color: #B3C8CF; 
    transform: scale(1.05); 
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3); 
}
                        </style>
                      </div>
                  </main>

</body>
</html>