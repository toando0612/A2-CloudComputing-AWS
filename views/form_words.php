<div class="row justify-content-center">
    <form method="POST" action="actions/submit_word.php">
        <?php if ($_GET['e'] == 1) echo "<h1>Edit Form</h1>";
        elseif ($_GET['e'] == 0) echo "<h1>Add Form</h1>";
        ?>
        <input type="hidden" name="lineedit" value="<?php echo $_GET['edit'] ?>" />
        <input type="hidden" name="e" value="<?php echo $_GET['e'] ?>" />

        <?php
        $lineedit = file('csv/words.csv',FILE_IGNORE_NEW_LINES);

        $word = explode(',',$lineedit[$_GET['edit']]);
        ?>
        <div class="form-group">
            <label for="word">Word</label>
            <input type="text" class="form-control" name="word" id="word" placeholder="enter English word" value="<?=$word[0]?>">
        </div>

        <div class="form-group">
            <label for="mean">Meaning(Vietnamese)</label>
            <input type="text" name="mean" id="mean" class="form-control" placeholder="" value="<?=$word[1]?>">
        </div>
        <div class="form-group">
            <label for="syn">Synonyms</label>
            <input type="text" name="syn" id="syn" class="form-control" placeholder="" value="<?=$word[2]?>">
        </div>
        <div class="form-group">
            <label for="ex1">Example 1</label>
            <input type="text" name="ex1" id="ex1" class="form-control" placeholder="" value="<?=$word[3]?>">
        </div>
        <div class="form-group">
            <label for="ex2">Example 2</label>
            <input type="text" name="ex2" id="ex2" class="form-control" placeholder="" value="<?=$word[4]?>">
        </div>
        <button type="submit" class="btn btn-success" name="save">Save</button>
    </form>
</div>