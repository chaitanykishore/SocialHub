<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="pop.css">
    <script src="pop.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<header>
        <!-- Facebook Logo -->
<div class="brand">
<div class="hub">
  <span contenteditable="true">Social</span>
  <span contenteditable="true">hub</span>
</div>
</div>
<div class="profile">
    <img src="https://img.icons8.com/3d-fluency/94/talk-male--v2.png" alt="talk-male--v2"/> 
</div>
<div class="save">
    <button class="button-24" role="button"><span class="text">Saves</span></button>
</div>
<div class="chat">
<button class="button-24" role="button" id="openMyPopup" data-popup="myPopup" onClick="openPopup('#myPopup')" aria-controls="myPopup" aria-label="Open popup">Open</button>
</div>
</div>
</div>
<form action="logout.php" method="post">
        <div class="logout">
      <button class="button-24" role="button"><span class="text">Logout</span></button>
      </div>
    </form>
      <div class="hamburger"></div>
      <label for="check">
      <input type="checkbox" id="check"/> 
      <span></span>
      <span></span>
      <span></span>
    </label>
</div>
</header>
<body>
<div class="container">
	<h1>Click to open Popup</h1>
	<button class="button-24" role="button" id="openMyPopup" data-popup="myPopup" onClick="openPopup('#myPopup')" aria-controls="myPopup" aria-label="Open popup">Open</button>
</div>

<div class="popup" id="myPopup" aria-hidden="true" onClick="if(event.target == this){closePopup('#myPopup');}">
	<div class="wrapper" aria-labelledby="popupTitle" aria-describedby="popupText" aria-modal="true">
		<h2 id="popupTitle">This is my Popup</h2>
		<p id="popupText">Lorem ipsum dolor sit amet consectetur, adipiscing elit lacinia mus, sapien nibh imperdiet tempus. Vitae massa semper mi sagittis a cum cursus fusce per, gravida tellus metus purus litora nam ultricies donec, nibh dis ligula ad facilisi penatibus condimentum aenean.</p>
		<button id="closePopup" onClick="closePopup('#myPopup');" aria-label="Close popup">Close</button>
	</div>
</div>
    
</body>
</html>