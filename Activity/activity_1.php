<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #text_id {
            color: blue;
            font-weight: 100;
            cursor: default;
            text-align: center;
            list-style-type: none;
        }
    </style>

</head>
<body>
    <ul id="text_id">
        <li><h1>Full Name: (You Full Name)</h1></li>
        <li><h1>Age: (You Age)</h1></li>
        <li><h1>Gender: (You Gender)</h1></li>
        <li><h1>Nick Name: (You Nick Name)</h1></li>
    </ul>
</body>

    <script>
        let text_id = document.getElementById("text_id");

        text_id.addEventListener("click", function() {
            this.style.color = "red"
        });
    </script>

</html>