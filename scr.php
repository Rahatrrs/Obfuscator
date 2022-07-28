
<?php
    include_once "scramblerf.php";
    $task= 'encode';
    if(isset($_GET['task']) && $_GET['task']!=''){
        $task = $_GET['task'];
    }
    
    $key= 'abcdefghijklmnopqrstuvwxyz1234567890';

    if('key'==$task){
        $key_original = str_split($key);
        shuffle($key_original);
        $key= join('', $key_original );
    }else if(isset($_POST['key']) && $_POST['key']!=''){
        $key=$_POST['key'];
    }
    $scrambleData='';
    if('encode'== $task){
        $data= $_POST['data']??'';
        if($data != ''){
            $scrambleData= scrambleData($data, $key );
        }
    }

    if('decode'== $task){
        $data= $_POST['data']??'';
        if($data != ''){
            $scrambleData= decodeData($data, $key );
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            margin-top: 30px;
        }
        #data{
            width: 100%; height: 100%;
        }
        #result{
            width: 100%; height: 160px;
        }
        .hidden{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>
                    Data Scrambler
                </h1>
                <p>
                    <a href="./scr.php?task=encode">Encode</a>
                    <a href="./scr.php?task=decode">Decode</a>
                    <a href="./scr.php?task=key">Generate Key</a>
                    
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form method="POST" action="./scr.php <?php   if('decode'==$task) {echo "?task=decode";} ?>">
                    <label for="key">Key</label>
                    <input type="text" name="key" id="key" <?php displayKey($key); ?> >
                    <label for="data">Data</label>
                    <textarea  name="data" id="data"><?php if(isset($_POST['data'])){echo $_POST['data']; }?></textarea>
                    <label for="result">Result</label>
                    <textarea id="result"><?php echo $scrambleData; ?></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>