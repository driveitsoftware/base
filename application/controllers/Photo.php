<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Photo extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('events_model');

    }

    public function upload_post()
    {
        // maak onderstaande directory writable.
        // chmod -R 777 /Applications/uploads

        switch (strtolower($_SERVER['HTTP_HOST']))
        {
            case 'tiqs.com':
                $uploaddir = '/home/tiqs/domains/tiqs.com/public_html/application/uploads';
                break;
            default:
                $uploaddir = '/Users/peterroos/www/tiqs/application/uploads/';
                break;
        }

        // chmod -R 777 /Applications/uploads

        // Onderstaande code is alleen een testje om te kijken of de upload dir writeable is
        /*
        $myFile = "testFile1.txt";
        $fh = fopen($uploaddir .$myFile, 'w') or die("can't open file");
        $stringData = "Bobby Bopper\n";
        fwrite($fh, $stringData);
        $stringData = "Tracy Tanner\n";
        fwrite($fh, $stringData);
        fclose($fh);
        */

        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
        {
            $data['status'] = 'uploaded';

            // Add stamp, native PHP, zie:
            // http://php.net/manual/en/image.examples-watermark.php

            // Load the stamp and the photo to apply the watermark to
            $stamp = imagecreatefromgif(FCPATH . '/tiqsimg/stamp.gif');
            $im = imagecreatefromjpeg($uploadfile);

            // Set the margins for the stamp and get the height/width of the stamp image
            $marge_right = 0;
            $marge_bottom = 0;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);

            // Copy the stamp image onto our photo using the margin offsets and the photo
            // width to calculate positioning of the stamp.
            imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

            // Output and free memory

            // Test in browser: uncomment:
            // header('Content-type: image/jpg');
            // imagejpeg($im); or:
            // imagepng($im);

            imagejpeg($im, $uploadfile . 'stamp.jpg', 100);
            imagedestroy($im);

        }
        else
        {
            $data['status'] =  'failed';
        }
        $this->response($data, 200);
    }

}

?>
