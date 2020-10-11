<!doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>BMI</title>

    <script type="text/javascript" src="js/index.js"></script>


</head>
<body>

<div class="container">

    <?php


    require "lib/func.inc.php"; //todo

    //VAR
    $name = "";
    $email = "";
    $examDate = "";
    $grade = "";
    $subject = "";

    // Formularverarbeitung (HTTP POST Request)
    if (isset($_POST['submit'])) {

        // double-check: zuerst pruefen ob die Daten im Request enthalten sein, dann auslesen
        $name = isset($_POST['name']) ? $_POST['name'] : ""; //check if not null
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $examDate = isset($_POST['examDate']) ? $_POST['examDate'] : "";
        $grade = isset($_POST['grade']) ? $_POST['grade'] : "";
        $subject = isset($_POST['subject']) ? $_POST['subject'] : "";

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
    <h1 class = "mt-1 mb-1">Body-Mass-Index-Rechner</h1>
    <form id="form_grade" action="index.php" method="post">

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
                       value="<?= htmlspecialchars($Messdatum) ?>"
                       onchange="validateMessDate(this)"
                       required="required"
                />
            </div>

            <div class="col-sm-4 form-group">
                <h4>Info zum BMI</h4>
                <p1>Unter 18.5 Untergewicht     </p1> <br>
                <p1>18.5 – 24.9 Normal          </p1> <br>
                <p1>25.0 – 29.9 Übergewicht     </p1> <br>
                <p1>30.0 und darüber Adipositas </p1>
            </div>




        </div>

        <div class="row">

            <div class="col-sm-4 form-group">

                <label for="Groesse">Größe (cm)*</label>
                <input type="number"
                       name="Groesse"
                       class="form-control <?= isset($errors['grade']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($grade) ?>"
                       required="required"
                       min = "1"
                       max = "300"
                />
            </div>


            <div class="col-sm-4 form-group">

                <label for="Gewicht">Gewicht (kg)*</label>
                <input type="number"
                       name="Gewicht"
                       class="form-control <?= isset($errors['grade']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($grade) ?>"
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