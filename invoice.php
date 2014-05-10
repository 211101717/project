<?php
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
include 'class/session.class.php';
include 'class/booking.class.php';
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/script/gen_invoice.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/class/html2pdf_v4.03/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(0, 10, 0, 10));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Gae Hotel Invoice'.$_GET['q'].'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }