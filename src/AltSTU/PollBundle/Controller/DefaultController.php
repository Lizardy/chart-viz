<?php

namespace AltSTU\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AltSTU\PollBundle\Entity\Question;
use AltSTU\PollBundle\Entity\QOption;
use AltSTU\PollBundle\Entity\Vote;
use AltSTU\VizBundle\Services\VizService;
use AltSTU\VizBundle\Services\VizPdfService;

class DefaultController extends Controller
{
        public function indexAction()
        {		
            //get all questions from db
            $qlist = $this->getDoctrine()->getRepository('AltSTUPollBundle:Question')->findAll();

            if (!$qlist) {
                throw $this->createNotFoundException('No questions found!');
        }
	return $this->render('AltSTUPollBundle:Default:index.html.twig', array('page_title' => "Question list",'qlist'=>$qlist));
	
    }
	
	public function chooseQuestionAction($id)
	{
		$question = $this->getDoctrine()->getRepository('AltSTUPollBundle:Question')->find($id);
		$qtitle = $question->getTitle();
		$qtext = $question->getText();
		$optlist = $question->getQoptions();
                
                $request = $this->getRequest();
		$form = $this->createFormBuilder()->add('options', 'entity', array(
			'class' => 'AltSTUPollBundle:QOption',
			'choices' => $optlist,
			'property' => 'text',
			'expanded' => 'true', 
			))->getForm();
				
		if ($request->getMethod() == 'POST') 
		{
                    //save new vote to db
                    $form->handleRequest($request);
                    $vote = new Vote();
                    $qoption = $form->get('options')->getData(); 
                    $vote->setQoption($qoption);
                    
                    $tmpid = $qoption->getId();
                    $rep = $this->getDoctrine()->getRepository('AltSTUPollBundle:QOption');
                    $option = $rep->findOneBy(array('id'=>$tmpid));
                    $option->incNumv();
                    
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($vote);
                    $em->persist($option);
                    $em->flush();
                    //$request->getSession()->set('qid', $id);//$this->getRequest()->getSession()->set('qid',$id);

                    ////response is used temporary, later should be redirect to the results with chart
                    //return new Response('<html><body>Test! '.$id.' and '.$GLOBALS['myfoo'].'</body></html>');
                    return $this->redirect($this->generateUrl("alt_stu_poll_vote",array('id' => $id))); 
                }
		
		return $this->render('AltSTUPollBundle:Default:question.html.twig',
            array(
                'form' => $form->createView(),
                'question_title' => $qtitle,'question_text' => $qtext
            ));
	}
        
        public function voteAction(Request $request,$id)
	{
            //set headers for data
            /*$data = array(
                array('name','value'),
            );
            $qoptions = $repo1->findBy(array('question'=>$qid));
            for ($i=0;$i<count($qoptions);$i++)
            {
                //for every option we get votes for it
                $votes = $repo2->findBy(array('qoption'=>$qoptions[$i]->getId()));
                //pair: text of option and number of votes for it
                $temp = array($qoptions[$i]->getText(),count($votes));
                $data[] = $temp;
                unset($votes);
            }

            $fp = fopen('data.csv', 'w');
            foreach ($data as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);*/
            
            //forming the collection of data: key => value
            //$data = $this->getDoctrine()->getRepository('AltSTUPollBundle:QOption');
                //->createQueryBuilder('d')
                //->orderBy('d.created DESC')
                //->getQuery();
            $q = $this->getDoctrine()->getRepository('AltSTUPollBundle:Question')->find($id);
            $query = $this->getDoctrine()->getManager()
                    ->createQuery('SELECT op FROM AltSTUPollBundle:QOption op '
                            . 'WHERE op.question = :qid')->setParameter('qid',$q);
            $data = $query->getResult(); //returns a collection of persistent entities
            foreach ($data as $qoption) 
            {
                $collection[$qoption->getText()] = $qoption->getNumv(); //array($qoption->getText(),$qoption->getNumv());
            }
            
            $font = '/home/lisa/Projects/chart-viz/web/fonts/arial.ttf';
            $color_category = 'category10';
            
            return $this->forward('AltSTU.viz.controller:picAction', 
                    array('type' => 'pie', 'data' => $collection, 'w'=>500,'h'=>400,
                    'tx'=>'variants', 'ty'=>'votes', 'font'=>$font, 'color'=>$color_category));

                        
            //return new Response('<html><body>Test! 
            //    '.$mytmp.'
            //    <a href="/Symfony/web/app_dev.php/questions/all">Back to questions</a>
            //    <iframe src ="/Symfony/web/app_dev.php/questions/'.$id.'/chart" width="80%" height="400" frameborder="0" scrolling="auto">
            //    </iframe> </body></html>');
            //return new Response('<html><body>answered question id was '.$qid.' !</body></html>');            
	}
        
        public function showResultsAction($id)
	{//will be used later?               
		//if ($request->getMethod() == 'POST') 
		//{
		//$qoption = new QOption();
		//$qoption = $_POST; //$form->getData();
                //$form->bindRequest($request);
                //return $this->redirect($this->generateUrl('task_success'));
                //}
		//return new Response('<html><body>Test! '.$qoption[].'</body></html>');
		return new Response('<html><body>Test! we have id= '.$id.' here!</body></html>');
	}
}
