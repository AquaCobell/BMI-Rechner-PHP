<?php

        function validateName()
        {

        }

        function validateGewicht()
        {

        }

        function validateMessdatum()
        {

        }

        function validateGroesse()
        {

        }

        function validate($name, $gewicht, $groesse, $messdatum)
        {
            return validateName($name) & validateGewicht($gewicht) & validateGroesse($groesse) & validateMessdatum(messdatum);
        }


