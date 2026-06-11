<?php
$tempfile[0] = $_FILES['file1']['tmp_name'];
$filename[0] = './img/' . $_FILES['file1']['name'];

$tempfile[1] = $_FILES['file2']['tmp_name'];
$filename[1] = './img/' . $_FILES['file2']['name'];

$tempfile[2] = $_FILES['file3']['tmp_name'];
$filename[2] = './img/' . $_FILES['file3']['name'];

$tempfile[3] = $_FILES['file4']['tmp_name'];
$filename[3] = './img/' . $_FILES['file4']['name'];

for ($i = 0; $i < 4; $i++) {
    if (is_uploaded_file($tempfile[$i])) {
        move_uploaded_file($tempfile[$i], $filename[$i]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>モーダルウィンドウ</title>

    <script src="./jquery-3.6.0.min.js"></script>

    <style>
        #win {
            list-style: none;
        }

        #win li {
            display: inline-block;
            margin: 10px;
        }

        #glayLayer {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: black;
            opacity: 0.60;
        }

        #overLayer {
            display: none;
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 20px;
        }

        #overLayer img {
            max-width: 700px;
            max-height: 500px;
        }
    </style>
</head>
<body>
    <h1>PHP と jQuery を利用したモーダルウィンドウの作成</h1>

    <ul id="win"></ul>

    <div id="glayLayer"></div>
    <div id="overLayer"></div>

    <script>
        let obj = document.getElementById('win');
        let img = [];
        let li, a, i;

        <?php for ($i = 0; $i < 4; $i++) { ?>
            i = <?php echo $i; ?>;

            li = document.createElement('li');

            a = document.createElement('a');
            a.href = "<?php echo $filename[$i]; ?>";
            a.className = "modal";

            img[i] = document.createElement('img');
            img[i].src = "<?php echo $filename[$i]; ?>";
            img[i].height = 120;

            obj.appendChild(li).appendChild(a).appendChild(img[i]);
        <?php } ?>

        $(function () {
            $('a.modal').click(function () {
                $('#glayLayer').show();
                $('#overLayer').show();

                let imgfile = $(this).attr('href');

                $('#overLayer').html('<img src="' + imgfile + '">');

                return false;
            });

            $('#glayLayer').click(function () {
                $('#glayLayer').hide();
                $('#overLayer').hide();
            });
        });
    </script>
</body>
</html>