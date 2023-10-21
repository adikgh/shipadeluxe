<? 

    // lang
    $lang = 'ru';
    if (isset($_GET['lang'])) if ($_GET['lang'] == 'kz' || $_GET['lang'] == 'ru') $_SESSION['lang'] = $_GET['lang'];
    if (isset($_SESSION['lang'])) $lang = $_SESSION['lang'];

    $ver = 1.18;
    $site_set = [
        'header' => true,
        'header2' => false,
        'header_wh' => false,
        'menu' => true,
        'tabs' => true,
        
        'footer' => true,
        'footer_c' => true,
        // 'bl8' => true,
        // 'bl14' => true,
        // 'bl3' => true,
        // 'bl12' => true,
        // 'bl9' => true,
        // 'bl11' => true,
        'bl10' => true,

        'swiper' => false,
        // '' => false,
        // '' => false,
        // '' => false,
    ];
    $css = [];
    $js = [];

    // 
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];