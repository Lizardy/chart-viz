<?php

namespace AltSTU\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class DemoController extends Controller
{
    public function indexAction()
    {
        return $this->render('AltSTUPollBundle:Demo:index.html.twig', 
                array('page_title' => "Демонстрация работы плагина визуализации",
                    'column_class' => 'col-lg-6',
                    'pages' => array(
                        array('title' => 'Создать визуализацию', 'text' => 'Выбор данных, настройка параметров для создания новой визуализации', 'link' => 'customize'),
                        array('title' => 'Готовые примеры','text' => 'Просмотр готовых примеров визуализации','link' => 'samples')),
                ));        
    }
    
    public function sampleAction()
    {
        $session = $this->getRequest()->getSession();
        $session->clear();
        
        $query = $this->getDoctrine()->getManager()
                ->createQuery('SELECT op FROM AltSTUPollBundle:QOption op '
                        . 'WHERE op.question = :qid')->setParameter('qid',2);
        $data = $query->getResult(); //returns a collection of persistent entities
        foreach ($data as $qoption) 
        {
            $collection[$qoption->getText()] = $qoption->getNumv(); 
        }

        $font = '/home/lisa/Projects/chart-viz/web/fonts/arial.ttf';//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        
        $session->set('data', $collection); //данные
        $session->set('format', 'pic');     //формат
        $session->set('type', 'pie');       //тип диаграммы
        $session->set('w', 500);            //ширина
        $session->set('h', 400);            //высота
        $session->set('tx', 'Аргумент');    //подпись абсциссы
        $session->set('ty', 'Значение');    //подпись ординаты
        $session->set('font', $font);       //шрифт
        $session->set('color','category20');//цветовая схема
        $session->set('pdff', 'format_dt'); //формирование pdf
        
        return $this->render('AltSTUPollBundle:Demo:sample.html.twig', 
                array('page_title' => "Демонстрация работы плагина визуализации",
                    ));
    }
    
    public function visualAction() 
    {
        $session = $this->getRequest()->getSession();
        if ($session->get('format')!=null)
        {
        return $this->forward('AltSTU.viz.controller:'.$session->get('format').'Action', 
                    array(
                        'type' =>$session->get('type'),
                        'data' => $session->get('data'),
                        'w' => $session->get('w'), 'h' => $session->get('h'),
                        'tx' => $session->get('tx'), 'ty' => $session->get('ty'),
                        'font' => $session->get('font'), 
                        'color' => $session->get('color'),
                        'pdff' => $session->get('pdff'),
                    ));
        }
        else
            return new Response('<html>Здесь отображается результат визуализации</html>');
    }

    public function customizeAction()
    {		
            //get all questions from db
            /*$qlist = $this->getDoctrine()->getRepository('AltSTUPollBundle:Question')->findAll();

            if (!$qlist) {
                throw $this->createNotFoundException('No questions found!');
                }*/
        $request = $this->getRequest();
        $session = $request->getSession();
        $session->clear();
		
        $customization = new \AltSTU\PollBundle\AltSTUPollCustomization();
        $form = $this->createFormBuilder($customization)
                ->add('dataCollectionName','entity',
                        array('label' => 'Коллекция данных',
                            'class' => 'AltSTUPollBundle:Question',
                            'property' => 'title'))
                ->add('tx','text',
                        array('label' => 'Подпись аргумента',
                            'required' => false ))
                ->add('ty','text',
                        array('label' => 'Подпись значений',
                            'required' => false))
                ->add('formatName','choice',
                        array('label' => 'Формат визуализации',
                            'choices' => array('pic' => 'jpeg', 'pdf' => 'pdf', 'd3' => 'интерактивный'))) 
                ->add('typeDiagramName','choice', 
                        array('label' => 'Тип диаграммы',
                            'choices' => array('bar' => 'столбчатая', 'line' => 'линейная', 'pie' => 'круговая')))
                ->add('pdfFormat','choice', 
                        array('label' => 'Формат pdf',
                            'choices' => array('format_d' => 'диаграмма', 'format_t' => 'таблица', 'format_dt' => 'диаграмма и таблица'),
                            /*'attr' => array('disabled' => 'disabled')*/))
                ->add('width','text',
                        array('label'=>'Ширина',
                            //'data'=>'500',
                            'attr' => array('size' => '10')))
                ->add('height','text',
                        array('label'=>'Высота',
                            //'data'=>'400',
                            'attr' => array('size' => '10')))
                ->add('colorSchemeName','choice', 
                        array('label' => 'Цветовая схема',
                            'choices' => array('category10' => 'category10', 'category20' => 'category20', 'category20b' => 'category20b', 'category20c' => 'category20c')))
                ->add('fontName','choice', 
                        array('label' => 'Шрифт',
                            'choices' => array('arial' => 'arial')))
                ->getForm();
        
        if ($request->getMethod() == 'POST') 
	{
            $form->handleRequest($request);
            $customization = $form->getData();
            $quest = $form->get('dataCollectionName')->getData();
            
            //if ($customization->getDataTypeName()=='variants')
            //{
                $query = $this->getDoctrine()->getManager()
                        ->createQuery('SELECT op FROM AltSTUPollBundle:QOption op '
                                . 'WHERE op.question = :qid')->setParameter('qid',$quest->getId());
                $data = $query->getResult(); //returns a collection of persistent entities
                foreach ($data as $qoption) 
                {
                    $collection[$qoption->getText()] = $qoption->getNumv(); 
                }
            /*}
            else if ($customization->getDataTypeName()=='temporal')
            {
                $query = $this->getDoctrine()->getManager()
                        ->createQuery('SELECT v FROM AltSTUPollBundle:Vote v '
                                . 'WHERE v.question = :qid')->setParameter('qid',$quest->getId());
                $data = $query->getResult(); //returns a collection of persistent entities
                foreach ($data as $qoption) 
                {
                    $collection[$qoption->getText()] = $qoption->getNumv(); 
                }
            }*/
            
            $font = '/home/lisa/Projects/chart-viz/web/fonts/'.$customization->getFontName().'.ttf';
            
            $session->set('format', $customization->getFormatName());
            $session->set('type', $customization->getTypeDiagramName());
            $session->set('w', $customization->getWidth());
            $session->set('h', $customization->getHeight());
            $session->set('tx', $customization->getTx());
            $session->set('ty', $customization->getTy());
            $session->set('font', $font);
            $session->set('data', $collection);
            $session->set('color', $customization->getColorSchemeName());
            $session->set('pdff', $customization->getPdfFormat());
            
            return $this->redirect($this->generateUrl("alt_stu_poll_visualpage"));
            
            //src ="/Symfony/web/app_dev.php/demo/viz?type=&w=&h=&color&pdff=&form=&collection=&font="
            /*$this->redirect($this->generateUrl("alt_stu_poll_vizpage",
                    array('type'=> $customization->getTypeDiagramName(),
                        'w'=>$customization->getWidth(),'h'=>$customization->getHeight(),
                        'color'=>$customization->getColorSchemeName(),
                        'pdff'=>$customization->getPdfFormat(),
                        'form'=>$form,'collection'=>$collection, 'font'=>$font)));*/
            //return $this->redirect($this->generateUrl("alt_stu_poll_vote",array('id' => $id))); 
            /*return $this->forward('AltSTU.viz.controller:'.$customization->getFormatName().'Action', 
                    array('type' => $customization->getTypeDiagramName(), 'data' => $collection, 
                        'w'=>$customization->getWidth(),'h'=>$customization->getHeight(),
                        'tx'=>'variants', 'ty'=>'votes', 'font'=>$font, 'color'=>$customization->getColorSchemeName(),
                        'pdff'=>$customization->getPdfFormat()));*/
        }
        
        return $this->render('AltSTUPollBundle:Demo:customize.html.twig', 
                array('page_title' => "Демонстрация работы плагина визуализации",
                'form' => $form->createView()
                ));
	
    }
    
/*    public function vizAction(Request $request, 
            $type=null, $w=null, $h=null, $color=null, $pdff=null, $form=null, $collection=null, $font=null)
    {
        if ($request->getMethod() == 'GET') 
        {
        //$customization = $request->getData(); //$_POST;//$form->getData(); //
        $params = $this->getRequest()->query->all();
        //$form = $params['form'];
        //$customization = $form->getData();
        sscanf( $params['w'], "%u",$width);
        sscanf($params['h'],"%u",$height);
                
        return $this->forward('AltSTU.viz.controller:pdfAction', 
                    array('type' => $params['type'], 
                        'data' => $params['collection'], 
                        'w'=> $width,'h'=> $height,
                        'color'=>$params['color'],'pdff'=>$params['pdff'],
                        'tx'=>'variants', 'ty'=>'votes', 
                        'font'=>$params['font']
                        //'color'=>$customization->getColorSchemeName(),
                        //'pdff'=>$customization->getPdfFormat()
                        ));
        
        return $this->forward('AltSTU.viz.controller:'.$customization->getFormatName().'Action', 
                    array('type' => $customization->getTypeDiagramName(), 'data' => $collection, 
                        'w'=>$customization->getWidth(),'h'=>$customization->getHeight(),
                        'tx'=>'variants', 'ty'=>'votes', 'font'=>$font, 'color'=>$customization->getColorSchemeName(),
                        'pdff'=>$customization->getPdfFormat()));
        }
        return new Response('<html>Здесь отображается результат визуализации</html>');
    }*/
}
