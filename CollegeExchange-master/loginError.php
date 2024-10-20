<?php
session_start();
if (isset($_SESSION['loginError']))?>
    <div class="error"
            <p><?php echo $_SESSION['loginError']; ?></p>
    </div>
