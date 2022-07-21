<?php $who = $_POST['who']; ?>
<!doctype html>
<html>
    <head>
        <title><?php $who; ?></title>
        <meta name="robots" content="noindex">
        <link href='simplelightbox-master/dist/simple-lightbox.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="simplelightbox-master/dist/simple-lightbox.jquery.min.js"></script>
        
        <link href='style.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
	<form method="get" action="./nsfw.php">
		<button type="submit">Retour</button>
	</form>
        <div class='container'>
            <div class="gallery">

            <?php 
            // Image extensions
            $image_extensions = array("png","jpg","jpeg","gif");
            $video_extensions = array("mp4","mov");

            // Target directory
            $dir = './homework/'.$who.'/';
            if (is_dir($dir)){
                
                if ($dh = opendir($dir)){
                    $count = 1;

                    // Read files
                    while (($file = readdir($dh)) !== false){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Image path
                            $thumbnail_path = $dir.$file;
                            
                            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                            $image_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);

                            // Check its not folder and it is image file
                            if(!is_dir($thumbnail_path)) {
                                if (in_array($image_ext,$image_extensions)) {?>

                                <!-- Image -->
                                <a href="<?php echo $thumbnail_path; ?>">
                                    <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>
                                </a>
                                <!-- --- -->
                                <?php
                                }
                                if (in_array($image_ext,$video_extensions)) {?>

                                <!-- Image -->
                                <video width="320" height="240" controls><source src="<?php echo $thumbnail_path; ?>" alt="" title="">?>/></video>
                                <!-- --- -->
                                <?php
                                }

                                // Break
                                if( $count%4 == 0){
                                ?>
                                    <div class="clear"></div>
                                <?php    
                                }
                                $count++;
                            }
                        }
                    }
                    closedir($dh);
                }
            }
            ?>
            </div>
        </div>


        <!-- Script -->
        <script type='text/javascript'>
        $(document).ready(function(){

            // Intialize gallery
            var gallery = $('.gallery a').simpleLightbox();
        });
        </script>
    </body>
</html>
