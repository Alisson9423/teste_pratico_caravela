<?php

namespace App\lib;
use App\Template\Fotter;
use App\Template\Header;
use App\Template\Slidebar;
use App\Template\Template;
use App\Template\View;
use App\Template\login;

/**
 * Description of Controller
 *
 * @author
 */
class Controller{
    private $header = "header";
    private $slide = "slidebar-menu";
    private $view = "index";
    private $footer = "footer";
    protected $registry;


    
    public function __get( $key ){
        $this->registry =  $key;
    }

    public function __set($name, $value){

        $this->registry[$name] = $value;
    }


    protected function load($render = null){
        
        $this->render(new Header(),$this->header);
        $this->render(new Slidebar(),$this->slide);
        $this->view(new View(),$render);
        $this->render(new Fotter(),$this->footer);

    }

    private function render(Template $template,$render){
        return $template->render($render);
    }

    protected function view(Template $template,$render = null){
        
        if(!empty($this->registry)):
            foreach ($this->registry as $key => $value) {
                $$key = $value;
            }

        endif;

        include_once $template->render($render);
    }

    protected function onePage($page){
        $this->render(new login(),$page);
    }

    /**
     * @param string $slide
     */
    public function setSlide($slide){
        $this->slide = $slide;
    }

    /**
     * @param string $header
     */
    public function setHeader($header){
        $this->header = $header;
    }

    /**
     * @param string $view
     */
    public function setView($view){
        $this->view = $view;
    }

    /**
     * @param string $footer
     */
    public function setFooter($footer){
        $this->footer = $footer;
    }

    

}
