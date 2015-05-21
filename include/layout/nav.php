<ul>
    <li>
        <a <?php
        if (strpos($_SERVER['PHP_SELF'], 'index.php')) {
            echo 'class="current"';
        }
        ?> href="index.php">Home
        </a>
    </li>
    <li>
        <a <?php
        if (strpos($_SERVER['PHP_SELF'], 'about.php')) {
            echo 'class="current"';
        }
        ?> href="about.php">About
        </a>
    </li>
    <li>
        <a <?php
            if (strpos($_SERVER['PHP_SELF'], 'window.php')) {
                echo 'class="current"';
            }
            ?> href="window.php">Window
        </a>
    </li>
    <?php if ($U->status()){ ?>
    <li>
        <a href="profile.php">Profile</a>
    </li>
    <li>
        <a href="logout.php">Log out</a>
    </li>
    <?php } ?>
</ul>