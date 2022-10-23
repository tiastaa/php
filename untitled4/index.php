<?php

include "Competitor.php";
include "CompetitorsCollection.php";

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['Competitors'])) {
    $_SESSION['Competitors'] = new CompetitorsCollection();
    $_SESSION['Competitors']->defaultCompetitors();
}

$actionToDo = $_POST['action'];

if ($actionToDo == 'add') {
    if (Competitor::validationDataCompetitors($_POST)) {
        $_SESSION['Competitors']->addCompetitor(
            new Competitor(5, $_POST)
        );
    }
} elseif ($actionToDo == 'edit') {
    if (Competitor::validationDataCompetitors($_POST)) {
        $_SESSION['Competitors']->editCompetitor(
            $_POST
        );
    }
} elseif ($actionToDo == 'filter') {
    echo $_SESSION['Competitors']->displayFilteredCompetitors($_POST['country'], $_POST['age']);
} elseif ($actionToDo == 'save') {
    $_SESSION['Competitors']->saveCompetitors();
} elseif ($actionToDo == 'load') {
    $_SESSION['Competitors']->loadCompetitors();
}

echo $_SESSION['Competitors']->displayCompetitors();
?>
<br>

<button onclick="ShowAddForm()"> ADD</button>
<button onclick="ShowEditForm()"> EDIT</button>
<button onclick="ShowFilterForm()"> FILTER</button>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='addForm'>
    ADD <br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> age:
        <input type='number' name='age'>
    </label><br>
    <label> country:
        <input type='text' name='country'>
    </label><br>
    <label> marks:
        <input type='text' name='marks'>
    </label><br>
    <input type='hidden' name='action' value='add'>
    <input type='submit' value='add'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='editForm'>
    EDIT <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> age:
        <input type='number' name='age'>
    </label><br>
    <label> country:
        <input type='text' name='country'>
    </label><br>
    <label> marks:
        <input type='text' name='marks'>
    </label><br>
    <input type='hidden' name='action' value='edit'>
    <input type='submit' value='edit'>
</form>
<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='filterForm'>
    Filter <br>
    <label> age:
        <input type='number' name='age'>
    </label><br>
    <label> country:
        <input type='text' name='country'>
    </label><br>
    <input type='hidden' name='action' value='filter'>
    <input type='submit' value='filter'>
</form>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='save'>
    <input type='hidden' name='action' value='save'>
    <input type='submit' value='Save to file'>
</form>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='load'>
    <input type='hidden' name='action' value='load'>
    <input type='submit' value='Upload from file'>
</form>

<style>
    #addForm {
        display: none;
    }

    #editForm {
        display: none;
    }

    #filterForm {
        display: none;
    }

    table, th, td {
        border: 1px solid #8e1e32;
        text-align: center;
    }

    th {
        width: 100px;
    }

    td {
        height: 50px;
    }
</style>

<script>
    function ShowAddForm() {
        document.querySelector('#addForm').style.display = 'inline';
    }

    function ShowEditForm() {
        document.querySelector('#editForm').style.display = 'inline';
    }

    function ShowFilterForm() {
        document.querySelector('#filterForm').style.display = 'inline';
    }
</script>
