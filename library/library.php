<?php

// Menu class
class Menu {
    public function render() {
        return '
            <div id="menu">
                <a href="add-game.php">
                    <div id="toevoegen" class="toevoegen">
                        <p>ADD GAME</p>
                    </div>
                </a>
            </div>
        ';
    }
}

// Container class
class Container {
    public function render() {
        ob_start(); // Start output buffering
        include 'selectImages.php'; // Include selectImages.php content
        $content = ob_get_clean(); // Get the buffer contents and clean the buffer
        return '<div id="container">' . $content . '</div>';
    }
}

// HTML Page class
class HTMLPage {
    private $title;
    private $menu;
    private $container;

    public function __construct($title, $menu, $container) {
        $this->title = $title;
        $this->menu = $menu;
        $this->container = $container;
    }

    public function render() {
        return '
            <!DOCTYPE html>
            <html>
            <head>
                <title>' . $this->title . '</title>
                <link rel="stylesheet" type="text/css" href="library.css">
            </head>
            <body>
                ' . $this->menu->render() . '
                ' . $this->container->render() . '
            </body>
            </html>
        ';
    }
}

// Create instances of Menu and Container
$menu = new Menu();
$container = new Container();

// Create an instance of HTMLPage
$htmlPage = new HTMLPage("Library", $menu, $container);

// Render the HTML page
echo $htmlPage->render();
?>
