

<section>

    <?php


        include_once "../praujet/MODEL/reserve.php";

        $d1 = "2022-06-01";

        $d2 = "2022-06-02";

        $t = isTwoDaysAfter("2022-05-21");
        var_dump($t);

        /* $t = getResaFilm(10);
        var_dump($t);

        $t2 = getConflitResa(10,"2022-05-19","2022-06-");
        var_dump($t2); */

        $teste = isInProcess("2022-05-","");
        var_dump($teste);


    ?>

</section>