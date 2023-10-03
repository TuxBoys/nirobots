<footer class="footer box2">

    <!--- <section class="footer__container container">
    <nav class="nav nav--footer">
        <h2 class="footer__title">Ni.Robots</h2>

        <ul class="nav__links nav__link--footer">
            <li class="nav__items">
                <a href="index.html" class="nav__links">Inicio</a>
            </li>
            <li class="nav__items">
                <a href="index.html #history" class="nav__links"></a>
            </li>
            <li class="nav__items">
                <a href="contacto.html" class="nav__links">Contacto</a>
            </li>
            <li class="nav__items">
                <a href="Protesis Robotica para brazo.pdf" class="nav__links">Blog</a>
            </li>
        </ul>
    </nav>
    <form class="footer__form" action="https://formspree.io/f/mknkkrkj" method="POST">
        <h2 class="footer__newsletter">Suscribete a nuestra pagina</h2>
        <div class="footer__inputs">
            <input type="email" placeholder="Email:" class="footer__input" name="_replyto">
            <input type="button" value="Registrate" class="footer__submit">
        </div>
    </form>
</section>-->




    <script>
        // funcion agrandar filtro segun critrio
        $(document).ready(function () {
            const selectWrapper = $('.select-wrapper');
            const select = $('#criterio');

            
            function abrirSelect() {
                selectWrapper.css('margin-bottom', '100px');
                selectWrapper.find('.btn01').css('display', 'block');
            }

            
            function cerrarSelect() {
                selectWrapper.css('margin-bottom', '0');
                selectWrapper.find('.btn01').css('display', 'none');
            }

           
            select.focus(function () {
                abrirSelect();
            });

            
            select.change(function () {
               
                cerrarSelect();
            });
        });

    </script>


        
    <script>
        //funcion para agrandar drop menu de perfil
        var dropdownButton = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('show');
        });

       
        window.addEventListener('click', function (event) {
            if (!event.target.matches('.dropdown-toggle')) {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                }
            }
        });
    </script>
    <script>

        //funcion para agrandar el menu en responsive para acceder a menu
    function openNav() {
            document.getElementById("mobile-menu").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("mobile-menu").style.width = "0%";

        }</script>

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
<script src="js/js/bootstrap.bundle.min.js"></script>
<script src="./js/slider.js"></script>
<script src="./js/questions.js"></script>
<script src="./js/menu.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>