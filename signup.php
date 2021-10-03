<?php
$_title= 'Sign up';
require_once('components/header.php');
?>
    <h1>Sign up</h1>
    <form id="form_sign_up" onsubmit="return false">
        <input name="name" type="text" placeholder="name">
        <input name="last_name" type="text" placeholder="last name">
        <input name="email" type="text" placeholder="email">
        <button onclick="sign_up()">Sign up</button>
    </form>

    <script>
        async function sign_up(){
            let conn = await fetch("api-signup.php", {
                method : "POST", 
                body : new FormData(document.querySelector("#form_sign_up"))
            })

            let response = await conn.json()
            console.log(response)
        }
    </script>

<?php
require_once('components/footer.php');
?>