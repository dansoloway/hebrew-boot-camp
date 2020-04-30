<?php
    /* Map Rows and Loop Through Them */
    $rows   = array_map('str_getcsv', file('data.csv'));
    $header = array_shift($rows);
    $csv    = array();
    foreach($rows as $row) {
        $csv[] = array_combine($header, $row);
    }
    // echo "<pre>";
    // var_dump($csv[5]);
    // echo "</pre>";

    function returnPlayer($link){
        $ret = '
        <audio controls style="max-width: 100%">
          <source src="horse.ogg" type="audio/ogg">
          <source src="horse.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio>
        ';
        return $ret;
    }
?>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <style>
            .female{
                color: pink;
            }
            .male{
                color: blue;
            }
            .termCont{
                width: 100%;
                margin: 20px 0;
                padding-bottom: 10px;
                -webkit-box-shadow: 5px 5px 5px 0px rgba(173,173,173,0.59);
                box-shadow: 5px 5px 5px 0px rgba(173,173,173,0.59);
            }
            .neutral{
                color: green;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php foreach($csv as $row) { ?>
                <div class="row termCont">
                <div class="row col-12">
                    <div class="col-12">
                        <h1><?php echo $row['english'] ?></h1>
                    </div>
                </div>
                <?php if($row['class'] == 'neutral') {?>
                <div class="row col-12">
                    <div class="col-4 neutral">
                        <h2><?php echo $row['neutral-trans'] ?></h2>
                    </div>
                    <div class="col-4 neutral">
                        <h2><?php echo returnPlayer($row['neutral-sound'])  ?></h2>
                    </div>
                    <div class="col-4 neutral">
                        <h2 class="hebrew"><?php echo $row['neutral-hebrew'] ?></h2>
                    </div>
                </div>



                <?php } else { ?>
                    <div class="row col-12">
                        <div class="col-6 row">
                            <div class="col-12">
                                <h2 class="female"><?php echo $row['female-trans'] ?></h2>
                            </div>
                            <div class="col-6">
                                <h2 class="female"><?php echo returnPlayer($row['female-sound'])  ?></h2>
                            </div>
                            <div class="col-6">
                                <h2 class="female hebrew"><?php echo $row['female-hebrew'] ?></h2>
                            </div>
                        </div>

                        <div class="col-6 row">
                            <div class="col-12">
                                <h2 class="male"><?php echo $row['male-trans'] ?></h2>
                            </div>
                            <div class="col-6">
                                <h2 class="male"><?php echo returnPlayer($row['male-sound'])  ?></h2>
                            </div>
                            <div class="col-6">
                                <h2 class="male hebrew"><?php echo $row['male-hebrew'] ?></h2>
                            </div>
                        </div>
                    </div>

            <?php } // end gendered?>
            </div>
            <?php } // end for each ?>

        </div>
    </body>
</html>
