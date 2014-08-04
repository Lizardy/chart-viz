<?php

/* AltSTUPollBundle:Demo:customize.html.twig */
class __TwigTemplate_bb944642ea75771688a699a775f936c91f8f718e96e3b410b61c1f71db9b99d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        
        <title>Плагин визуализации</title>
        
        <!-- Bootstrap -->
        <link href=\"/Symfony/web/bootstrap/css/bootstrap.css\" rel=\"stylesheet\">
        
    </head>
    <body>
        <div class=\"container\">
        <div class=\"jumbotron\">
            <h1>";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : $this->getContext($context, "page_title")), "html", null, true);
        echo "</h1>
        </div>
        
        
        <form  method=\"post\" ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
            <table class=\"table table-striped table-hover\">
                <tr>
                    <td> ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dataCollectionName"), 'row');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tx"), 'row');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ty"), 'row');
        echo " </td>
                    <td> ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formatName"), 'row');
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pdfFormat"), 'row');
        echo " </td>
                    <td> ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "typeDiagramName"), 'row');
        echo " </td>
                    <td> ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width"), 'row');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height"), 'row');
        echo " </td>
                    <td> ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "colorSchemeName"), 'row');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fontName"), 'row');
        echo " </td>

                    ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                </tr>
            </table>
            <input type=\"submit\" value=\"Создать визуализацию\"/>
        </form>
        <br/>
        <div class=\"panel panel-default\">
            <div class=\"panel-body\">
                <iframe src =\"/Symfony/web/app_dev.php/demo/visual\" width=\"100%\" height=\"500\" frameborder=\"0\" scrolling=\"auto\">
                </iframe> 
            </div>
        </div>

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src=\"/Symfony/web/bootstrap/js/bootstrap.min.js\"></script>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "AltSTUPollBundle:Demo:customize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 30,  74 => 28,  68 => 27,  64 => 26,  58 => 25,  50 => 24,  44 => 21,  37 => 17,  19 => 1,);
    }
}
