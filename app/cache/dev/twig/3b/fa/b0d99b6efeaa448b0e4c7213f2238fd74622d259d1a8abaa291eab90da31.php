<?php

/* AltSTUVizBundle:Viz:pdf.html.twig */
class __TwigTemplate_3bfab0d99b6efeaa448b0e4c7213f2238fd74622d259d1a8abaa291eab90da31 extends Twig_Template
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
    <table border=\"1\" cellspacing=\"3\" cellpadding=\"1\">
        ";
        // line 4
        if ((((isset($context["tx"]) ? $context["tx"] : $this->getContext($context, "tx")) != null) || ((isset($context["ty"]) ? $context["ty"] : $this->getContext($context, "ty")) != null))) {
            // line 5
            echo "            <tr>
                <th>";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["tx"]) ? $context["tx"] : $this->getContext($context, "tx")), "html", null, true);
            echo "</th><th>";
            echo twig_escape_filter($this->env, (isset($context["ty"]) ? $context["ty"] : $this->getContext($context, "ty")), "html", null, true);
            echo "</th>
            </tr>
        ";
        }
        // line 9
        echo "            
        ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 11
            echo "        <tr>
            <td>";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
            echo "</td>
            <td>";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    </table>
</html>";
    }

    public function getTemplateName()
    {
        return "AltSTUVizBundle:Viz:pdf.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 47,  34 => 57,  20 => 1,  76 => 34,  65 => 21,  81 => 30,  58 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 28,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 15,  63 => 15,  59 => 18,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  28 => 3,  26 => 5,  87 => 25,  21 => 2,  31 => 8,  25 => 5,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 27,  56 => 9,  24 => 4,  19 => 1,  93 => 28,  88 => 6,  78 => 21,  46 => 7,  44 => 11,  27 => 7,  79 => 18,  72 => 25,  69 => 25,  47 => 12,  40 => 10,  37 => 9,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 28,  66 => 24,  55 => 17,  52 => 21,  50 => 15,  43 => 12,  41 => 5,  35 => 9,  32 => 11,  29 => 6,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 53,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 32,  80 => 19,  73 => 19,  64 => 26,  60 => 16,  57 => 11,  54 => 10,  51 => 13,  48 => 22,  45 => 17,  42 => 7,  39 => 10,  36 => 5,  33 => 10,  30 => 7,);
    }
}
