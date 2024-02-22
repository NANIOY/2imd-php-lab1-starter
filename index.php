<?php
class Post
{
    public $profile_image;
    public $username;
    public $additional_info;
    public $location;
    public $text;
    public $distance;

    public $image;

    public function __construct($profile_image, $username, $additional_info, $location, $text = null, $distance = null, $image = null) {
        $this->profile_image = $profile_image;
        $this->username = $username;
        $this->additional_info = $additional_info;
        $this->location = $location;
        $this->text = $text;
        $this->distance = $distance;
        $this->image = $image;
    }
};

$posts = [
    new Post('https://via.placeholder.com/150', 'Jesse', 'Assembly 3.0', 'San Francisco CA', 'Le work.', 60),
    new Post('https://via.placeholder.com/150', 'Michal', 'Voxer', 'San Francisco CA', null, 40, 'https://via.placeholder.com/150'),
    new Post('https://via.placeholder.com/150', 'Petr', 'ROXY/NoD', 'Prague Czech Republic', null, 10),
    new Post('https://via.placeholder.com/150', 'Jaroslav', 'Brno hlavní nádraží', 'Brno Czech Republic', null, 100),
    new Post('https://via.placeholder.com/150', 'Jesse', 'The Mill', 'San Francisco CA', null, 80)
];

$maxDistance = 80; // change max distance here

$filtered_posts = array_filter($posts, function ($post) use ($maxDistance) {
    return $post->distance <= $maxDistance;
});

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swarm App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <?php include_once('header.inc.php') ?>
        <div class="container__posts">
            <?php
            foreach ($filtered_posts as $post) {
                echo '<div class="post">';
                echo '<img src="' . $post->profile_image . '" class="post__image">';
                echo '<div class="post__info">';
                echo '<h2 class="post__info__username">' . $post->username . '</h2>';
                echo '<p class="post__info__additionalInfo">' . $post->additional_info . '</p>';
                echo '<p class="post__info__location">' . $post->location . '</p>';
                echo '<p class="post__info__text">' . $post->text . '</p>';
                if (isset($post->image) && !empty($post->image)) {
                    echo '<img class="post__info__image" src="' . $post->image . '">';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <?php include_once('footer.inc.php') ?>
    </div>


</body>

</html>