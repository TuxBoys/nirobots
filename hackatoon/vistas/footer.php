</div>
<br>
<div class="container-fluid text-center "style ="margin: 20px">
    <h4>¿Has considerado la posibilidad de buscar apoyo o asistencia profesional?</h4>


</div>



<section class="formulario-envio">
    <form action="https://formsubmit.co/antonio.170603@gmail.com" method="post">

        <h2>Envie su solicitud de atención</h2>

        <label class="label-form" for="name">Nombre</label>
        <input type="text" name="name" id="name">

        <label class="label-form" for="correo">Correo electronico</label>
        <input type="email" name="email" id="correo">

        <label class="label-form" for="subject">Asunto</label>
        <input type="text" name="subject" id="subject">

        <label class="label-form" for="coments">solicitud</label>
        <textarea name="coments" id="coments" cols="30" rows="5"></textarea>

        <input class="btn btn-primary btn-form" type="submit" value="enviar">
        <!--<input type="hidden" name="_next" value="">--->
    </form>
</section>
</main>
<br> <br>
<!---- footer -->
<footer class="footer box2">
    <section class="footer__container container">
        <nav class="nav nav--footer">
            <h2 class="footer__title">Ni.Robots</h2>

            <ul class="nav__links nav__link--footer">
                <li class="nav__items">
                    <a href="index.html" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="index.html #history" class="nav__links"> empresas</a>
                </li>
                <li class="nav__items">
                    <a href="contacto.html" class="nav__links">Biblioteca Virtual</a>
                </li>
                <li class="nav__items">
                    <a href="Protesis Robotica para brazo.pdf" class="nav__links">tu perfil de usuario</a>
                </li>
            </ul>
        </nav>
    </section>

    <section class="footer__copy container">
        <div class="footer__social">
            <a class="footer__icons"><img src="./images/facebook.svg" class="footer__img"></a>
            <a class="footer__icons"><img src="./images/twitter.svg" class="footer__img"></a>
            <a class="footer__icons"><img src="./images/youtube.svg" class="footer__img"></a>
        </div>

        <h3 class="footer__copyright">Derechos reservados &copy;</h3>
        <ul class="creators-list">
            <li>Jose</li>
            <li>Ervin</li>
            <li>Pavel</li>
            <li>Arief</li>
        </ul>
    </section>
</footer>
</div>
</div>

<script>
     
        var dropdownButton = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');
        
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });
        
        // Cerrar el menú al hacer clic en otro lugar de la página
        window.addEventListener('click', function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                }
            }
        });
    </script>


<script>function openNav() {
        document.getElementById("mobile-menu").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mobile-menu").style.width = "0%";

    }</script>


<script src="js/js/bootstrap.bundle.min.js"></script>


<script src="./js/opcionSlideFiltro.js"></script>
</body>

</html>