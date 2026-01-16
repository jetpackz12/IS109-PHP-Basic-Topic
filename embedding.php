<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #text_id {
            color: <?php echo "blue"; ?>;
            font-weight: 100;
            cursor: default;
            text-align: center;
        }
    </style>

</head>
<body>
    <h1 id="text_id">
        <?php 
            echo "Joseph Jett T. Abela";
        ?>
    </h1>
</body>

    <script>
        let text_id = document.getElementById("text_id");

        text_id.addEventListener("click", function() {
            this.style.color = "<?php echo "red"; ?>"
        });
    </script>

</html>