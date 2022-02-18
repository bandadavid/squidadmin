<div id="container">

    <div style="text-align:center;">
        <h1 style="color:blue;">Buscador Squid Admin</h1>
    </div>

    <?php if (isset($error_msg)) { ?>

        <div id="error">
            <p><?php echo strip_tags($error_msg); ?></p>
        </div>

    <?php } ?>

    <div id="frm">

        <form action="index.php" method="post" style="margin-bottom:0;">
            <input name="url" type="text" style="width:442px;" autocomplete="off" placeholder="https://" />
            <input type="submit" value="Buscar" />
        </form>

        <script type="text/javascript">
            document.getElementsByName("url")[0].focus();
        </script>

    </div>

</div>

<style>
    #container {
        width: 550px;
        margin: 0 auto;
        margin-top: 50px;
    }

    #error {
        color: red;
        font-weight: bold;
    }

    #frm {
        padding: 10px 15px;
        background-color: #007ca1;

        border: 1px solid #818181;

        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
    }
</style>