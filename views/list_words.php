<div class="justify-content-center">
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>Word</th>
            <th>Vietnamese Meaning</th>
            <th>Synonyms</th>
            <th>Example 1</th>

            <th>Exxample 2</th>
            <?php
            if($_SESSION['user']['level']==1) {
            echo '<th > Edit</th ><th > Delete</th >';
            }
            ?>
        </tr>
        </thead>
        <?php
        // Read all lines of the CSV file into an array
        // The "file" function in PHP returns an array of all the lines in the file listed
        $lines = file('./csv/words.csv',FILE_IGNORE_NEW_LINES);
        // Counter variable for line number
        $i = 0;
        //Iterate over the array of lines
        foreach($lines as $line) {
            $parts = explode(',', $line);
            $word = $parts[0];
            $mean = $parts[1];
            $syn = $parts[2];
            $ex1 = $parts[3];
            $ex2 = $parts[4];
            echo '<tr>';
            echo "<td>$word</td>";
            echo "<td>$mean</td>";
            echo "<td>$syn</td>";
            echo "<td>$ex1</td>";
            echo "<td>$ex2</td>";
            if($_SESSION['user']['level']==1) {
                echo "<td><a type=\"button\" href=\"./?url=form_words&edit=$i&e=1\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a></td>";
                echo "<td><a type=\"button\" href=\"actions/delete_word.php?delete=$i\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-remove\"></span> Trash</a></td>";
            }
            echo '</tr>';
            $i++;

        }
        ?>
    </table>
</div>