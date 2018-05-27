<?php
namespace App\Controller;

use App;
use DateInterval;
use DateTime;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Comment;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Form\CommentForm;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Just the comments controller.
 * @author Luigi Libero Lucio Starace
 */
class CommentsController extends Controller {
    
    /**
     * Displays the homepage
     */
    public function index(Request $request){
        
        $response = new Response();
        
        $comment = new Comment();
        
        $form = $this->createForm(CommentForm::class, $comment);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            
            $comment = $form->getData();
            $comment->setTimestamp(new \DateTime());
            
            if ($form->isValid()) {
                if($request->cookies->has('commented')){ //if user has already commented
                    $this->addFlash(
                        'danger',
                        'Oops! Looks like you already submitted a comment, '.$request->cookies->get('commented').'!'
                    );
                }
                else { // persist comment
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($comment);
                    $entityManager->flush();
                    
                    $this->addFlash(
                        'success',
                        'Thank you, '. $comment->getAuthor() . '! Your comment has been submitted.'
                    );
                    $cookie = new Cookie('commented', $comment->getAuthor());
                }
            }
            else { //$form is invalid
                $this->addFlash(
                    'danger',
                    'Oops! Some problem occurred while submitting your comment. Check out the form!'
                );
            }
        }
        
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        
        
        $response = $this->render('comments/comments.html.twig', [
            'form' => $form->createView(),
            'comments'=> $products = $repository->findAll(),
            'commented'=> isset($cookie),
            'author'=> $comment->getAuthor()
        ]);
        if(isset($cookie)){
            $response->headers->setCookie($cookie);
        }
        return $response;
        
    }

}

