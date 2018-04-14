<?php
namespace App\Controller;

use App;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Just the homepage controller.
 * @author Luigi Libero Lucio Starace
 */
class HomepageController extends Controller {
    
    /**
     * Displays the homepage
     */
    public function index(){
        return $this->render('homepage/homepage.html.twig', []);
    }
    
}

