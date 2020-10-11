<!doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>BMI</title>

    <script type="text/javascript" src="js/functions.js"></script>


</head>
<body>

<div class="container">


    <h1 class = "mt-1 mb-1">Body-Mass-Index-Rechner</h1>

    <?php


    require "lib/func.php";

    //VAR
    $name = "";
    $groesse = "";
    $messdatum = "";
    $gewicht = "";


    // Formularverarbeitung (HTTP POST Request)
    if (isset($_POST['submit'])) {

        // double-check: zuerst pruefen ob die Daten im Request enthalten sein, dann auslesen
        $name = isset($_POST['name']) ? $_POST['name'] : ""; //check if not null
        $groesse = isset($_POST['groesse']) ? $_POST['groessel'] : "";
        $messdatum = isset($_POST['messdatum']) ? $_POST['messdatum'] : "";
        $gewicht = isset($_POST['gewicht']) ? $_POST['gewicht'] : "";


        // Validierung der Daten und Ausgabe des Ergebnisses (an der aktuellen Stelle in der HTML-Seite)
        if (validate($name, $email, $examDate, $subject, $grade)) {
            echo "<p class='alert alert-success'>Die eingegebenen Daten sind in Ordnung!</p>";
        } else {
            echo "<div class='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft!</p><ul>";
            foreach ($errors as $key => $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul></div>";
        }
    }

    ?>
    <form id="form_grade" action="index.php" method="post">
        <
        <div class="row">


            <div class="col-sm-4 form-group">
                <label for="name">Name*</label>
                <input type="text"
                       name="name"
                       class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($name) ?>"
                       maxlength="20"
                       required="required"
                />
            </div>



            <div class="col-sm-4 form-group">
                <label for="Messdatum">Messdatum*</label>
                <input type="date"
                       name="Messdatum"
                       class="form-control <?= isset($errors['Messdatum']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($messdatum) ?>"
                       onchange="validateMessdatum(this)"
                       required="required"
                />
            </div>

            <div class="col-sm-4 form-group">
                <div class = "sidebar_div">
                    <h4>Info zum BMI</h4>
                    <p1>Unter 18.5 Untergewicht     </p1> <br>
                    <p1>18.5 – 24.9 Normal          </p1> <br>
                    <p1>25.0 – 29.9 Übergewicht     </p1> <br>
                    <p1>30.0 und darüber Adipositas </p1>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 form-group">

                <label for="Groesse">Größe (cm)*</label>
                <input type="number"
                       name="Groesse"
                       class="form-control <?= isset($errors['Groesse']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($groesse) ?>"
                       required="required"
                       min = "1"
                       max = "300"
                />
            </div>


            <div class="col-sm-4 form-group">

                <label for="Gewicht">Gewicht (kg)*</label>
                <input type="number"
                       name="Gewicht"
                       class="form-control <?= isset($errors['gewicht']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($gewicht) ?>"
                       min="1"
                       max="300"
                       required="required"
                />
            </div>


        </div>





        <div class="row mt-3">

            <div class="col-sm-3 mb-3">
                <input type="submit"
                       name="submit"
                       class="btn btn-primary btn-block"
                       value="Speichern"
                />
            </div>

            <div class="col-sm-3">
                <a href="index.php" class="btn btn-secondary btn-block">Löschen</a>
            </div>
        </div>
    </form>




</div>







</body>
















































</html>