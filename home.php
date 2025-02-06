<!DOCTYPE html>
<html>
<head>
  <title>Internal JavaScript Example</title>
  <script type="text/javascript" src="myScript.js"></script>
  <script>
    function myFunction() {
      document.getElementById("myParagraph").innerHTML = "Text changed!";
    }
  </script>
</head>
<body>
  <p id="myParagraph">This is a paragraph.</p>
  <button onclick="document.getElementById('myParagraph').innerHTML = 'Text changed inline!';">Click me inline</button>
  <button onclick="myFunction()">Click me</button>
  <button onclick="myFunctionFromFile()">Click me instead!</button>
</body>
</html>