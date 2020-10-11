<?php
$errors = [];

        function validateName($name)
        {
            global $errors; // Zugriff auf die globale Fehlervariable

            if (strlen($name) == 0)  //stringlength
            {
                $errors['name'] = "Name darf nicht leer sein";
                return false;
            }
            else if (strlen($name) > 20)
            {
                $errors['name'] = "Name zu lang";
                return false;
            }
            else
            {
                return true;
            }

        }

        function validateGewicht($gewicht)
        {
            global $errors; // Zugriff auf die globale Fehlervariable


            if (!is_numeric($gewicht) || $gewicht < 3 || $gewicht > 600) {
                $errors['gewicht'] = "Gewicht ungültig";
                return false;
            } else {
                return true;
            }
        }

        function validateMessdatum($messdatum)
        {
            global $errors; // Zugriff auf die globale Fehlervariable

            // ungültig wenn: leeres Datum, falsches Format oder in der Zukunft
            try {
                if ($messdatum == "") {
                    $errors['messdatum'] = "Messdatum darf nicht leer sein";
                    return false;
                } else if (new DateTime($messdatum) > new DateTime()) {
                    $errors['messdatum'] = "Messdatum darf nicht in der Zukunft liegen";
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                $errors['messdatum'] = "Messdatum ungültig";
                return false;
            }
        }

        function validateGroesse($groesse)
        {
            global $errors; // Zugriff auf die globale Fehlervariable

            if (!is_numeric($groesse) || $groesse < 80 || $groesse > 280) {
                $errors['groesse'] = "Groesse ungültig";
                return false;
            } else {
                return true;
            }
        }

        function validate($name, $gewicht, $groesse, $messdatum)
        {
            return validateName($name) & validateGewicht($gewicht) & validateGroesse($groesse) & validateMessdatum($messdatum);
        }

        function calculateBMI($gewicht, $groesse)
        {
            $BMI = $gewicht / (($groesse/100) * ($groesse/100));
            $BMI = round($BMI,1);
            return $BMI;
        }


