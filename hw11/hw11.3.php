<!DOCTYPE html>

<?php 
    require_once('db_con.php');
    require_once('insert_row.php');
    require_once('show_table.php');
    
    /*************************************************************
     * First Requirement: Part 1:
     *  Generate the dropdown list via an array.
     *****************************************************************/
    // array of possible ways the user could have heard about us.
    $ORIGIN = array(
    		"Google",
    		"Friend",
    		"Advert",
    		"Other"
    	);

    $STATUS = array(
    		"Yes",
    		"No",
    		"Maybe"
    	);

    /*************************************************************
     * Second Requirement: Part 1:
     *  If a field is not filled in or the checkbox is not checked,
     *  it will show the error "You must fill out the form!"
     *  in red in the same page. 
     *****************************************************************/
    // if form was actually submitted, check for error    
    if (isset($_POST["submitReview"]))
    {
        if (empty($_POST["name"]) ||
        	empty($_POST["email"]) || 
	        empty($_POST["originalSource"]) ||
	        empty($_POST["4chans_tears"]) ||
	        empty($_POST["comments"]) ||
	        empty($_POST["emailUpdates"]))	
        {
	        $error = true;
	    }
	    else {
            $connection = connect_to_db();
            insert_row($connection, "review",
                       ["name", "email", "referrer", "rating", "comments"],
                       [$_POST["name"], $_POST["email"], $_POST["originalSource"], $_POST["4chans_tears"], $_POST["comments"]]
            );
	        header('Location: /homework/hw11/hw11.3.show_review.php');
	    }
    }
?>


<html>
    <head>
        <title>Forms</title>
        <style type="text/css">
            label {
              display: inline-block;
              width: 55px;
              text-align: left;
            }
        </style>
    </head>

    <body>
		<?php
		
	    /*************************************************************
         * Second Requirement: Part 2:
         *  If a field is not filled in or the checkbox is not checked,
         *  it will show the error "You must fill out the form!"
         *  in red in the same page. 
         *****************************************************************/
		if (isset($error)): ?>
    		<div style="color: red">You must fill out the form!</div>
  		<?php endif ?>
  		
        <form action="hw11.3.php" method="post">
            <fieldset name="personalDetails">
                <legend>Your Details:</legend>
                <label for="name">Name:</label>
                <input name="name" id="name" type="text"
                       value="<?php if (isset($_POST["name"])) 
                                        echo htmlspecialchars($_POST["name"]);      //  <-------- Third Requirement (Please God, let there be a better way to write this.)
					          ?>"><br>
                <label for="email">Email:</label>
                <input name="email" id="email" type="text"
                       value="<?php if (isset($_POST["email"])) 
                                        echo htmlspecialchars($_POST["email"]);      //  <-------- Third Requirement
					          ?>"><br>
            </fieldset><br>
            
            <fieldset>
               <legend>Your Review:</legend>
               <br>
                How did you hear about us? 
                <select name="originalSource">
					<?php
					
                        /*************************************************************
                         * First Requirement: Part 2:
                         *  Generate the dropdown list via an array.
                         *****************************************************************/
						foreach ($ORIGIN as $origin)
						{
							if (isset($_POST["originalSource"]) && $_POST["originalSource"] == $origin)
								echo "<option selected='selected' value='$origin'>$origin</option>";      //  <-------- Third Requirement
							else
								echo "<option value='$origin'>$origin</option>";
					 	}
					?>
                </select><br>
                <br>
                
                Would you visit us again? <span>
					<?php
						foreach ($STATUS as $status)
						{
							if (isset($_POST["4chans_tears"]) && $_POST["4chans_tears"] == $status)
								echo "<input name='4chans_tears' checked type='radio' value='$status'>$status</input>";      //  <-------- Third Requirement
							else
								echo "<input name='4chans_tears' type='radio' value='$status'>$status</input>";
					 	}
					?>
                </span><br>
                
                Comments:<br>
                <textarea name="comments" rows="5" cols="50"><?php if (isset($_POST["comments"])) echo trim(htmlspecialchars($_POST["comments"]));      //  <-------- Third Requirement (I swear my line is only this long because of PHP. I do not usually let them get this long but I might as well have some fun with it while I can, so woo :D) :?></textarea><br>
                <br>
                
                <input type="checkbox" name="emailUpdates" checked/> Sign me up for email updates<br>
                
                <input type="submit" name="submitReview" value="Submit review"/>
            </fieldset>
        </form>
    </body>
</html>