<?php $page = $_GET['page'] ?:  'people'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- Vendor -->
        <link rel="stylesheet" href="semantic/css/semantic.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
        <script src="semantic/javascript/semantic.js"></script>
        <script src="http://knockoutjs.com/downloads/knockout-3.1.0.debug.js"></script>
        <script src="js/vendor/jquery.scrollTo.min.js"></script>
        <script src="js/vendor/jquery.sticky.js"></script>
        <script src='https://cdn.firebase.com/js/client/1.0.15/firebase.js'></script>
        <!-- Our stuff -->
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/main.js"></script>
        <script src="js/mainViewModel.js"></script>
        <script>
            var viewmodel = new MainViewModel();
            var root = new Firebase('https://broforce.firebaseio.com/');
        </script>
    </head>
    <body>
        <div class="ui large inverted vertical sidebar nav menu">
            <div class="item header"><img src="img/atb3.png" height="90%" width="90%"></div>
            <div class="header item">Roster <i class="icon users"></i></div>
            <a class="item" href="index.php?page=people">People</a>
            <a class="item" href="index.php?page=characters">Characters</a>
            <a class="item" href="index.php?page=teams">Teams</a>
            <div class="header item">Communication <i class="icon chat"></i></div>
            <a class="item" href="index.php?page=applications">Applications</a>
            <a class="item" href="index.php?page=relationships">Relationships</a>
            <a class="item" href="index.php?page=incidents">Incidents</a>
            <div class="header item">Reports <i class="basic icon bar chart"></i></div>
            <a class="item" href="index.php?page=attendance">Attendance</a>
            <a class="item" href="index.php?page=performance">Performance</a>
            <a class="item" href="index.php?page=loot">Loot</a>
        </div>
        <div class="ui fixed main menu black inverted transparent">
            
            <div class="ui black launch button float left item">
                <i class="list layout icon"></i>
                <span class="small text">Menu</span>
            </div>
            <div class="container">
                <div class="title item">ATB Web Toolkit</div>
                <div class="item small">Version 1</div>

            </div>
        </div>
        <?php include "$page.php"; ?>
    </body>
    <script>
    $('.sidebar').sidebar();
    $('.launch').click(function(){
    $('.sidebar.nav').sidebar('toggle');
    });
    $('.ui.dropdown')
    .dropdown()
    ;
    var page = <?php echo "'$page'"; ?>;
    $(".sidebar a.item:contains('"+page.capitalize()+"')").addClass("active");
    $('.scroll').click(function(){
    var to = '#' + $(this).attr('to');
    $.scrollTo(to,{offset: {top: -100}, duration: 300});
    $('.scroll').removeClass('active');
    
    $(this).addClass('active');
    });
    $('.sticky').sticky({topSpacing: 44});

    $(function(){
        ko.applyBindings(viewmodel);
    });
    </script>
</html>