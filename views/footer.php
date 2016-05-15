<hr>
    <footer class="container">
        
        <p class="pull-right"><a href="#">Voltar para o topo</a></p>
        <p>&copy; 2016 Simple Payment &middot; Todos os direitos reservados</p>
    </footer>
    <script src="<?= HOME_PATH ?>/public/js/jquery-2.2.2.min.js"></script>
    <script src="<?= HOME_PATH ?>/public/js/bootstrap.min.js"></script>
    <script src="<?= HOME_PATH ?>/public/js/jquery.mask.min.js"></script>
    <script type="text/javascript">$('.carousel').carousel({interval: 7000});$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {$(this).collapse('hide');}});
    $(function() {$('#cpf').mask('000.000.000-00', {reverse: true});$('#ddd').mask('(00)');$('#telefone').mask('0000-0000');
    $('#celular').mask('00000-0000');});$('#cep').mask('00000-000');$(window).resize(function(){$('.table-responsive.prod').css('height', $(window).height() - 260 + 'px');});
    $('.table-responsive.prod').css('height', $(window).height() - 260 + 'px');</script>
</body>
</html>