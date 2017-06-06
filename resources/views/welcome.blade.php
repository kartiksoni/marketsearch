<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <title>Marketsearch</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"  href="css/app.css">
</head>
<body>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<component is="home" inline-template>
    @include('blocks.nav.search',['q' => $q,'sort_by' => $sort_by,'display' => $display,'feed' => $feed])
    <br/>
    <br/>
    <br/>
    @include('blocks.product.results',['q' => $q,'sort_by' => $sort_by,'display' => $display,'feed' => $feed])
    @include('blocks.modals.lightbox')
    @include('blocks.modals.login')
    @include('blocks.modals.signup')
    @include('blocks.modals.wishlist')


</component>
<script src="js/app.js"></script>
</body>
</html>
