<?php require_once("../class/ini.php"); ?>
<?php if($S->status()){ header("Location: index.php"); } ?>
<!DOCTYPE html>
<html>
    <head>
        <title>WELCOME | Administrator</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../css/admin.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <section>
                <article>
                    <header>
                        <h2>
                            <?
                            if(isset($_GET['login']) && !empty($_GET['login'])){
                                
                                echo "You have logged out!";
                            }
                            else{
                                
                                echo "Login Panel";
                            }
                            ?>
                        </h2>
                    </header>
                    <?
                    if(isset($_POST) && !empty($_POST)){

                        $email = $_POST['email'];
                        $password = hash("SHA256",$_POST['password']);
                        $found = $S->authenticate($email,$password);
                        
                        if($found){
                            
                            $S->login($found);
                            header("Location: index.php");
                        }
                        else{
                            
                            echo "<h3>Username/Password mismatched!</h3>";
                        }
                    }
                    ?>
                    <form action="login.php" method="POST">
                        <table>
                            <tr>
                                <td>E-mail:</td>
                                <td><input type="text" name="email" placeholder="E-mail" required="required"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" placeholder="Password" required="required"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
                            </tr>
                        </table>
                    </form>
                </article>
           </section>
        </div>
    </body>
</html>
