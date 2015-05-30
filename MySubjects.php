<?php
 include_once("Navigation.php");
 include_once("Composer.php");
session_start();
?>
<html>
    <form method="post">
        <?php
        if(isset($_SESSION['user']) && $_SESSION['type']=="Profesor") {
            $query = new bdxe\CourseQuery();
            $query1 = new bdxe\ProfesorQuery();


            $Subscription = $query->find();
            $Profesors = $query1->findOneByName($_SESSION['user']);
            echo "<table class='NewsFeed' BORDER=3 CELLSPACING=3 CELLPADDING=3>";
            echo "<tr>";
            echo "<td><a href='' name='Subject'>Subject</a></td>";
            echo "<td><a href='' name='Students'>Students</a></td>";
            echo "<td><a href='' name='StartTime'>StartTime</a></td>";
            echo "<td><a href='' name='EndTime'>EndTime</a></td>";
            echo "</tr>";
            foreach ($Subscription as $key) {
                echo "<tr>";
                if ($key->getProfesorId() == $Profesors->getId()) {
                    echo "<td>" . $key->getSubjectName() . "</td>";
                    echo "<td>" . $key->getClassCapacity() . "</td>";
                    echo "<td>" . $key->getStartDate()->format('Y-m-d') . "</td>";
                    echo "<td>" . $key->getFinishDate()->format('Y-m-d') . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

        }
        ?>
    </form>
</html>
