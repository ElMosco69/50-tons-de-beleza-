            <hr>
        </main> <!-- /container -->

        <footer class="container">
            <?php $data=new DateTime ("now",  new DateTimeZone("America/Sao_Paulo"))?>
            <p>&copy;2025 á <?php echo $data ->format("Y"); ?> - Chicão e Jeffrey Epstein <i class="fa-solid fa-person-running"></i><i class="fa-solid fa-baby"></i>
        </footer>

        <script src="<?php echo BASEURL; ?>js/jquery-3.7.1.min.js"></script>   
        <script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="<?php echo BASEURL; ?>js/main.js"></script>
    </body>
</html>